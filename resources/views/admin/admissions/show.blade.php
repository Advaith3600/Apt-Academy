@extends('layouts.admin')

@section('title', "Manage Admissions | ")

@section('admin-content')
    <h3>Admission id: {{ $admission->id }}</h3>

    <hr />

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="name" class="col-form-label">{{ __('Student\'s Name:') }}</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>

                        <input id="name" type="text" class="form-control" name="name" placeholder="Student's Name" value="{{ $admission->name }}" autofocus disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Student\'s E-Mail Address:') }}</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        <input id="email" type="email" class="form-control" name="email" value="{{ $admission->email }}" placeholder="Student's E-Mail Address" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="standard" class="col-form-label">{{ __('Satndard:') }}</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-graduation-cap"></i>
                            </span>
                        </div>

                        <input type="text" disabled class="form-control" value="{{ $admission->standard->class }} ({{ $admission->standard->syllabus }})">
                    </div>
                </div>

                <div class="form-group">
                    <label for="school" class="col-form-label">{{ __('School:') }}</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control" disabled value="{{ $admission->school->name }} ({{ $admission->school->location }})">
                    </div>
                </div>

                <div class="form-group">
                    <label for="note" class="col-form-label">{{ __('Request Note:') }}</label>

                    <div>
                        <textarea id="note" class="form-control" name="note" placeholder="Your Request Note" rows="4" disabled>{{ $admission->note }}</textarea>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <form action="{{ route('admin.admissions.accept', $admission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-success px-3">
                                {{ __('Accept Admission') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3">
                <img src="{{ asset($admission->picture) }}" alt="Apt Academy Admission Student's photo" class="w-100" draggable="false">

                @if ($admission->grades != null)
                    <img src="{{ asset($admission->grades) }}" alt="Apt Academy Admission Student's grades photo" class="w-100 mt-3" draggable="false">
                @endif
            </div>
        </div>
    </div>
@endsection
