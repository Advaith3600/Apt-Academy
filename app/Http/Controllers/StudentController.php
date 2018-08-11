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

    public function index(Request $request)
    {
        $students = Student::orderBy('id', 'desc');

        if (isset($request->name) && !empty($request->name)) {
            $students = $students->where('name', 'LIKE', '%' . $request->name . '%');
        }
       
        if (isset($request->subject) && !empty($request->subject) && $request->subject != '0') {
            $students = $students->where('subject', 'LIKE', '%' . $request->subject . '%');
        }

        if (isset($request->standard) && !empty($request->standard)) {
            $students = $students->whereHas('standard', function ($query) use ($request) {
                $query->where('id', '=', $request->standard);
            });
        }

        $students = $students->paginate(10);
        
        $standards = Standard::all();

        return view('admin.students.index')->withStudents($students)->withStandards($standards);
    }

    public function register()
    {
        $standards = Standard::all();
        $schools = School::all();
        return view('admin.students.register')->withStandards($standards)->withSchools($schools);
    }

    public function store(Request $request)
    {
        $request->subject = serialize(json_decode($reqeust->subject));

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'standard' => 'required|integer',
            'picture' => 'required|image',
            'school' => 'required|integer|not_in:0'
        ]);

        $filename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $location = public_path('images/profiles/students/' . $filename);
        Image::make($request->file('picture'))->fit(100, 100)->save($location);
        ImageOptimizer::optimize($location);
        $save = 'images/profiles/students/' . $filename;

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
        $request->subject = serialize(json_decode($request->subject));

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
            'school_id' => $request->school == 0 ? null : $request->school,
            'bio' => $request->bio,
            'standard_id' => $request->standard,
            'guardian_id' => optional(Guardian::where('email', $request->email)->first())->id,
            'subject' => $request->subject
        ]);

        Session::flash('success', 'Successfully saved your information');
        return back();
    }
}
