@extends('layouts.profile')

@section('title', 'Change Password | ')

@section('profile-content')
    <form action="{{ route('profile.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="old_password">Enter your old password:</label>

            <input required type="password" name="old_password" placeholder="Enter your Old Password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}">

            @if ($errors->has('old_password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('old_password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-3">
            <label for="new_password">Enter your new password:</label>

            <input required type="password" name="new_password" placeholder="Enter your new password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}">

            @if ($errors->has('new_password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-3">
            <label for="new_password_confirmation">Confirm your new password:</label>

            <input required type="password" name="new_password_confirmation" placeholder="Confirm your new password" class="form-control">
        </div>

        <div class="mt-3 text-right">
            <input type="submit" class="btn btn-outline-danger px-3" value="Change Password">
        </div>
    </form>
@endsection
