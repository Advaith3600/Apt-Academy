@extends('layouts.profile')

@section('title', 'You profile | ')

@section('profile-content')
    <div>
        @if (Guard::getLoggedInGuard() == ('student' || 'faculty'))
            <div class="text-center">
                <img class="shadow-sm rounded-circle" src="{{ asset(Auth::guard(Guard::getLoggedInGuard())->user()->profile_picture) }}" alt="Profile Picture" width="100" height="100" draggable="false">
                <hr>
            </div>
        @endif

        <div class="d-md-flex">
            <div class="col-md-6">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ Auth::guard(Guard::getLoggedInGuard())->user()->name }}" class="form-control" disabled>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{ Auth::guard(Guard::getLoggedInGuard())->user()->email }}" class="form-control" disabled>
            </div>
        </div>

        @if (Guard::getLoggedInGuard() == ('student' || 'faculty'))
            <div class="d-md-flex mt-3">
                <div class="{{ Guard::getLoggedInGuard() == 'student' ? 'col-md-6' : 'col-md-12' }}">
                    <label for="school">School:</label>
                    <input type="text" name="school" value="{{ Auth::guard(Guard::getLoggedInGuard())->user()->school->name }} ({{ Auth::guard(Guard::getLoggedInGuard())->user()->school->location }})" class="form-control" disabled>
                </div>

                @if (Guard::getLoggedInGuard() == 'student')
                    <div class="col-md-6 mt-3 mt-md-0">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{ Auth::guard(Guard::getLoggedInGuard())->user()->standard->class }} ({{ Auth::guard(Guard::getLoggedInGuard())->user()->standard->syllabus }})" class="form-control" disabled>
                    </div>
                @endif
            </div>
        @endif

        @if (Guard::getLoggedInGuard() == 'student')
            <div class="d-md-flex mt-3">
                <div class="col-md-12">
                    <input >
                </div>
            </div>
        @endif
    </div>
@endsection
