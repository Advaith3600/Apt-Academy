<?php

namespace App\Http\Controllers;

use Session;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin.auth');
    }
    
    public function index()
    {
        $schools = School::paginate(10);
        return view('admin.schools.index')->withSchools($schools);
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191'
        ]);

        School::create([
            'name' => $request->name,
            'location' => $request->location
        ]);

        Session::flash('success', 'A new school was successfully added');
        return back();
    }
}
