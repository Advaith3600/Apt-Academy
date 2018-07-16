<?php

namespace App\Http\Middleware;

use Request;
use Closure;

class SetTimezone
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
        try {
            $ip = file_get_contents('http://ip-api.com/json/' . Request::ip());
            $ip = json_decode($ip);
            $timezone = $ip->timezone;
        } catch (\Exception $e) {
            $timezone = 'UTC';
        }

        date_default_timezone_set($timezone);

        return $next($request);
    }
}
