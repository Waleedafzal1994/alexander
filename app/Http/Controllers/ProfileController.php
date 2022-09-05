<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Block;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\Service;
use App\Models\Order;
use App\Models\Follower;
use App\Models\GenericModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    function __construct()
    {
        $this->Generic_model = new GenericModel;
        $this->Follower = new Follower;
        $this->Block = new Block;
    }


    public function index(Request $request)
    {
        $user = User::with('services.category')->where('id', $request->id)->first();
        // dd($user);
        if (!$user) {
            return redirect('/');
        }

        if (Auth::id() != $user->id && Auth::user()->user_group < 2 && $user->seller_rank == '0' && $user->user_group == '0') {
            return redirect('/profile/' . Auth::id())->with(['error' => 'In order to protect privacy of our members, profiles of non-seller users are not visitable. You have been redirected to your profile.']);
        }
        return view('profile', compact('user'));
    }

    public function editProfilePage(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if (!$user || $user->id != Auth::id()) {
            return redirect('/');
        }

        return view('profile-edit', compact('user'));
    }

    public function editProfile(Request $request)
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();
        $user = User::where('id', $request->id)->first();

        $validated = [
            'name' => 'required|string|min:4|max:32|unique:users,id,' . $user->id,
            'real_name' => 'required|string|min:3|max:30',
            'title' => 'nullable|string|min:2',
            //'country' => 'required|string|min:2',
            'description' => 'nullable|string|max:180',
            'gender' => 'required',
            'birth_date' => 'nullable',
            'primary_language' => 'required',
            'secondary_language' => 'nullable',
            'facebook_profile' => 'max:64|nullable',
            'twitch_profile' => 'nullable',
            'instagram_profile' => 'nullable',
            'tiktok_profile' => 'nullable',
            // 'discord_handle' => 'nullable',
        ];

    
        $validator = Validator::make($request->all(), $validated);

        if ($validator->fails()) {

            echo $validator->errors();
            die();
        } 

        if (!$user || $user->id != Auth::id()) {
            // return redirect('/');
            echo "redirect";
            die();
        }

        $user->name = $request->input('name');
        $user->real_name = $request->input('real_name');
        $user->user_title = $request->input('title'); 
        //$user->country = $validated['country'];
        $user->gender = $request->input('gender');

        $month = $request->input('month');
        $day = $request->input('day');
        $year = $request->input('year');
        $date = $month.' '.$day.' '.$year;
        $age = date('m',strtotime($month)).'/'.$day.'/'.$year;
        
        $checkAge = checkAge($age);
        if ($checkAge < 13) 
        {
            // return redirect()->back()->with(['success' => 'The age cannot be less than 13 years old.']);
            echo "age_error";
            die();
        }

        $data['birth_date'] = date('Y-m-d', strtotime($date));  
        // $user->birth_date = $validated['birth_date'];
        $user->description = $request->input('description');
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

        // if ($request->input('primary_language') && in_array($request->input('primary_language'), $languages)) {
        //     $user->primary_language = $request->input('primary_language');
        // } else {
        //     $user->primary_language = null;
        // }

        $user->primary_language = implode(',',$request->input('primary_language'));
        if ($request->input('secondary_language') && in_array($request->input('secondary_language'), $languages)) {
            $user->secondary_language = $request->input('secondary_language');
        } else {
            $user->secondary_language = null;
        }

        // user socials
        if ($request->input('facebook_profile')) {
            $user->facebook_profile = $request->input('facebook_profile');
        }
        if ($request->input('twitch_profile')) {
            $user->twitch_profile = $request->input('twitch_profile');
        }
        if ($request->input('instagram_profile')) {
            $user->instagram_profile = $request->input('instagram_profile');
        }
        if ($request->input('tiktok_profile')) {
            $user->tiktok_profile = $request->input('tiktok_profile');
        }
        // if ($request->input('discord_handle')) {
        //     $dcHandle = explode('#', $request->input('discord_handle'));
        //     if (is_array($dcHandle) && count($dcHandle) == 2) {
        //         $user->discord_handle = $request->input('discord_handle');
        //     }
        // }
        $user->save();
        echo 1;//for success
        die();
        // return redirect()->back()->with(['success' => 'Profile has been updated.']);
    }

    public function editAvatar(Request $request)
    {
        $rules = [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096|dimensions:min_width=350,min_height=350',
            // 'profile_picture'  => 'required|mimes:jpg,png|max:4096',
            'id'  => 'required|numeric',
        ];

        $messages = [
            'profile_picture.dimensions' => "Please upload atleast (350x350)px image.",

        ];
        $this->validate($request, $rules, $messages);

        if (Auth::id() != $request->id) {
            return Response()->json([
                "success" => false,
                "file" => ''
            ]);
        }

        $user = User::whereId($request->id)->first();
        if ($files = $request->profile_picture) {

            //store file into document folder
            $file = $request->profile_picture->store('storage/avatars', 'public');

            if ($file) {
                $uprofile = $user->profile_picture;
                if (strpos($uprofile, '/storage/avatars/')) {
                    $filename = str_replace(url('/') . '/storage/avatars/', '', $uprofile);
                    if (File::exists(public_path('storage/avatars/' . $filename))) {
                        unlink(public_path('storage/avatars/' . $filename));
                    }
                }
                $user->profile_picture = url('/') . '/' . $file;

                $thumbnailFolder = storage_path() . '/app/public/avatars/thumbnail/';

                if (!File::exists($thumbnailFolder)) {
                    File::makeDirectory($thumbnailFolder, 0755, true, true);
                }

                $thumnailName = $request->profile_picture->getClientOriginalName();
                $thumnail = Image::imageThumbnail($request->profile_picture, $thumbnailFolder . $thumnailName);
                $user->profile_thumbnail = '/storage/avatars/thumbnail/' . $thumnailName;
                $user->save();
            }

            return Response()->json([
                "success" => true,
                "file" => $file
            ]);
        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }

    public function removeAvatar(Request $request)
    {


        $user = User::whereId(Auth::id())->first();
        $uprofile = $user->profile_picture;
        if (strpos($uprofile, '/storage/avatars/')) {
            $filename = str_replace(url('/') . '/storage/avatars/', '', $uprofile);
            unlink(public_path('storage/avatars/' . $filename));
        }
        $user->profile_picture = null;
        $user->save();
        return redirect()->back()->with(['success' => 'Avatar has been removed.']);
    }

    public function test()
    {
        dd(User::whereJsonContains('languages', 'german')->first()->name);
        // unlink(public_path('storage/avatars/oMxUj0FyVMmSv8ocnWHGCpzwc4wG2sIBqzAzf5km.jpg'));
    }

    //By umar
    public function user_timeline($id)
    {
        // dd("1");
        $id = intVal($id);
        
        $user = User::with('services.category','getPosts')->where('id', $id)->first();
        
        //$service->user = User::where('id', $id)->first();

        $service = new User();
        $service->user= User::where('id', $id)->first();
        $service->posts = $user->getPosts;

        
        //echo $service->user->id;die;
        // return redirect('user/'.$user->services[0]->id);
        // echo "<pre>";
        // print_r($service->user);die;
        if ($user->seller_rank == 0  || empty($user->services[0]->id)) //means normal user//
        {
            $totalOrders = shortNumber(Order::where('buyer_id', $user->id)->count());
            // $totalOrders = 500;

            $totalFollowers = shortNumber(Follower::where('user_id', $user->id)->count());
            $totalfollowing = shortNumber(Follower::where('follower_id', $user->id)->count());

            $followersList = $this->Follower->getAllFollowers($user->id);
            $followingList = $this->Follower->getAllFollowing($user->id);
            if ((Auth::user()->id) && ($user->id)) {
                $checkFollow = Follower::where('user_id', $user->id)->where('follower_id', Auth::user()->id)->first();
            } else {
                $checkFollow = '';
            }

            $blockList = $this->Block->getAllBlockers($service['user']->id);
         

            return view('services.serviceSingle', compact('service', 'totalfollowing', 'totalFollowers', 'followersList', 'followingList', 'checkFollow', 'totalOrders','blockList'));

            //return view('services.user_timeline', compact('user','service','totalfollowing', 'totalFollowers', 'followersList', 'followingList', 'checkFollow', 'totalOrders'));
        }
        else
        {
            return redirect('gp/'.$user->services[0]->id);
        }
    }

    public function is_delete(Request $request)
    {
        // Logic to deactive
        if (isset($request->id) && is_numeric($request->id)) 
        {
            $user = User::whereId($request->id)->first();
            if ($user == null) return redirect()->back()->with(['error' => 'User does not exist.']);
            // if ($user->id == Auth::id()) return redirect()->back()->with(['error' => 'You cannot ban yourself.']);
            $user->is_deleted = 1;
            $user->save();
            Auth::logout();
            return redirect('/login');
        }
    }
}
