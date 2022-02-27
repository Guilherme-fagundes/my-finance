<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserCheckLoginMiddleware
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
        if ($request->session()->has('userId') == false){
            return redirect('/app/login');
        }
        return $next($request);
    }
}
