<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\School;
use App\Standard;
use Auth;
use Guard;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Session;
use Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('guard.auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        $standards = Standard::all();
        $schools = School::all();

        return view('profile.edit')->withStandards($standards)->withSchools($schools);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'school' => 'sometimes|integer',
            'standard' => 'sometimes|integer',
            'guardian_email' => 'sometimes|nullable|email|max:191'
        ]);

        $datas = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (Guard::getLoggedInGuard() == 'student' || Guard::getLoggedInGuard() == 'faculty') {
            $datas['school_id'] = $request->school;
            $datas['bio'] = $request->bio;
        }

        if (Guard::getLoggedInGuard() == 'student') {
            $datas['standard_id'] = $request->standard;
            $datas['guardian_id'] = optional(Guardian::where('email', $request->email)->first())->id;
        }

        Auth::guard(Guard::getLoggedInGuard())->user()->update($datas);

        Session::flash('success', 'Successfully saved your information');
        return back();
    }

    public function passwordUpdatePicture(Request $request)
    {
        $request->validate([
            'picture' => 'required|image'
        ]);

        $image = $request->file('picture');
        $filename = sha1(time() . mt_rand()) . '.' . $image->getClientOriginalExtension();
        $location = '/images/profiles/';
        $image->move(public_path($location), $filename);

        Storage::delete(Auth::guard(Guard::getLoggedInGuard())->user()->profile_picture);

        Auth::guard(Guard::getLoggedInGuard())->user()->update([
            'profile_picture' => $location . $filename
        ]);

        return asset($location . $filename);
    }

    public function password()
    {
        return view('profile.password');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|min:4',
            'new_password' => 'required|string|min:4|confirmed'
        ]);

        if (!Hash::check($request->old_password, Auth::guard(Guard::getLoggedInGuard())->user()->password)) {
            $errors = new MessageBag();
            $errors->add('old_password', 'Old Password does not match');
            return back()->withErrors($errors);
        }

        Auth::guard(Guard::getLoggedInGuard())->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        Session::flash('success', 'Your password was updated successfully');
        return back();
    }
}
