<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OAuthController extends Controller
{
    //

    public function loginDiscord() {
        if(!Auth::check()) {
            return Socialite::driver('discord')->redirect();
        } else {
            return redirect('/');
        }
    }

    public function loginDiscordCallback(Request $request) {
        if(isset($request->error) && $request->error != "") {
            return redirect('/');
        }
        if(Auth::check()) {
            return redirect('/');
        }
        $user = Socialite::driver('discord')->user();
        if(isset($user) && isset($user->id)) {
            $userInDb = User::where('discord_id',$user->id)->first();
            if($userInDb) {
                Auth::loginUsingId($userInDb->id);
            } else {
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->password = Hash::make('T0PSEC3RETD1SC0RDP4SSW0RD');
                $newUser->email = $user->email;
                $newUser->discord_id = $user->id;
                $newUser->email_verified_at = Carbon::now();
                $newUser->profile_picture = $user->avatar;
                $newUser->save();
                Auth::loginUsingId($newUser->id);
            }
        }
        return redirect('/');
    }

}
