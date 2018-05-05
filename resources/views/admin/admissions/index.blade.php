@extends('layouts.admin')

@section('title', "Manage Admissions | ")

@section('admin-content')
    <h3>Manage Admissions</h3>

    <div class="w-100 o-auto">
        <table class="table border rounded">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Standard</th>
                    <th>School</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admissions as $admission)
                    <tr>
                        <td>{{ $admission->name }}</td>
                        <td>{{ $admission->email }}</td>
                        <td>{{ $admission->standard->class }} ({{ $admission->standard->syllabus }})</td>
                        <td>{{ $admission->school->name }} ({{ $admission->school->location }})</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
