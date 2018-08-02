@extends('layouts.admin')

@section('title', "View Faculty $faculty->id | ")

@section('admin-content')
    <form method="post" action="{{ route('admin.faculties.update', $faculty->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 number-font" v-if="upload.state">
            <span v-text="(upload.done / 1024000).toFixed(3)"></span> MB /
            <span v-text="(upload.total / 1024000).toFixed(3)"></span> MB
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="uploadPercent" aria-valuemin="0" aria-valuemax="100" :style="'width: ' + uploadPercent + '%;'"></div>
            </div>
        </div>

        <div class="d-flex p-relative">
            <div class="m-auto">
                <img class="shadow-sm rounded-circle c-pointer c-pointer-image d-flex" :src="picture" alt="Profile Picture" width="100" height="100" draggable="false" v-on:click="click">

                <div v-if="!upload.state" class="profile-image c-pointer rounded-circle" v-on:click="click">
                    <span>
                        <i class="fas fa-image fa-2x"></i>
                    </span>
                </div>
            </div>
        </div>

        <hr>

        <admin-profile-picture v-on:uploaded="uploaded" model="Faculty" :id="{{ $faculty->id }}" v-on:progress="updateProgress" v-on:uploading="updateUploading"></admin-profile-picture>

        <div class="d-md-flex">
            <div class="form-group col-md-6">
                <label for="name">Name:</label>

                <input required type="text" name="name" value="{{ $faculty->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name">

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="email">Email:</label>

                <input required type="email" name="email" value="{{ $faculty->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="d-md-flex">
            <div class="col-md-12">
                <label for="school">School:</label>

                <select class="form-control{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school">
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}" {{ $school->id == $faculty->school_id ? 'selected' : '' }}>
                            {{ $school->name }}
                            @if ($school->location != null)
                                ({{ $school->location }})
                            @endif
                        </option>
                    @endforeach
                    <option value="0" {{ $faculty->school_id == null ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <div class="d-flex">
            <div class="col-md-12">
                <label for="bio">Bio:</label>

                <textarea class="form-control" name="bio" id="bio" placeholder="Explain yourself...">{{ $faculty->bio }}</textarea>
            </div>
        </div>

        <div class="col-md-12 mt-3 text-right">
            <input type="submit" value="Edit Profile" class="btn btn-outline-success px-3">
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/component.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                picture: '{{ asset($faculty->profile_picture) }}',
                upload: {
                    state: false,
                    total: 0,
                    done: 0
                }
            },
            methods: {
                click: function() {
                    document.getElementById('profile_picture').click();
                },
                uploaded: function(uri) {
                    this.picture = uri;
                },
                updateProgress: function (array) {
                    this.upload.total = array[1];
                    this.upload.done = array[0];
                },
                updateUploading: function (boolean) {
                    this.upload.state = boolean;
                }
            },
            computed: {
                uploadPercent: function () {
                    if (this.upload.total == 0) {
                        return 0;
                    }

                    return (this.upload.done / this.upload.total) * 100;
                }
            }
        });
    </script>
@endsection
