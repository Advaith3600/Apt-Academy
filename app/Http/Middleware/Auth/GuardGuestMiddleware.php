<?php

namespace App\Http\Middleware\Auth;

use Auth;
use Closure;

class GuardGuestMiddleware
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
        if (Auth::guard('student')->guest() && Auth::guard('guardian')->guest() && Auth::guard('faculty')->guest() && Auth::guard('admin')->guest() && Auth::guard('web')->guest()) {
            return $next($request);
        }
        return redirect('/');
    }
}
