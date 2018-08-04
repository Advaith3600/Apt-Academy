<?php

namespace App\Http\Controllers;

use App\Guardian;
use Auth;
use Guard;
use Illuminate\Http\Request;
use Session;

class GuardianController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth', ['except' => 'manage']);
    }

    public function index()
    {
        $guardians = Guardian::paginate(10);
        return view('admin.guardians.index')->withGuardians($guardians);
    }

    public function register()
    {
        return view('admin.guardians.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:admissions|unique:students|unique:faculties|unique:guardians|unique:admins|unique:users',
            'password' => 'required'
        ]);

        Guardian::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Session::flash('success', 'Guardian registerd successfully');
        return redirect()->route('admin.guardians.index');
    }

    public function manage()
    {
        $students = Auth::guard('guardian')->user()->students;
        return view('profile.guardians.index')->withStudents($students);
    }
}
