@extends('layouts.admin')

@section('title', "View Student $student->id | ")

@section('admin-content')
    <div>
        <div class="text-center">
            <img class="shadow-sm rounded-circle" src="{{ asset($student->profile_picture) }}" alt="Profile Picture" width="100" height="100" draggable="false">
            <hr>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="school">Id:</label>

                <input class="form-control" value="{{ $student->id }}" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-6">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" disabled>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{ $student->email }}" class="form-control" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-6">
                <label for="school">School:</label>
                <input type="text" name="school" value="{{ $student->school->name }} ({{ $student->school->location }})" class="form-control" disabled>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <label for="standard">Standard:</label>
                <input type="text" name="standard" value="{{ $student->standard->class }} ({{ $student->standard->syllabus }})" class="form-control" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="school">Guardian Id:</label>

                <input class="form-control" value="{{ $student->guardian_id ?? 'Guardian Not specified' }}" disabled>
            </div>
        </div>

        <div class="d-md-flex mt-3">
            <div class="col-md-12">
                <label for="bio">Bio:</label>

                <textarea class="form-control" disabled>{{ $student->bio ?? 'Nothing given' }}</textarea>
            </div>
        </div>

        <div class="d-md-flex mt-3">
        	<div class="col-md-12">
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-outline-success px-4">Edit</a>
            </div>
        </div>
    </div>
@endsection
