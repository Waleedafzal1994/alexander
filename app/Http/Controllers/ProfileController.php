<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //


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
        $user = User::where('id', $request->id)->first();
        if (!$user || $user->id != Auth::id()) {
            return redirect('/');
        }
        $validated = $request->validate([
            'name' => 'required|string|min:4|max:32|unique:users,id,' . $user->id,
            'real_name' => 'required|string|min:4|max:32',
            'title' => 'nullable|string|min:2',
            'country' => 'required|string|min:2',
            'description' => 'nullable|string|max:180',
            'gender' => 'nullable',
            'primary_language' => 'nullable',
            'secondary_language' => 'nullable',
            'facebook_profile' => 'max:64|nullable',
            'twitch_profile' => 'nullable',
            'instagram_profile' => 'nullable',
            'discord_handle' => 'nullable',
        ]);
        $user->name = $validated['name'];
        $user->real_name = $validated['real_name'];
        $user->user_title = $validated['title'];
        $user->country = $validated['country'];
        $user->gender = $validated['gender'];
        $user->description = $validated['description'];
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

        if (isset($validated['primary_language']) && in_array($validated['primary_language'], $languages)) {
            $user->primary_language = $validated['primary_language'];
        } else {
            $user->primary_language = null;
        }
        if (isset($validated['secondary_language']) && in_array($validated['secondary_language'], $languages)) {
            $user->secondary_language = $validated['secondary_language'];
        } else {
            $user->secondary_language = null;
        }

        // user socials
        if (isset($validated['facebook_profile'])) {
            $user->facebook_profile = $validated['facebook_profile'];
        }
        if (isset($validated['twitch_profile'])) {
            $user->twitch_profile = $validated['twitch_profile'];
        }
        if (isset($validated['instagram_profile'])) {
            $user->instagram_profile = $validated['instagram_profile'];
        }
        if (isset($validated['discord_handle'])) {
            $dcHandle = explode('#', $validated['discord_handle']);
            if (is_array($dcHandle) && count($dcHandle) == 2) {
                $user->discord_handle = $validated['discord_handle'];
            }
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Profile has been updated.']);
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
}
