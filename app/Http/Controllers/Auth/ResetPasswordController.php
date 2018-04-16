<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Password;
use App\User;
use App\Faculty;
use App\Student;
use App\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        if (User::where('email', '=', Input::get('email'))->get()->first()) {
            return Auth::guard('web');
        }

        else if (Faculty::where('email', '=', Input::get('email'))->get()->first()) {
            return Auth::guard('faculty');
        }

        else if (Student::where('email', '=', Input::get('email'))->get()->first()) {
            return Auth::guard('student');
        }

        else if (Guardian::where('email', '=', Input::get('email'))->get()->first()) {
            return Auth::guard('guardian');
        }
    }

    protected function broker()
    {
        if (User::where('email', '=', Input::get('email'))->get()->first()) {
            return Password::broker('users');
        }

        else if (Faculty::where('email', '=', Input::get('email'))->get()->first()) {
            return Password::broker('faculty');
        }

        else if (Student::where('email', '=', Input::get('email'))->get()->first()) {
            return Password::broker('student');
        }

        else if (Guardian::where('email', '=', Input::get('email'))->get()->first()) {
            return Password::broker('guardian');
        }
    }
}
