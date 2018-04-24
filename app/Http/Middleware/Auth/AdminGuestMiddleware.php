<?php

namespace App\Http\Middleware\Auth;

use Auth;
use Closure;

class AdminGuestMiddleware
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
        if (Auth::guard('admin')->guest()) {
            return $next($request);
        }
        return redirect('/admin');
    }
}
