<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin.auth', ['except' => ['showLoginForm', 'login']]);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('admin');
        }
        
        $mb = new MessageBag;
        $mb->add('email', 'Oops! Something went wrong. Check your email and password again.');

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors($mb);
    }
}
