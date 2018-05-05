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
                            <a href="{{ route('admin.admissions.index') }}" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Manage Admission
                                </li>
                            </a>
                            <a href="{{ route('admin.students') }}" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Manage Students
                                </li>
                            </a>
                            <a href="#" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Faculties
                                </li>
                            </a>
                            <a href="#" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Guardians
                                </li>
                            </a>
                            <a href="{{ route('admin.schools.index') }}" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Manage Schools
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 mt-2 mt-md-0">
                <div class="card">
                    <div class="card-body">
                        @yield('admin-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
