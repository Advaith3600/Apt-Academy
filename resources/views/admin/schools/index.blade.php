@extends('layouts.admin')

@section('title', "Manage Schools | ")

@section('admin-content')
    <h3>
        Manage Schools
        <a href="{{ route('admin.schools.create') }}" class="btn btn-primary btn-sm float-right">Create</a>
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
