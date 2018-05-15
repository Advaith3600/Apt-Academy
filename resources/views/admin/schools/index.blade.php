@extends('layouts.admin')

@section('title', "Manage Schools | ")

@section('admin-content')
    <h3 class="d-flex justify-content-between">
        Manage Schools
        <a href="{{ route('admin.schools.create') }}" class="btn btn-outline-success btn-sm px-3">Create</a>
    </h3>

    <div>
        <table class="table border rounded">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schools as $school)
                    <tr>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->location }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="2">Nothing found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
