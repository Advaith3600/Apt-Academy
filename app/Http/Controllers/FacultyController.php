<?php

namespace App\Http\Controllers;

use App\Faculty;

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
}
