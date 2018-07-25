@extends('layouts.admin')

@section('title', "Add a new School | ")

@section('admin-content')
    <form action="{{ route('admin.schools.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">{{ __('School Name') }}</label>

            <div class="input-group">
                <input required id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="location" class="col-form-label">{{ __('School Location') }}</label>

            <div class="input-group">
                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" placeholder="Location">

                @if ($errors->has('location'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <input type="submit" value="Add School" class="btn btn-outline-success px-3">
    </form>
@endsection
