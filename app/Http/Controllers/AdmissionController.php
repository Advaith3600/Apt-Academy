<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        return view('admission.index');
    }
}
