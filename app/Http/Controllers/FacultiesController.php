<?php

namespace App\Http\Controllers;

use App\Faculty;

class FacultiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index()
    {
        $faculties = Faculty::all();
        return view('admin.faculties.index')->withFaculties($faculties);
    }
}
