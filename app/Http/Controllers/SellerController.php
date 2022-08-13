<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SellerApplication;
use App\Models\WithdrawalRequest;
use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\GenericModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SellerController extends Controller
{
    function __construct()
    {
        $this->Generic_model = new GenericModel;
    }
    //
    public function index()
    {
        $myServicesCount = shortNumber(Service::where('user_id', Auth::id())->get()->count());
        $totalOrders = shortNumber(DB::table('orders')->leftJoin('services', 'orders.service_id', '=', 'services.id')->where('orders.seller_id', Auth::id())->get()->count());
        $totalEarnings = DB::table('orders')->leftJoin('services', 'orders.service_id', '=', 'services.id')->whereIn('orders.status', [1, 4])->where('orders.seller_id', Auth::id())->sum('orders.price');

        $earnings = array();
        $dates = array();
        for ($i = 0; $i < 8; $i++) {
            $earnings[$i] = Order::where('seller_id', Auth::id())->whereIn('status', [1, 4])->where(DB::raw('Date(created_at)'), Carbon::now()->subDays($i)->format('Y-m-d'))->sum('price');
            $dates[$i] = Carbon::now()->subDays($i)->format('Y-m-d');
        }
        $dates = array_reverse($dates);
        $earnings = array_reverse($earnings);
        // dd($earnings);
        return view('seller.dashboard', compact('myServicesCount', 'totalOrders', 'totalEarnings', 'earnings', 'dates'));
    }

    public function application()
    {
        $application = SellerApplication::where('user_id', Auth::id())->first();
        if (Auth::user()->seller_rank != '0') {
            return redirect('/seller');
        }
        return view('seller.application', compact('application'));
    }

    public function applicationSubmit(Request $request)
    {
        $application = SellerApplication::where('user_id', Auth::id())->where('status', 0)->first();
        if ($application) return false;
        request()->validate([
            'file'  => 'required|mimes:wav,mp3,webm|max:4096',
        ]);

        $file = $request->file->store('storage/audio-verifications/' . Auth::id(), 'public');


        $application = new SellerApplication;
        $application->user_id = Auth::id();
        $application->audio_link = $file;
        $application->save();

        return redirect('/seller/apply');
    }
    public function create()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('seller.serviceNew', compact('menus', 'categories'));
    }

    public function withdrawals()
    {
        $withdrawals = WithdrawalRequest::where('user_id', Auth::id())->paginate(20);
        return view('seller.withdrawals', compact('withdrawals'));
    }

    public function submitRequest(Request $request)
    {

        $validatedData = $request->validate([
            'amount' => 'numeric',
            'payment_method' => 'numeric',
            'note' => 'nullable',
            'paypal_email' => 'nullable',
            'bank_iban' => 'nullable',
            'bank_name' => 'nullable',
            'bank_swift' => 'nullable',
            'name' => 'nullable',
            'address' => 'nullable'
        ]);



        $user = User::whereId(Auth::id())->first();
        if ($user == null) {
            return redirect()->back();
        }
        $amount = $validatedData['amount'];
        $paymentMethod = $validatedData['payment_method'];

        if (floatval($amount) > floatval($user->earned_gp)) {

            return redirect()->back();
        }

        $wRequest = new WithdrawalRequest;
        $wRequest->amount = $amount;
        $wRequest->user_id = $user->id;


        switch ($paymentMethod) {
            case '0':
                if (!isset($validatedData['paypal_email'])) {

                    redirect()->back();
                }
                $wRequest->paypal_email = $validatedData['paypal_email'];
                isset($validatedData['note']) ? $wRequest->note = $validatedData['note'] : '';

                $wRequest->payment_method = 0;
                break;
            case '1':

                if (!isset($validatedData['bank_name']) || !isset($validatedData['name']) || !isset($validatedData['address'])) {
                    redirect()->back();
                }

                isset($validatedData['bank_name']) ? $wRequest->bank_name = $validatedData['bank_name'] : '';
                isset($validatedData['name']) ? $wRequest->bank_recipient = $validatedData['name'] : '';
                isset($validatedData['address']) ? $wRequest->bank_recipient_address = $validatedData['address'] : '';
                isset($validatedData['bank_swift']) ? $wRequest->bank_swift = $validatedData['bank_swift'] : '';
                isset($validatedData['bank_iban']) ? $wRequest->bank_iban = $validatedData['bank_iban'] : '';
                isset($validatedData['note']) ? $wRequest->note = $validatedData['note'] : '';

                $wRequest->payment_method = 1;
                break;

            default:
                # code...
                break;
        }

        $wRequest->save();

        $user->earned_gp = floatVal($user->earned_gp) - $amount;
        $user->save();

        return redirect()->back()->with('success', 'Withdrawal request submitted.');
    }

    public function getCategories(Request $request)
    {
        if (isset($request->id) && is_numeric($request->id)) {
            $categories = Category::where('menu_id', $request->id)->get();
            return response()->json($categories);
        }
    }

    public function createService(Request $request)
    {

        $data = $request->validate([
            'name' => 'string|required',
            'menu' => 'numeric|required|exists:menus,id',
            'category' => 'numeric|required|exists:categories,id',
            'price' => 'numeric|required',
            'service_duration_type' => 'required',
            'instructions' => 'nullable|string|max:240',
            // 'description' => 'string|nullable|max:64',
            'description' => 'string|nullable',
            'monday_from' => 'string|nullable',
            'monday_to' => 'string|nullable',
            'tuesday_from' => 'string|nullable',
            'tuesday_to' => 'string|nullable',
            'wednesday_from' => 'string|nullable',
            'wednesday_to' => 'string|nullable',
            'thursday_from' => 'string|nullable',
            'thursday_to' => 'string|nullable',
            'friday_from' => 'string|nullable',
            'friday_to' => 'string|nullable',
            'saturday_from' => 'string|nullable',
            'saturday_to' => 'string|nullable',
            'sunday_from' => 'string|nullable',
            'sunday_to' => 'string|nullable',
        ]);
        $service = new Service;
        $service->category_id = $data['category'];
        $service->user_id = Auth::id();
        $service->name = $data['name'];
        $service->active = 1;
        $service->price = $data['price'];
        $service->service_duration_type = $data['service_duration_type'];
        //$data['instructions'] != null ? $service->instructions = $data['instructions'] : '';
        //$data['description'] != null ? $service->description = $data['description'] : '';
        $data['monday_from'] != null ? $service->monday_from = $data['monday_from'] : '';
        $data['monday_to'] != null ? $service->monday_to = $data['monday_to'] : '';
        $data['tuesday_from'] != null ? $service->tuesday_from = $data['tuesday_from'] : '';
        $data['tuesday_to'] != null ? $service->tuesday_to = $data['tuesday_to'] : '';
        $data['wednesday_from'] != null ? $service->wednesday_from = $data['wednesday_from'] : '';
        $data['wednesday_to'] != null ? $service->wednesday_to = $data['wednesday_to'] : '';
        $data['thursday_from'] != null ? $service->thursday_from = $data['thursday_from'] : '';
        $data['thursday_to'] != null ? $service->thursday_to = $data['thursday_to'] : '';
        $data['friday_from'] != null ? $service->friday_from = $data['friday_from'] : '';
        $data['friday_to'] != null ? $service->friday_to = $data['friday_to'] : '';
        $data['saturday_from'] != null ? $service->saturday_from = $data['saturday_from'] : '';
        $data['saturday_to'] != null ? $service->saturday_to = $data['saturday_to'] : '';
        $data['sunday_from'] != null ? $service->sunday_from = $data['sunday_from'] : '';
        $data['sunday_to'] != null ? $service->sunday_to = $data['sunday_to'] : '';

        $gc_data['category_id'] = $data['category'];
        $gc_data['user_id'] = Auth::id();
        $data['instructions'] != null ? $gc_data['instructions'] = $data['instructions'] : '';
        $data['description'] != null ? $gc_data['description'] = $data['description'] : '';

        $service->save();

        $previous_Record = $this->Generic_model->getSpecificRecord('seller_general_category_info', array('category_id' => $gc_data['category_id']));
        if ($previous_Record) {
            $this->Generic_model->updateRecord('seller_general_category_info', $gc_data, array('category_id' => $gc_data['category_id']));
        } else {
            $this->Generic_model->insertGetId('seller_general_category_info', $gc_data);
        }


        return redirect('/seller/services/' . $service->id);
    }

    public function service($id)
    {
        $service = Service::with('images')->where('user_id', Auth::id())->whereId($id)->first();
        $category_id = $service->category_id;
        $seller_gen_info = $this->Generic_model->getSpecificRecord('seller_general_category_info', array('category_id' => $category_id));
        // echo "<pre>";
        // print_r($previous_Record);die;
        if ($service != null) {
            return view('seller.service', compact('service', 'seller_gen_info'));
        } else {
            return redirect('/seller');
        }
    }

    public function list()
    {
        $services = Service::with('category')->where('user_id', Auth::id())->paginate(15);
        // dd($services);
        return view('seller.services', compact('services'));
    }

    public function update(Request $request)
    {
        $service = Service::where('user_id', Auth::id())->whereId($request->id)->first();
        if ($service == null) return redirect('/seller');

        $validated = $request->validate([
            'price' => 'numeric|max:99999',
            'service_duration_type' => 'required',
            'description' => 'nullable|string|max:64',
            'instructions' => 'nullable|string|max:240',
            'name' => 'string|max:100',
        ]);

        $service->price = $validated['price'];
        $service->service_duration_type = $validated['service_duration_type'];
        $service->name = $validated['name'];
        //$service->description = $validated['description'];
        //$service->instructions = $validated['instructions'];
        if ($request->active != 'on') {
            $service->active = 0;
        }
        $service->save();

        $gc_data['description'] = $validated['description'];
        $gc_data['instructions'] = $validated['instructions'];


        $this->Generic_model->updateRecord('seller_general_category_info', $gc_data, array('category_id' => $request->category_id));

        return redirect()->back()->with(['success' => 'Saved successfully!']);
    }

    public function isValidDate(string $date, string $format = 'Y-m-d'): bool
    {
        $dateObj = \DateTime::createFromFormat($format, $date);
        return $dateObj && $dateObj->format($format) == $date;
    }


    public function updateSchedule(Request $request)
    {

        $service = Service::where('user_id', Auth::id())->whereId($request->id)->first();
        if ($service == null) return redirect('/seller');
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($days as $day) {
            if (isset($request[$day . '_from']) && $request[$day . '_from'] != '' && !$this->isValidDate($request[$day . '_from'], 'H:i')) {
                return redirect()->back()->with(['error' => 'Error: Incompatible schedule format.']);
            }
            if (isset($request[$day . '_to']) && $request[$day . '_to'] != '' && !$this->isValidDate($request[$day . '_to'], 'H:i')) {
                return redirect()->back()->with(['error' => 'Error: Incompatible schedule format.']);
            }
        }

        $request['monday_from'] != null ? $service->monday_from = $request['monday_from'] . ':00' : $service->monday_from = null;
        $request['monday_to'] != null ? $service->monday_to = $request['monday_to'] . ':00' : $service->monday_to = null;
        $request['tuesday_from'] != null ? $service->tuesday_from = $request['tuesday_from'] . ':00' : $service->tuesday_from = null;
        $request['tuesday_to'] != null ? $service->tuesday_to = $request['tuesday_to'] . ':00' : $service->tuesday_to = null;
        $request['wednesday_from'] != null ? $service->wednesday_from = $request['wednesday_from'] . ':00' : $service->wednesday_from = null;
        $request['wednesday_to'] != null ? $service->wednesday_to = $request['wednesday_to'] . ':00' : $service->wednesday_to = null;
        $request['thursday_from'] != null ? $service->thursday_from = $request['thursday_from'] . ':00' : $service->thursday_from = null;
        $request['thursday_to'] != null ? $service->thursday_to = $request['thursday_to'] . ':00' : $service->thursday_to = null;
        $request['friday_from'] != null ? $service->friday_from = $request['friday_from'] . ':00' : $service->friday_from = null;
        $request['friday_to'] != null ? $service->friday_to = $request['friday_to'] . ':00' : $service->friday_to = null;
        $request['saturday_from'] != null ? $service->saturday_from = $request['saturday_from'] . ':00' : $service->saturday_from = null;
        $request['saturday_to'] != null ? $service->saturday_to = $request['saturday_to'] . ':00' : $service->saturday_to = null;
        $request['sunday_from'] != null ? $service->sunday_from = $request['sunday_from'] . ':00' : $service->sunday_from = null;
        $request['sunday_to'] != null ? $service->sunday_to = $request['sunday_to'] . ':00' : $service->sunday_to = null;
        $service->save();

        return redirect()->back()->with(['success' => 'Schedule saved successfully!', 'tab' => '2']);
    }

    public function orders()
    {
        $orders = Order::with('service')->where('seller_id', Auth::id())->paginate(30);
        return view('seller.orders', compact('orders'));
    }


    public function serviceFolderExists($serviceID): bool
    {
        return file_exists(public_path('storage/services/' . $serviceID));
    }

    public function makeFolder($serviceID)
    {
        mkdir(public_path('storage/services/' . $serviceID), 0777, true);
    }



    public function addImage(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|numeric',
        //     'image' => 'required|mimes:jpg,png|max:4096',
        // ]);

        $service = Service::where('user_id', Auth::id())->whereId($request->id)->first();

        if ($service == null) return redirect()->back()->with(['error' => 'Error: Insufficient permission.']);


        if (!$this->serviceFolderExists($service->id)) {
            $this->makeFolder($service->id);
        }
        $file = $request->image->store('storage/services/' . $service->id, 'public');
        $serviceImage = new ServiceImage;
        $serviceImage->service_id = $service->id;
        $serviceImage->file_name = $file;
        $serviceImage->save();
        return redirect()->back()->with(['success' => 'Image has been added.', 'tab' => '3']);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'imageId' => 'required|numeric'
        ]);

        $image = ServiceImage::with('service')->whereId($request->imageId)->first();

        if ($image == null || $image->service->user_id != Auth::id()) return response('Forbidden', 403);
        unlink(public_path('/' . $image->file_name));
        $image->delete();
        return response('Success', 200);
    }

    public function defaultImage(Request $request)
    {
        $service = Service::where('user_id', Auth::id())->whereId($request->id)->first();
        if ($service == null) return redirect()->back()->with(['error' => 'Error: Insufficient permission.']);

        ServiceImage::where('service_id', $service->id)->update(['default_image' => '0']);
        ServiceImage::where('service_id', $service->id)->whereId($request->imageId)->update(['default_image' => '1']);

        return response('Success', 200);
    }

    public function vacationMode(Request $request)
    {
        if (!isset($request->modeEnabled)) return response('Error', 400);
        $user = User::whereId(Auth::id())->first();

        if ($request->modeEnabled == '0') {
            $user->seller_vacation_mode = 1;
            $user->save();
        } else if ($request->modeEnabled == '1') {
            $user->seller_vacation_mode = 0;
            $user->save();
        }

        return response('Success', 200);
    }

    public function editProfileUser(Request $request){
        // dd("Hello");
        // dd($request->id);
        $user = User::where('id', $request->id)->first();
        // dd($user);
        // if (!$user || $user->id != Auth::id()) {
        //     return redirect('/');
        // }

        return view('services.edit-profile', compact('user'));
    }
}
