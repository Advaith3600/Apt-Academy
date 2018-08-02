@extends('layouts.admin')

@section('title', "View Faculty $faculty->id | ")

@section('admin-content')
    <div>
        <div class="text-center">
            <img class="shadow-sm rounded-circle" src="{{ asset($faculty->profile_picture) }}" alt="Profile Picture" width="100" height="100" draggable="false">
            <hr>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="school">Id:</label>

                <input class="form-control" value="{{ $faculty->id }}" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-6">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $faculty->name }}" class="form-control" disabled>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{ $faculty->email }}" class="form-control" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="school">School:</label>
                <input type="text" name="school" value="{{ optional($faculty->school)->name ?? 'Other' }} @if (optional($faculty->school)->location != null)({{ $faculty->school->location }}) @endif" class="form-control" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="bio">Bio:</label>

                <textarea class="form-control" disabled>{{ $faculty->bio ?? 'Nothing given' }}</textarea>
            </div>
        </div>

        <div class="d-md-flex mt-3">
        	<div class="col-md-12">
                <a href="{{ route('admin.faculties.edit', $faculty->id) }}" class="btn btn-outline-success px-4">Edit</a>
            </div>
        </div>
    </div>
@endsection
