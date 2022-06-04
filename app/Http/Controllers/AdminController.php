<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\News;
use App\Models\Order;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\SellerApplication;
use App\Models\WithdrawalRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function index()
    {
        // Admin Panel Index 
        $count = DB::table('users')
            ->select(DB::raw('Date(created_at) as date'), DB::raw('count(*) as users'))
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy(DB::raw('Date(created_at)'))
            ->get();
        $users = User::count();
        $usersNew7d = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $earnings = Order::where('status', 1)->sum('price');
        return view('admin.index', compact('count', 'users', 'usersNew7d', 'earnings'));
    }
    public function users()
    {
        // Users tab
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }
    public function applications()
    {
        // Seller Applications
        $applications = SellerApplication::with('user')->where('status', 0)->paginate(15);
        return view('admin.applications', compact('applications'));
    }

    public function approveApplication(Request $request)
    {
        // Logic for validating request application
        if (!isset($request->id) || !isset($request->decision)) {
            return false;
        }

        $decision = $request->decision;
        $id = $request->id;
        if ($decision != 'approve' && $decision != 'deny') {
            return false;
        }

        $application = SellerApplication::whereId($id)->first();
        if ($application == null) {
            return false;
        }

        $user = User::whereId($application->user_id)->first();
        if ($user == null) {
            $application->status = 1;
            $application->save();
            return 'success';
        }

        // APPROVE OR DENY LOGIC BELOW
        // ===============================


        if ($request->decision == 'approve') {
            // User got approved for seller, grant application and delete table id.
            $application->status = 2;
            $user->seller_rank = 1;
            $user->seller_rank_update = Carbon::now();
            $user->seller_audio_link = $application->audio_link;
            $user->save();
            $application->save();
        } else {
            // Denied
            $application->status = 1;
            $application->save();
        }

        return 'success';
    }

    public function withdrawals()
    {
        // Withdrawal requests page
        $withdrawals = WithdrawalRequest::with('user')->where('status', 0)->paginate(15);
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function approveWithdrawal(Request $request)
    {
        // Approve sellers withdrawal request
        if (!isset($request->id) || !isset($request->decision)) {
            return false;
        }

        $decision = $request->decision;
        $id = $request->id;
        if ($decision != 'approve' && $decision != 'deny') {
            return false;
        }

        $withdrawal = WithdrawalRequest::whereId($id)->first();
        if ($withdrawal == null) {
            return false;
        }

        $user = User::whereId($withdrawal->user_id)->first();
        if ($user == null) {
            $withdrawal->status = 1;
            dd('error, user not found');
            $withdrawal->save();
            return 'success';
        }

        // APPROVE OR DENY LOGIC BELOW
        // ===============================


        if ($request->decision == 'approve') {
            // Withdrawal approved.
            $withdrawal->status = 2;

            $user->save();
            $withdrawal->save();
        } else {
            // Denied
            $withdrawal->status = 1;
            $withdrawal->save();
        }

        return 'success';
    }

    public function searchUsers(Request $request)
    {

        if ($request->ajax() == false) {
            return redirect('/admin');
            die();
        }
        $usersJSON = array();
        $users = User::where('name', 'LIKE', "%" . $request->q . "%")->orWhere('email', 'LIKE', "%" . $request->q . "%")->get();
        foreach ($users as $user) {
            array_push($usersJSON, ['id' => $user->id, 'name' => $user->name, 'profile_picture' => $user->profile_picture]);
        }
        return json_encode($usersJSON, JSON_HEX_QUOT);
    }
    public function searchServices(Request $request)
    {
        if ($request->ajax() == false) {
            return redirect('/admin');
            die();
        }
        $servicesJSON = array();
        $services = Service::with('user', 'category')->where('name', 'LIKE', "%" . $request->q . "%")->orWhereHas('user', function ($q) use ($request) {
            $q->where('name', $request->q);
        })->get()->take(50);
        foreach ($services as $service) {
            if ($service->user != null) {
                array_push($servicesJSON, ['id' => $service->id, 'cat' => $service->category->name, 'name' => $service->name, 'user' => $service->user->name, 'user_id' => $service->user->id]);
            } else {
                array_push($servicesJSON, ['id' => $service->id, 'name' => $service->name]);
            }
        }
        return json_encode($servicesJSON, JSON_HEX_QUOT);
    }

    public function categories()
    {
        // Categories tab in Admin panel.
        $categories = Category::paginate(30);
        return view('admin.categories', compact('categories'));
    }
    public function settings()
    {
        // Unused route as I saw there was no site settings required. Might want to code some stuff like TAX % in future to be changed here.
        return view('admin.settings');
    }


    public function user($id)
    {
        // User Info - Added main fields, some are lacking.
        $user = User::whereId($id)->first();
        return view('admin.user', compact('user'));
    }

    public function updateUser(Request $request)
    {

        // Route to update user info.
        $user = User::whereId($request->id)->first();
        if ($user == null) {
            return redirect()->back()->with(['error' => 'User does not exist.']);
        }

        $user->name = $request->nickname;
        $user->real_name = $request->real_name;
        $user->email = $request->email;
        $user->user_title = $request->user_title;
        if (Auth::id() != $user->id) {
            $user->user_group = $request->user_group;
        }
        if ($user->seller_rank != $request->seller_rank) {
            $user->seller_rank_update = date('Y-m-d H:i:s');
        }
        $user->seller_rank = $request->seller_rank;

        $user->save();
        return redirect()->back()->with(['success' => 'User info has been updated.']);
    }

    public function ban(Request $request)
    {
        // Logic to ban a user
        if (isset($request->id) && is_numeric($request->id)) {
            $user = User::whereId($request->id)->first();
            if ($user == null) return redirect()->back()->with(['error' => 'User does not exist.']);
            if ($user->id == Auth::id()) return redirect()->back()->with(['error' => 'You cannot ban yourself.']);
            $user->banned = 1;
            $user->save();
            return redirect()->back()->with(['success' => 'User has been banned.']);
        }
    }

    public function unban(Request $request)
    {
        // Logic to unban a user

        if (isset($request->id) && is_numeric($request->id)) {
            $user = User::whereId($request->id)->first();
            if ($user == null) return redirect()->back()->with(['error' => 'User does not exist.']);
            $user->banned = 0;
            $user->save();
            return redirect()->back()->with(['success' => 'User has been unbanned.']);
        }
    }

    public function categoryFolderExists($categoryID): bool
    {
        // Function to improve code readibility, could probably be an one-liner but I figured it might be easier to understand this way.
        return file_exists(public_path('storage/categories/' . $categoryID));
    }

    public function makeFolder($categoryID)
    {
        $backupLoc = public_path('storage/categories/' . $categoryID);
        if (!File::exists($backupLoc)) {
            File::makeDirectory($backupLoc, 0755, true, true);
        }
    }


    public function category($id)
    {
        $category = Category::where('id', $id)->first();
        $menus = Menu::all();
        return view('admin.category', compact('menus', 'category'));
    }


    public function category_add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string',
            'image' => 'nullable|mimes:jpg,png|max:4096',
            'menu' => 'integer'
        ]);

        $category = new Category;
        $category->menu_id = $validated['menu'];
        $category->name = $validated['name'];

        $category->save();

        if (isset($validated['image'])) {

            $this->makeFolder($category->id);
            $file = $request->image->store('storage/categories/' . $category->id, 'public');
            $category->image_1 = $file;
            $category->save();
        }

        return redirect()->back()->with(['success' => 'New category has been created.']);
    }

    public function updateCategory(Request $request)
    {
        $validated = $request->validate([
            'id' => 'numeric',
            'name' => 'string',
            'image' => 'nullable|mimes:jpg,png|max:4096',
            'menu' => 'integer',
            'popular' => 'nullable'
        ]);

        $category = Category::whereId($validated['id'])->first();
        $category->menu_id = $validated['menu'];
        $category->name = $validated['name'];
        if (isset($validated['popular'])) {
            $category->popular = 1;
        } else {
            $category->popular = 0;
        }

        $category->save();

        if (isset($validated['image'])) {
            if ($category->image_1 != null) {
                unlink(public_path('/' . $category['image_1']));
            }
            if (!$this->categoryFolderExists($category->id)) {
                $this->makeFolder($category->id);
            }
            $file = $request->image->store('storage/categories/' . $category->id, 'public');
            $category->image_1 = $file;
            $category->save();
        }

        return redirect()->back()->with(['success' => 'Category has been updated.']);
    }



    public function category_remove(Request $request)
    {
        $categoryID = $request->id;
        $category = Category::whereId($categoryID)->first();
        if ($category == null) {
            return response('Not found', 404);
        }

        $servicesCheck = Service::where('category_id', $category->id)->exists();
        if (!$servicesCheck && !isset($request->new_cat_id)) {
            $category->delete();
            $res = ['code' => 'Success'];
            return response(json_encode($res), 200);
        } else {
            if (!isset($request->new_cat_id)) {
                $res = ['code' => 'chk', 'cat_name' => $category->name];
                return response(json_encode($res), 200);
            } else {
                $newCat = Category::whereId($request->new_cat_id)->where('id', '!=', $category->id)->first();
                if ($newCat != null) {
                    Service::where('category_id', $category->id)->update(['category_id' => $newCat->id]);
                    $category->delete();
                    $res = ['code' => 'Success'];
                    return response(json_encode($res), 200);
                } else {
                    $res = ['code' => 'Invalid request'];
                    return response(json_encode($res), 400);
                }
                $res = ['code' => 'Success'];
                return response(json_encode($res), 200);
            }
        }
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.news', compact('news'));
    }

    public function categoryNew()
    {
        $menus = Menu::all();
        return view('admin.categoryNew', compact('menus'));
    }

    public function services()
    {
        $services = Service::with('user')->orderBy('created_at', 'desc')->paginate(30);
        return view('admin.services', compact('services'));
    }

    public function service($id)
    {
        // dd("Hello11");
        $service = Service::with('user', 'images')->whereId($id)->first();
        $categories = Category::all();
        if ($service == null) return redirect('/admin/services');
        return view('admin.service', compact('service', 'categories'));
    }

    public function updateService(Request $request)
    {
        $validated = $request->validate([
            'id' => 'numeric',
            'name' => 'string|min:1',
            'price' => 'numeric',
            'category' => 'integer'
        ]);

        $service = Service::whereId($validated['id'])->first();
        $service->category_id = $validated['category'];
        $service->name = $validated['name'];
        $service->price = $validated['price'];

        $service->save();

        return redirect()->back()->with(['success' => 'Service has been updated.']);
    }

    public function deleteServiceImage(Request $request)
    {
        $image = ServiceImage::whereId($request->id)->first();
        if ($image == null) return 'success';

        unlink(public_path('/' . $image->file_name));
        $image->delete();
        return 'success';
    }

    public function news_add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|max:256',
            'content' => 'string|max:4000',
            'image' => 'nullable|mimes:jpg,png|max:4096'
        ]);

        $post = new News();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::id();
        $post->save();

        if (isset($validated['image'])) {
            if (file_exists(public_path('storage/news/')) == false) {
                mkdir(public_path('storage/news/'));
            }
            if (file_exists(public_path('storage/news/' . $post->id)) == false) {
                mkdir(public_path('storage/news/' . $post->id));
            }
            $file = $request->image->store('storage/news/' . $post->id, 'public');
            $post->image = $file;
            $post->save();
        }
        $response = ['status' => 'success', 'id' => $post->id];
        return json_encode($response);
    }

    public function postUpdatePage($id)
    {
        $post = News::whereId($id)->first();
        return view('admin.post', compact('post'));
    }

    public function updateNews(Request $request)
    {
        $validated = $request->validate([
            'id' => 'numeric',
            'title' => 'string|max:256',
            'content' => 'string|max:4000',
            'image' => 'nullable|mimes:jpg,png|max:4096'
        ]);


        $post = News::whereId($validated['id'])->first();
        if ($post == null) return response('success');
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::id();
        $post->save();

        if (isset($validated['image'])) {
            if ($post->image != null) {
                unlink(public_path('/' . $post['image']));
            }

            if (file_exists(public_path('storage/news/')) == false) {
                mkdir(public_path('storage/news/'));
            }

            $file = $request->image->store('storage/news/' . $post->id, 'public');
            $post->image = $file;
            $post->save();
        }

        return response('success');
    }

    public function deleteNews($id)
    {
        $post = News::whereId($id)->first();
        if ($post->image != null) {
            unlink(public_path('/' . $post['image']));
        }
        $post->delete();
        return redirect('/admin/news');
    }
}
