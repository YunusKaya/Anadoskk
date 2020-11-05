<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            switch (Auth::user()->role)
            {
                case "admin" :
                    return redirect()->route('admin.dashboard');
                case "writer" :
                    return redirect()->route('writer.panel.dashboard');
                case "user" :
                    return redirect()->route('home');

            }
        }
        return $next($request);
    }
}
