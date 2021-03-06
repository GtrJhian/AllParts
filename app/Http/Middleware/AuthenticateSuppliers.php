<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateSuppliers
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
        if(!(Auth::user()->user_access & 0x10)) return redirect('Restricted');
        return $next($request);
    }
}
