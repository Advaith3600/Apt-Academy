@extends('layouts.admin')

@section('title', 'Manage Students | ')

@section('admin-content')
    <h3 class="d-flex justify-content-between">
        Manage Students
        <a href="{{ route('admin.students.register') }}" class="btn btn-outline-success btn-sm px-3">
            Register
        </a>
    </h3>

    <table class="table border rounded">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Standard</th>
                <th>School</th>
                <th></th>
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
                    <td>
                        <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-outline-success">View</a>

                        <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5">There are no students registered yet</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
