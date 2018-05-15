@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="d-md-flex">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="mb-0 pl-0 list-style-none">
                            <li class="c-pointer px-3 py-2{{ Request::is('profile') ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('profile') }}" class="normalise-a ">
                                    View Profile
                                </a>
                            </li>

                            <li class="c-pointer px-3 py-2{{ Request::is('profile/edit') ? ' bg-success text-white' : ' text-hover-grey' }}" onclick="event.currentTarget.children[0].click()">
                                <a href="{{ route('profile.edit') }}" class="normalise-a ">
                                    Edit Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 mt-md-0 mt-3">
                <div class="card">
                    <div class="card-body">
                        @yield('profile-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
