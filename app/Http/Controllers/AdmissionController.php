<?php

namespace App\Http\Controllers;

use Image;
use Session;
use App\School;
use App\Standard;
use Carbon\Carbon;
use App\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $standards = Standard::all();
        $schools = School::all();
        return view('admission.index')->withStandards($standards)->withSchools($schools);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:admissions|unique:students|unique:faculties|unique:guardians|unique:admins|unique:users',
            'standard' => 'not_in:0|integer',
            'school' => 'not_in:0|integer',
            'picture' => 'required|image',
            'grades' => 'sometimes|image',
            'note' => 'required|min:10'
        ]);

        $pfilename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $plocation = public_path('images/admissions/' . $pfilename);
        Image::make($request->file('picture'))->save($plocation);
        $psave = 'images/admissions/' . $pfilename;

        if ($request->hasFile('grades')) {
            $gfilename = sha1(Carbon::now()->addSecond()) . '.' . $request->file('picture')->getClientOriginalExtension();
            $glocation = public_path('images/grades/' . $gfilename);
            Image::make($request->file('grades'))->save($glocation);
            $gsave = 'images/admissions/' . $gfilename;
        }

        Admission::create([
            'name' => $request->name,
            'email' => $request->email,
            'standard_id' => $request->standard,
            'school_id' => $request->school,
            'picture' => $psave,
            'grades' => ($request->hasFile('grades') ? $gsave : null),
            'note' => $request->note
        ]);

        Session::flash('success', 'Your admission request has been successfully sent');
        return back();
    }

    public function adminIndex()
    {
        $admissions = Admission::where('accepted', '!=', true)->get();
        return view('admin.admissions.index')->withAdmissions($admissions);
    }
}
