<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guard.guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $guards = [
            'web', 'student', 'faculty', 'guardian', 'admin'
        ];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();

                $request->session()->invalidate();

                return redirect()->back();
            }
        }
    }

    protected function guard()
    {
        return Auth::guard(Input::get('guard'));
    }
}
