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
                @forelse ($admissions as $admission)
                    <tr>
                        <td>{{ $admission->name }}</td>
                        <td>{{ $admission->email }}</td>
                        <td>
                            {{ $admission->standard->class }}
                            @if ($admission->standard->syllabus != null)
                                ({{ $admission->standard->syllabus }})
                            @endif
                        </td>
                        <td>
                            {{ optional($admission->school)->name ?? 'Other' }} 
                            @if (optional($admission->school)->location != null)
                                ({{ $admission->school->location }})
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.admissions.show', $admission->id) }}" class="btn btn-outline-success btn-sm px-3">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">No new Admission requests</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
