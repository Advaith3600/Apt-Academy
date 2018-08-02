@extends('layouts.admin')

@section('title', "Manage Faculties | ")

@section('admin-content')
	<h3 class="d-flex justify-content-between">
        Manage Faculties
        <a href="{{ route('admin.faculties.register') }}" class="btn btn-outline-success btn-sm px-3">Register</a>
    </h3>

    <div>
        <table class="table border rounded mb-0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>School</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faculties as $faculty)
                    <tr>
                        <td>{{ $faculty->id }}</td>
                        <td>{{ $faculty->name }}</td>
                        <td>{{ $faculty->email }}</td>
                        <td>
                            {{ optional($faculty->school)->name ?? 'Other' }}
                            @if (optional($faculty->school)->location != null)
                                ({{ $faculty->school->location }})
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.faculties.show', $faculty->id) }}" class="btn btn-outline-success btn-sm">View</a>
                            <a href="{{ route('admin.faculties.edit', $faculty->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">There are no faculties registered yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $faculties->links() }}
@endsection
