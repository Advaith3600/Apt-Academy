@extends('layouts.admin')

@section('title', "Manage Admissions | ")

@section('admin-content')
    <div class="d-flex justify-content-between">
        <h3>Manage Admissions</h3>

        <form action="{{ Request::url() }}">
            <div class="input-group input-group-sm">
                <select name="sort" class="form-control">
                    <option value="0">View all pending requests</option>
                    <option value="1" {{ isset($_GET['sort']) && $_GET['sort'] == 1 ? 'selected' : '' }}>View all accepted requests</option>
                    <option value="2" {{ isset($_GET['sort']) && $_GET['sort'] == 2 ? 'selected' : '' }}>View all rejected requests</option>
                </select>

                <button class="input-group-append btn btn-success btn-sm align-items-center">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="w-100 o-auto">
        <table class="table border rounded mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Standard</th>
                    <th>Subject</th>
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
                        <td>{{ $admission->subject }}</td>
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

        {{ $admissions->links() }}
    </div>
@endsection
