<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Mail\RegistrationAccepted;
use App\School;
use App\Standard;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use ImageOptimizer;
use Mail;
use App\Mail\RegistrationRejected;
use Session;

class AdmissionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin.auth', ['except' => ['create', 'store']]);
    }

    public function index(Request $request)
    {
        $admissions = Admission::orderBy('id', 'desc');
        $sort = null;

        if (isset($request->sort)) {
            if ($request->sort == 1) {
                $sort = true;
            }

            if ($request->sort == 2) {
                $sort = false;
            }
        }

        $admissions = $admissions->where('accepted', '=', $sort)->paginate(10);

        return view('admin.admissions.index')->withAdmissions($admissions);
    }

    public function create()
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
            'school' => 'integer',
            'picture' => 'required|image',
            'grades' => 'sometimes|image',
            'note' => 'required|min:10'
        ]);

        $pfilename = sha1(Carbon::now()) . '.' . $request->file('picture')->getClientOriginalExtension();
        $plocation = public_path('images/admissions/' . $pfilename);
        Image::make($request->file('picture'))->fit(200, 200)->save($plocation);
        ImageOptimizer::optimize($plocation);
        $psave = 'images/admissions/' . $pfilename;

        if ($request->hasFile('grades')) {
            $gfilename = sha1(Carbon::now()->addSecond()) . '.' . $request->file('picture')->getClientOriginalExtension();
            $glocation = public_path('images/grades/' . $gfilename);
            Image::make($request->file('grades'))->save($glocation);
            ImageOptimizer::optimize($glocation);
            $gsave = 'images/admissions/' . $gfilename;
        }

        Admission::create([
            'name' => $request->name,
            'email' => $request->email,
            'standard_id' => $request->standard,
            'school_id' => $request->school == 0 ? null : $request->School,
            'picture' => $psave,
            'grades' => ($request->hasFile('grades') ? $gsave : null),
            'note' => $request->note
        ]);

        Session::flash('success', 'Your admission request has been successfully sent');
        return back();
    }

    public function show(Admission $admission)
    {
        $standards = Standard::all();
        $schools = School::all();
        return view('admin.admissions.show')->withAdmission($admission)->withStandards($standards)->withSchools($schools);
    }

    public function accept(Admission $admission)
    {
        $newLocation = '/images/profiles/' . explode('/', $admission->picture)[2];

        Student::create([
            'name' => $admission->name,
            'email' => $admission->email,
            'profile_picture' => $newLocation,
            'school_id' => $admission->school_id,
            'standard_id' => $admission->standard_id,
            'password' => bcrypt(strtolower($admission->name) . '@apt')
        ]);

        rename(public_path($admission->picture), public_path($newLocation));

        $admission->update([
            'accepted' => true,
            'picture' => $newLocation
        ]);

        Mail::to($admission->email)->send(new RegistrationAccepted($admission));

        Session::flash('success', 'Successfully accepted the admission request');
        return redirect()->route('admin.admissions.');
    }

    public function reject(Admission $admission)
    {
        $admission->update([
            'accepted' => false
        ]);

        Mail::to($admission->email)->send(new RegistrationRejected($admission));

        Session::flash('success', 'Successfully rejected the admission request');
        return redirect()->route('admin.admissions.');
    }
}
