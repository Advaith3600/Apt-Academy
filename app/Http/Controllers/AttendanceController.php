<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function update(Student $student, Request $request)
    {
        if ($student->attendances()->where('date', '=', date('Y-m-d'))->first() != null) {
            $student->attendances()->where('date', '=', date('Y-m-d'))->update([
                'attendance' => $request->attendance
            ]);
        } else {
            $student->attendances()->create([
                'date' => date('Y-m-d'),
                'attendance' => $request->attendance
            ]);
        }

        return 'success';
    }
}
