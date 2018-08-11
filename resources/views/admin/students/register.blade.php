@extends('layouts.admin')

@section('title', 'Register new Student | ')

@section('admin-content')
    <form action="{{ route('admin.students.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="standard" class="col-form-label">{{ __('Standard:') }}</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                </div>

                <select class="form-control{{ $errors->has('standard') ? ' is-invalid' : '' }}" name="standard" v-model="standard">
                    <option value="0">Select standard</option>
                    @foreach ($standards as $standard)
                        <option value="{{ $standard->id }}">
                            {{ $standard->class }}
                            @if ($standard->syllabus != null)
                                ({{ $standard->syllabus }})
                            @endif
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('standard'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('standard') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <subject-selection :standard="standard" select=""></subject-selection>
        </div>

        <div class="form-group">
            <div class="mb-3 mb-md-0">
                <label for="picture" class="col-form-label">{{ __('Student\'s photo:') }}</label>

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

        <div class="form-group mb-0">
            <div>
                <button type="submit" class="btn btn-outline-success btn-block">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/component.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                standard: 0
            }
        });
    </script>
@endsection