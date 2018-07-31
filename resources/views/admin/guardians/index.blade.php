@extends('layouts.admin')

@section('title', "Manage Guardians | ")

@section('admin-content')
	<h3 class="d-flex justify-content-between">
        Manage Guardians
        <a href="{{ route('admin.guardians.register') }}" class="btn btn-outline-success btn-sm px-3">Register</a>
    </h3>

    <div>
        <table class="table border rounded mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No: students associated with this account</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guardians as $guard)
                    <tr>
                        <td>{{ $guard->id }}</td>
                        <td>{{ $guard->name }}</td>
                        <td>{{ $guard->email }}</td>
                        <td>{{ $guard->students()->count() }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">There are no guardians registered yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $guardians->links() }}
@endsection
