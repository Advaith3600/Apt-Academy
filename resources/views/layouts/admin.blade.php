@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="mb-0 pl-0 list-style-none">
                            <li class="c-pointer px-3 py-2{{ Request::segment(2) == 'admissions' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.admissions.index') }}" class="normalise-a">
                                    Manage Admission
                                </a>
                            </li>
                            <li class="c-pointer px-3 py-2{{ Request::segment(2) == 'students' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.students.index') }}" class="normalise-a">
                                    Manage Students
                                </a>
                            </li>
                            <li class="c-pointer text-hover-grey px-3 py-2{{ Request::segment(2) == 'faculties' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.faculties.index') }}" class="normalise-a">
                                    Manage Faculties
                                </a>
                            </li>
                            <li class="c-pointer text-hover-grey px-3 py-2{{ Request::segment(2) == 'guardians' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.guardians.index') }}" class="normalise-a">
                                    Manage Guardians
                                </a>
                            </li>
                            <li class="c-pointer px-3 py-2{{ Request::segment(2) == 'schools' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.schools.index') }}" class="normalise-a">
                                    Manage Schools
                                </a>
                            </li>

                            <li class="c-pointer px-3 py-2{{ Request::segment(2) == 'attendance' ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('admin.attendance.index') }}" class="normalise-a">
                                    Attendance
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 mt-2 mt-md-0">
                <div class="card">
                    <div class="card-body o-auto">
                        @yield('admin-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
