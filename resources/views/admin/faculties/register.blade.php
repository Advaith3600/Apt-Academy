@extends('layouts.admin')

@section('title', 'Register new Faculty | ')

@section('admin-content')
    <form action="{{ route('admin.faculties.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('Faculty\'s Name:') }}</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>

                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Faculty's Name" autofocus required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">{{ __('Faculty\'s E-Mail Address:') }}</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Faculty's E-Mail Address" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row d-flex">
            <div class="col-md-12 mb-3 mb-md-0">
                <label for="picture" class="col-form-label">{{ __('Faculty\'s photo:') }}</label>

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
        </div>

        <div class="form-group">
            <label for="school" class="col-form-label">{{ __('School:') }}</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>

                <select class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school">
                    <option value="0">Select School</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">
                            {{ $school->name }}
                            @if ($school->location != null)
                                ({{ $school->location }})
                            @endif
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('school'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('school') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row d-flex">
            <div class="col-md-12 mb-3 mb-md-0">
                <label for="password" class="col-form-label">{{ __('Account Password:') }}</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                    </div>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group mb-0">
            <div>
                <button type="submit" class="btn btn-outline-success btn-block">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection
