<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class completlyRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::user())) 
        {
            if (Auth::user()->gender == null || Auth::user()->birth_date == null) {

                Auth::user()->setProfileCompleteAttribute(0);
            }
            else
            {
                Auth::user()->setProfileCompleteAttribute(1);
            }
            
        }
        return $next($request);
    }
}