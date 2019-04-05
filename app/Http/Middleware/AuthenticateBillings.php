<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateBillings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) return route('login');
        if(!(Auth::user()->user_access & 0x08)) return redirect('Restricted');
        return $next($request);
    }
}
