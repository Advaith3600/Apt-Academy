<?php

namespace App\Http\Controllers;

use App\Guardian;
use App\School;
use App\Standard;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Session;
use ImageOptimizer;

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
            'school' => 'required|integer|not_in:0'
        ]);

        $filename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $location = public_path('images/profiles/' . $filename);
        Image::make($request->file('picture'))->fit(100, 100)->save($location);
        ImageOptimizer::optimize($location);
        $save = 'images/profiles/' . $filename;

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

    public function show(Student $student)
    {
        return view('admin.students.show')->withStudent($student);
    }

    public function edit(Student $student)
    {
        $standards = Standard::all();
        $schools = School::all();

        return view('admin.students.edit')->withStudent($student)
                                          ->withStandards($standards)
                                          ->withSchools($schools);
    }

    public function update(Student $student, Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'school' => 'required|integer',
            'standard' => 'required|integer',
            'guardian_email' => 'sometimes|nullable|email|max:191'
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'school_id' => $request->school,
            'bio' => $request->bio,
            'standard_id' => $request->standard,
            'guardian_id' => optional(Guardian::where('email', $request->email)->first())->id
        ]);

        Session::flash('success', 'Successfully saved your information');
        return back();
    }
}
