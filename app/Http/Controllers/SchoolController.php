<?php

namespace App\Http\Controllers;

use Session;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('admin.schools.index')->withSchools($schools);
    }

    public function create()
    {
        return view('admin.schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'location' => 'required'
        ]);

        School::create([
            'name' => $request->name,
            'location' => $request->location
        ]);

        Session::flash('success', 'A new school was successfully added');
        return back();
    }
}
