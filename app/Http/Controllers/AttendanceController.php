<?php

namespace App\Http\Controllers;

use App\Standard;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index(Request $request)
    {
        $standards = Standard::all();
        $carbon = Carbon::now();
        $students = Student::orderBy('id', 'desc');
       
        if (isset($request->subject) && !empty($request->subject) && $request->subject != '0') {
            $students = $students->where('subject', 'LIKE', '%' . $request->subject . '%');
        }

        if (isset($request->standard) && !empty($request->standard)) {
            $students = $students->whereHas('standard', function ($query) use ($request) {
                $query->where('id', '=', $request->standard);
            });
        }

        $students = $students->paginate(10);

        return view('admin.attendance.index')->withCarbon($carbon)->withStandards($standards)->withStudents($students);
    }
    

    public function update(Student $student, Request $request)
    {
        if ($student->attendances()->where('date', '=', $request->date)->first() != null) {
            $student->attendances()->where('date', '=', $request->date)->update([
                'attendance' => $request->attendance
            ]);
        } else {
            $student->attendances()->create([
                'date' => $request->date,
                'attendance' => $request->attendance
            ]);
        }

        return 'success';
    }
}
