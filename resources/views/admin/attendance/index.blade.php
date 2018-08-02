@extends('layouts.admin')

@section('title', 'Attendance | ')

@section('admin-content')
	<div class="d-flex justify-content-between align-items-center">
		<span class="h3">Attendance of this month ({{ $carbon->format('M') }})</span>

		<a href="#" v-on:click.prevent="expandView"><span v-if="expand">Close</span> Expand View</a>
	</div>

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
        </form>
    </div>

	<hr>

	<table class="table border rounded mb-0">
		<thead>
			<tr>
				<th>Student's Name</th>
				@for ($i = 1; $i <= $carbon->endOfMonth()->format('d'); $i++)
					<th>{{ $i }}</th>
				@endfor
			</tr>
		</thead>

		<tbody>
			@forelse ($students as $student)
				<tr>
					<th>
						{{ $student->name }}
					</th>
					@for ($i = 1; $i <= $carbon->endOfMonth()->format('d'); $i++)
						<th>
							<attendance :id="{{ $student->id }}" selected="{{ $student->getAttendanceByDate(date('Y') . '-' . date('m') . '-' . $i) }}" date="{{ date('Y') . '-' . date('m') . '-' . $i }}"></attendance>
						</th>
					@endfor
				</tr>
			@empty
				<tr>
					<td colspan="{{ $carbon->endOfMonth()->format('d') + 1 }}" class="text-center">
						Nothing found
					</td>
				</tr>
			@endforelse
		</tbody>
	</table>

	{{ $students->links() }}
@endsection

@section('js')
	<script src="{{ asset('js/component.js') }}"></script>
	<script>
		new Vue({
			el: '#app',
			data: {
				expand: false
			},
			methods: {
				expandView: function (event) {
					this.expand = !this.expand;

					let view = document.querySelectorAll('.card')[1];

					if (this.expand) {
						view.classList.add('full-view');
					} else {
						view.classList.remove('full-view');
					}
				}
			}
		});
	</script>
@endsection