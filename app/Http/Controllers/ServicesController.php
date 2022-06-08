<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Follower;
use App\Models\Order;
use App\Models\GenericModel;
use App\Models\Seller_general_category_info;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    function __construct()
    {
        $this->Generic_model = new GenericModel;
        $this->Follower = new Follower;
    }
    //
    public function index()
    {
        // dd("Hello");
        $menus = Menu::with('categories')->get();
        $categories = Category::select('id', 'name')->get();
        $popular = Category::where('popular', 1)->get();
        return view('services.service', compact('menus', 'popular', 'categories'));
    }

    public function search(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        $data = $request->validate([
            'category_id' => 'required'
        ]);

        $ageExists = false;
        $minRatingExists = false;
        $languageExists = isset($request->language) ?  true : false;
        $genderExists = isset($request->gender) ? true : false;
        $priceMinExists = isset($request->priceMin) ? true : false;
        $priceMaxExists = isset($request->priceMax) ? true : false;


        $age = false;
        if (isset($request->age)) {
            if (is_numeric($request->age)) {
                $ageExists = true;
            }
        }

        if (isset($request->minRating)) {
            if (is_numeric($request->minRating)) {
                $minRatingExists = true;
            }
        }

        //dd($data['category_id']);
        // $services =  DB::table('services')
        // Service::distinct()
        $services =  Service::groupBy('category_id', 'user_id')
            ->leftJoin('users', 'services.user_id', '=', 'users.id')
            //->leftJoin('seller_general_category_info', 'users.id', '=', 'seller_general_category_info.user_id')
            // ->leftJoin('service_images', 'services.id', '=', 'service_images.service_id')
            ->select('services.*', 'users.name as users_name', 'users.primary_language', 'users.secondary_language', 'users.gender', 'users.profile_picture', 'users.seller_audio_link as audio_link')
            ->where('category_id', $data['category_id'])
            ->where('services.active', 1)
            ->when($ageExists, function ($q) {
                global $request;
                $q->where(function ($query) use ($request) {
                    $query->where('users.birth_date', '<=', Carbon::now()->subYears(intVal($request->age))->toDateString())
                        ->orWhereNull('users.birth_date');
                });
            })
            ->when($minRatingExists, function ($q) {
                global $request;
                $q->where(function ($query) use ($request) {
                    $query->where('services.rating', '>=', $request->minRating);
                });
            })
            ->when($genderExists, function ($q) {
                global $request;
                $q->where(function ($query) use ($request) {
                    switch ($request->gender) {
                        case '0':
                            $gender = 'Male';
                            break;

                        case '1':
                            $gender = 'Female';
                            break;

                        case '2':
                            $gender = 'Other';
                            break;

                        default:
                            $gender = 'Male';
                            break;
                    }
                    $query->where('users.gender', $gender)
                        ->orWhereNull('users.gender');
                });
            })
            ->when($priceMinExists, function ($q) {
                global $request;
                $q->where(function ($query) use ($request) {
                    $query->where('services.price', '>=', $request->priceMin);
                });
            })
            ->when($priceMaxExists, function ($q) {
                global $request;
                $q->where(function ($query) use ($request) {
                    $query->where('services.price', '<=', $request->priceMax);
                });
            })
            ->when($languageExists, function ($q) {
                global $request;
                $languages = [
                    'Afrikaans',
                    'Albanian',
                    'Arabic',
                    'Armenian',
                    'Bosnian',
                    'Basque',
                    'Bengali',
                    'Bulgarian',
                    'Catalan',
                    'Cambodian',
                    'Chinese',
                    'Chinese (Mandarin)',
                    'Croatian',
                    'Czech',
                    'Danish',
                    'Dutch',
                    'English',
                    'Estonian',
                    'Fiji',
                    'Finnish',
                    'French',
                    'Georgian',
                    'German',
                    'Greek',
                    'Gujarati',
                    'Hebrew',
                    'Hindi',
                    'Hungarian',
                    'Icelandic',
                    'Indonesian',
                    'Irish',
                    'Italian',
                    'Japanese',
                    'Javanese',
                    'Korean',
                    'Latin',
                    'Latvian',
                    'Lithuanian',
                    'Macedonian',
                    'Malay',
                    'Malayalam',
                    'Maltese',
                    'Maori',
                    'Marathi',
                    'Mongolian',
                    'Nepali',
                    'Norwegian',
                    'Persian',
                    'Polish',
                    'Portuguese',
                    'Punjabi',
                    'Quechua',
                    'Romanian',
                    'Russian',
                    'Samoan',
                    'Serbian',
                    'Slovak',
                    'Slovenian',
                    'Spanish',
                    'Swahili',
                    'Swedish ',
                    'Tamil',
                    'Tatar',
                    'Telugu',
                    'Thai',
                    'Tibetan',
                    'Tonga',
                    'Turkish',
                    'Ukrainian',
                    'Urdu',
                    'Uzbek',
                    'Vietnamese',
                    'Welsh',
                    'Xhosa'
                ];
                if (in_array($request->language, $languages)) {
                    $q->where(function ($query) use ($request) {
                        $query->where('primary_language', $request->language)->orWhere('secondary_language', $request->language);
                    });
                }
            })
            // ->where(function($q) {
            //     $q->where('service_images.default_image','=',1)
            //     ->orWhereNull('service_images.id');
            // })
            ->whereNotNull('users.id')
            ->where('users.seller_vacation_mode', '0')
            ->where('users.banned', '0')
            ->paginate(12);


        foreach ($services as $index => $service) {
            $img = ServiceImage::where('service_id', $service->id)->where('active', 1)->where('default_image', 1)->first();

            $gc_info = Seller_general_category_info::where('category_id', $service->category_id)->where('user_id', $service->user_id)->first();

            if ($img != null) {
                $service->file_name = $img->file_name;
            } else {
                $service->file_name = null;
            }

            if ($gc_info) {
                $service->description = $gc_info->description;
                $service->instructions = $gc_info->instructions;
            } else {
                $service->description = null;
                $service->instructions = null;
            }
        }
        return response()->json($services);
    }

    public function service($id)
    {
        $id = intVal($id);

        $service = Service::with('images', 'category', 'user', 'ratings', 'posts')->whereId($id)->first();
        $category_id = $service['category']->id;
        $user_id = $service['user']->id;

        //Fetch all remaining services//
        $all_remaining_services =  Service::groupBy()
            ->select('services.name', 'services.price', 'services.service_duration_type', 'services.id')
            ->where('services.category_id', $category_id)
            ->where('services.user_id', $user_id)
            // ->where('services.id','!=', $id)
            ->where('services.active', 1)
            ->get();
        //Fetch all subsicribe categories
        $all_remaining_cats =  Service::groupBy('category_id', 'user_id')
            ->leftJoin('categories', 'categories.id', '=', 'services.category_id')
            ->select('categories.name', 'categories.id', 'categories.image_1', 'services.service_duration_type', DB::raw('MIN(services.price) AS minPrice'))
            ->where('services.user_id', $user_id)
            ->where('services.category_id', '!=', $category_id)
            ->where('services.active', 1)
            ->get();

        //Fetch min price for selected category//
        $minPrice = Service::select('services.service_duration_type',DB::raw('MIN(services.price) AS minPrice'))->where('services.user_id', $service->user->id)->where('services.category_id', $service->category->id)->first();


        // echo "<pre>";
        // print_r($all_remaining_cats);die;

        $totalOrders = Order::where('buyer_id', $service['user']->id)->count();

        $totalFollowers = Follower::where('user_id', $service['user']->id)->count();
        $totalfollowing = Follower::where('follower_id', $service['user']->id)->count();

        $followersList = $this->Follower->getAllFollowers($service['user']->id);
        $followingList = $this->Follower->getAllFollowing($service['user']->id);
        if ((Auth::user()->id) && ($service['user']->id)) {
            $checkFollow = Follower::where('user_id', $service['user']->id)->where('follower_id', Auth::user()->id)->first();
        } else {
            $checkFollow = '';
        }

        if ($service == null) {
            return redirect('/');
        }
        return view('services.serviceSingle', compact('service', 'totalfollowing', 'totalFollowers', 'followersList', 'followingList', 'checkFollow', 'totalOrders', 'all_remaining_services', 'all_remaining_cats','minPrice'));
    }
    public function serviceCategoryInfo(Request $request)
    {
        // return response()->json($request->id);
        if ($request->id == 1) {
            $data = array(
                'name' => 'League of Legends',
                'description' => 'This is my description',
            );
            return response()->json($data);
        } else {
            $data = array(
                'name' => 'League of Legends 11',
                'description' => 'This is my description 11',
            );
            return response()->json($data);
        }
    }

    public function getServiceInfoForModel(Request $request)
    {

        if (!$request->ajax()) {
            return response('', 405);
        }
        $service_id = $request->input('id');
        if (!empty($service_id)) {
            $service = Service::with('images', 'category', 'user', 'ratings', 'posts')->whereId($service_id)->first();
            if ($service) {

                $category_id = $service['category']->id;
                $user_id = $service['user']->id;

                $data['all_remaining_services'] =  Service::groupBy()
                    ->select('services.name', 'services.price', 'services.service_duration_type', 'services.id')
                    ->where('services.category_id', $category_id)
                    ->where('services.user_id', $user_id)
                    // ->where('services.id','!=', $id)
                    ->where('services.active', 1)
                    ->get();
                    // print_r($data['all_remaining_services']) ;
                    // die();
                // $category_id = $service['category']->id;
                $data['service'] = $service;

                $html = view('services/dynamic-model', $data)->render();
                return response()->json($html);
            }
        }
    }

    public function getSingleServiceForSelect(Request $request)
    {

        if (!$request->ajax()) {
            return response('', 405);
        }
        $service_id = $request->input('id');
        if (!empty($service_id)) {
            $service = Service::with('images', 'category', 'user', 'ratings', 'posts')->whereId($service_id)->first();
            if ($service) {

                // $category_id = $service['category']->id;
                // $user_id = $service['user']->id;
                // $category_id = $service['category']->id;
                $data = $service;

                echo json_encode($data);
            }
        }
    }

    public function getServiceDetailsForTab(Request $request)
    {



        if (!$request->ajax()) {
            return response('', 405);
        }
        $category_id = $request->input('id');
        $cat_ord_arr = explode(',', $request->input('cat_ord_arr'));
//print_r($cat_ord_arr);
//echo in_array($category_id, $cat_ord_arr);die;
        $user_id = $request->input('user_id');
        if(!empty($category_id))
        {
            $service = Service::with('images','category', 'user', 'ratings', 'posts')->where(array('category_id'=>$category_id,'user_id'=>$user_id))->first();

            if ($service) {

                $data['service'] = $service;

                $category_id = $service['category']->id;
                $user_id = $service['user']->id;



//Fetch all remaining services//
                $data['all_remaining_services'] = Service::groupBy()
                ->select('services.name', 'services.price', 'services.service_duration_type', 'services.id')
                ->where('services.category_id', $category_id)
                ->where('services.user_id', $user_id)
// ->where('services.id','!=', $id)
                ->where('services.active', 1)
                ->get();
//Fetch all subsicribe categories
                if (in_array($category_id, $cat_ord_arr) == '' || in_array($category_id, $cat_ord_arr) == 0)
                {

                    $all_remaining_cats = Service::groupBy('category_id', 'user_id')
                    ->leftJoin('categories', 'categories.id', '=', 'services.category_id')
                    ->select('categories.name', 'categories.id' ,'categories.image_1', 'services.service_duration_type', DB::raw('MIN(services.price) AS minPrice'))
                    ->where('services.user_id', $user_id)
                    ->where('services.category_id', '!=', $category_id)
                    ->where('services.active', 1)
                    ->get();
//Fetch min price for selected category//
                    $minPrice = Service::select('services.service_duration_type',DB::raw('MIN(services.price) AS minPrice'))->where('services.user_id', $service->user->id)->where('services.category_id', $service->category->id)->first();
                    $data1['html2'] = view('services/categories-list', compact('service','all_remaining_cats','minPrice'))->render();
                }
                else
                {
                    $data1['html2'] = '';
                }


                $data1['html'] = view('services/dynamic-service-tabs', $data)->render();



                return response()->json($data1);
            }
        }
    }
}
