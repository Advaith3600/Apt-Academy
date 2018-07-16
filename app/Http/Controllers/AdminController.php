<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use ImageOptimizer;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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

    public function profile(Request $request)
    {
        $request->validate([
            'picture' => 'required|image'
        ]);

        $image = $request->file('picture');
        $filename = sha1(time() . mt_rand()) . '.' . $image->getClientOriginalExtension();
        $location = 'images/profiles/';
        Image::make($image)->fit(100, 100)->save(public_path($location . $filename));
        ImageOptimizer::optimize($location . $filename);

        $picture = $request->model::find($request->id);

        Storage::delete($picture->profile_picture);

        $picture->update([
            'profile_picture' => $location . $filename
        ]);

        return $location . $filename;
    }
}
