@extends('layouts.admin')

@section('title', 'Manage Students | ')

@section('admin-content')
    <h3>Manage Students</h3>

    <table class="table border rounded">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Standard</th>
                <th>School</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->standard->class }} ({{ $student->standard->syllabus }})</td>
                    <td>{{ $student->school->name }} ({{ $student->school->location }})</td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5">There are no students registered yet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
