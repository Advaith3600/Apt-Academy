<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Session;
use App\School;
use App\Student;
use App\Standard;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin.auth');
    }

    public function index()
    {
        $students = Student::all();
        return view('admin.students.index')->withStudents($students);
    }

    public function register()
    {
        $standards = Standard::all();
        $schools = School::all();
        return view('admin.students.register')->withStandards($standards)->withSchools($schools);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'standard' => 'required|integer',
            'picture' => 'required|image',
            'school' => 'required|integer'
        ]);

        $filename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $location = public_path('images/admissions/' . $filename);
        Image::make($request->file('picture'))->save($location);
        $save = 'images/admissions/' . $filename;

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'standard_id' => $request->standard,
            'profile_picture' => $save,
            'school_id' => $request->school,
            'password' => bcrypt(strtolower($request->name) . '@apt')
        ]);

        Session::flash('success', 'Student registered successfully');
        return back();
    }
}
