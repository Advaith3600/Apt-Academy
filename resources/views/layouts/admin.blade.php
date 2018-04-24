@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="mb-0 pl-0 list-style-none">
                            <a href="{{ route('admin.students') }}" class="normalise-a">
                                <li class="c-pointer text-hover-grey px-3 py-2">
                                    Students
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
