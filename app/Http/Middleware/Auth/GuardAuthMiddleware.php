<?php

namespace App\Http\Middleware\Auth;

use Auth;
use Closure;

class GuardAuthMiddleware
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
        if (Auth::guard('student')->check() || Auth::guard('guardian')->check() || Auth::guard('faculty')->check() || Auth::guard('admin')->check() || Auth::guard('web')->check()) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
