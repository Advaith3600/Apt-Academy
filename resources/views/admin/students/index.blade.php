@extends('layouts.admin')

@section('title', 'Manage Students | ')

@section('admin-content')
    <h3 class="d-flex justify-content-between">
        Manage Students
        <a href="{{ route('admin.students.register') }}" class="btn btn-outline-success btn-sm px-3">
            Register
        </a>
    </h3>

    <div class="mb-3">
        <form method="get" action="{{ Request::url() }}" class="d-flex justify-content-between">
            <div class="d-flex align-items-center flex-wrap flex-sm-nowrap">
                <span class="mr-1">Standard:</span>

                <div class="input-group input-group-sm">
                    <select class="form-control" name="standard">
                        <option value="">View all</option>
                        @foreach ($standards as $standard)
                            <option value="{{ $standard->id }}" {{ isset($_GET['standard']) && $_GET['standard'] == $standard->id ? 'selected' : '' }}>
                                {{ $standard->class }}
                                @if ($standard->syllabus != null)
                                    ({{ $standard->syllabus }})
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

                <span class="mx-1">Subject:</span>

                <div class="input-group input-group-sm">
                    <select name="subject" id="subject" class="form-control">
                        <option value="0">View All</option>
                        <option value="Science" {{ isset($_GET['subject']) && $_GET['subject'] == 'Science' ? 'selected' : '' }}>Science</option>
                        <option value="Maths" {{ isset($_GET['subject']) && $_GET['subject'] == 'Maths' ? 'selected' : '' }}>Maths</option>
                        <option value="Physics" {{ isset($_GET['subject']) && $_GET['subject'] == 'Physics' ? 'selected' : '' }}>Physics</option>
                        <option value="Chemistry" {{ isset($_GET['subject']) && $_GET['subject'] == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                        <option value="Biology" {{ isset($_GET['subject']) && $_GET['subject'] == 'Biology' ? 'selected' : '' }}>Biology</option>
                        <option value="Computer" {{ isset($_GET['subject']) && $_GET['subject'] == 'Computer' ? 'selected' : '' }}>Computer</option>
                    </select>

                    <button class="input-group-append btn btn-success btn-sm align-items-center">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="search box" aria-describedby="search box" placeholder="search by name" name="name" value="{{ $_GET['name'] ?? '' }}">

                    <button class="input-group-append btn btn-success btn-sm align-items-center">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table class="table border rounded mb-0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Standard</th>
                <th>Subject</th>
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
                    <td>
                        {{ $student->standard->class }}
                        @if ($student->standard->syllabus != null)
                            ({{ $student->standard->syllabus }})
                        @endif
                    </td>
                    <td>{{ $student->subject }}</td>
                    <td>
                        {{ optional($student->school)->name ?? 'Other' }}
                        @if (optional($student->school)->location != null)
                            ({{ $student->school->location }})
                        @endif
                    </td>
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

    {{ $students->links() }}
@endsection
