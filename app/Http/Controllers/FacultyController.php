<?php

namespace App\Http\Controllers;

use Image;
use Session;
use App\Faculty;
use App\School;
use Carbon\Carbon;
use ImageOptimizer;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index()
    {
        $faculties = Faculty::paginate(10);
        return view('admin.faculties.index')->withFaculties($faculties);
    }

    public function register()
    {
        $schools = School::all();
        return view('admin.faculties.register')->withSchools($schools);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'picture' => 'required|image',
            'school' => 'required|integer|not_in:0',
            'password' => 'required|min:6'
        ]);

        $filename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $location = public_path('images/profiles/faculties/' . $filename);
        Image::make($request->file('picture'))->fit(100, 100)->save($location);
        ImageOptimizer::optimize($location);
        $save = 'images/profiles/faculties/' . $filename;

        Faculty::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => $save,
            'school_id' => $request->school,
            'password' => bcrypt($request->password)
        ]);

        Session::flash('success', 'Faculty registered successfully');
        return back();
    }

    public function show(Faculty $faculty)
    {
        return view('admin.faculties.show')->withFaculty($faculty);
    }

    public function edit(Faculty $faculty)
    {
        $schools = School::all();
        return view('admin.faculties.edit')->withFaculty($faculty)->withSchools($schools);
    }

    public function update(Faculty $faculty, Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'school' => 'required|integer',
        ]);

        $faculty->update([
            'name' => $request->name,
            'email' => $request->email,
            'school_id' => $request->school == 0 ? null : $request->school,
            'bio' => $request->bio
        ]);

        Session::flash('success', 'Successfully saved your information');
        return back();
    }
}
