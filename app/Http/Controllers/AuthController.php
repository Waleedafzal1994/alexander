<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
            // 'captcha' => 'required|captcha'
        ];

        $messages = [
            // 'captcha.required' => "The captcha field is required.",
            // 'captcha.captcha' => "Captcha entered is not correct."

        ];
        $this->validate($request, $rules, $messages);

        try {
            $credentials = request([
                'email',
                'password'
            ]);

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'code' => 200,
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'code' => 401,
                    'message' => "Invalid credentials!"
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function signup(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:25'],
            'real_name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 'string', 'min:8',    'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'max:255', 'confirmed'
            ],
            'tnc' => 'required|accepted'
        ];

        $messages = [
            'password.min' => 'Password must be at least 8 characters. ',
            'password.regex' => 'Password must contain at least one Uppercase, Number, & Special character.'
            // 'password.regex' => 'Password must contain at least one uppercase character, one number, and one special character.'
        ];
        $this->validate($request, $rules, $messages);

        try {
            $user = User::create([
                'name' => $request->name,
                'real_name' => $request->real_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tnc' => 1
            ]);
            Auth::login($user);
            return response()->json([
                'status' => true,
                'code' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
