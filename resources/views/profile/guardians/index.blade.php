@extends('layouts.profile')

@section('title', 'Manage students | ')

@section('profile-content')
	Student accounts linked with this account: (count: {{ $students->count() }})<br>
	@if ($students->count() > 0) 

		<table class="table border rounded mb-0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Attendance this month</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($students as $student)
					<tr>
						<td>{{ $student->id }}</td>
						<td>{{ $student->name }}</td>
						<td>{{ $student->email }}</td>
						<td>
							Present: {{ $student->attendances()->where('date', '>=', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d'))->where('attendance', '=', true)->count() }} days / {{ date('j') }} days and 
							Absent: {{ $student->attendances()->where('date', '>=', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d'))->where('attendance', '=', false)->count() }} days / {{ date('j') }} days
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection