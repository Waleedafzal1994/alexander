<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRank
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
        if (Auth::user()->seller_rank != '0') 
        {
            if (!empty($request->route('id'))) 
            {
                $id = $request->route('id');
                return redirect('/gpplus/'.$id); 
            }
            else
            {
                return redirect('/gpplus'); 
            } 
        }
        else
        {
            return $next($request); 
        }
        
    }
}