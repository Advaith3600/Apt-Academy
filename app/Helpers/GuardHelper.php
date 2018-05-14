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

    public static function check()
    {
        $guards = [
            'web', 'student', 'faculty', 'guardian', 'admin'
        ];

        if (Auth::guard('student')->check() || Auth::guard('guardian')->check() || Auth::guard('faculty')->check() || Auth::guard('admin')->check() || Auth::guard('web')->check()) {
            return true;
        } else {
            return false;
        }
    }
}
