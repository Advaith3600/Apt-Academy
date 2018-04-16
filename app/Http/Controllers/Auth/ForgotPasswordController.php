<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guard.guest');
    }

    protected function guard()
    {
        return Auth::guard(Input::get('guard'));
    }

    protected function broker()
    {
        if (Input::get('guard') == 'web') {
            return Password::broker('users');
        }
        return Password::broker(Input::get('guard'));
    }
}
