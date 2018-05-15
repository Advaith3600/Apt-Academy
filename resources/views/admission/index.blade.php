@extends('layouts.app')

@section('title', "Online Admission | ")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Welcome to Apt Academy Online Registration</h3>
                    </div>

                    <div class="card-body row justify-content-center">
                        <form action="{{ route('admission.store') }}" method="post" class="col-lg-8" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Student\'s Name:') }}</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>

                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Student's Name" autofocus required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
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

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Student's E-Mail Address" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="standard" class="col-form-label">{{ __('Next Standard:') }}</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-graduation-cap"></i>
                                        </span>
                                    </div>

                                    <select class="form-control{{ $errors->has('standard') ? ' is-invalid' : '' }}" name="standard">
                                        <option value="0">Select the standard you want to take admission</option>
                                        @foreach ($standards as $standard)
                                            <option value="{{ $standard->id }}">{{ $standard->class }} ({{ $standard->syllabus }})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('standard'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('standard') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row d-flex">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="picture" class="col-form-label">{{ __('Your photo:') }}</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-image"></i>
                                            </span>
                                        </div>

                                        <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required>

                                        @if ($errors->has('picture'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="grades" class="col-form-label">{{ __('Picture of your previous year\'s grades:') }}</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-image"></i>
                                            </span>
                                        </div>

                                        <input id="grades" type="file" class="form-control{{ $errors->has('grades') ? ' is-invalid' : '' }}" name="grades">

                                        @if ($errors->has('grades'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('grades') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="school" class="col-form-label">{{ __('Select the school in which you are studying:') }}</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>

                                    <select class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school">
                                        <option value="0">Select School</option>
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->id }}">{{ $school->name }} ({{ $school->location }})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('school'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('school') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note" class="col-form-label">{{ __('Your Request Note:') }}</label>

                                <div>
                                    <textarea id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" placeholder="Your Request Note" rows="4" required>{{ old('note') }}</textarea>

                                    @if ($errors->has('note'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-outline-success btn-block">
                                        {{ __('Send Request') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
