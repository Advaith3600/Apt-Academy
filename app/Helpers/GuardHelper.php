<?php

namespace App\Helpers;

use Auth;

class GuardHelper
{
    public static function getLoggedInGuard()
    {
        $guards = [
            'web', 'student', 'faculty', 'guardian', 'admin'
        ];
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
    }
}
