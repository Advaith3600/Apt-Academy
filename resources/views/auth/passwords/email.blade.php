@extends('layouts.app')

@section('title', "Reset Password | ")

@section('style')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Reset Password') }} for
                    <a href="#" @click="changeGuard('student', $event)" class="guardLink text-underline">Student</a> or
                    <a href="#"  @click="changeGuard('guardian', $event)" class="guardLink">Guardian</a> or
                    <a href="#"  @click="changeGuard('faculty', $event)" class="guardLink">Faculty</a> or
                    <a href="#"  @click="changeGuard('web', $event)" class="guardLink">Normal User</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input required type="hidden" v-model="guard" name="guard">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                <input required id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success px-3" v-cloak>
                                    {{ __('Send Password Reset Link') }} for @{{ guardName }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                guard: 'student'
            },
            methods: {
                changeGuard: function(guard, event) {
                    var guardLink = document.querySelectorAll('.guardLink');
                    for (var i = 0; i < guardLink.length; i++) {
                        guardLink[i].classList.remove('text-underline');
                    }
                    event.target.classList.add('text-underline');
                    this.guard = guard;
                    event.preventDefault();
                }
            },
            computed: {
                guardName: function() {
                    if (this.guard == 'web') {
                        return 'Normal User'
                    } else {
                        value = this.guard.toString()
                        return value.charAt(0).toUpperCase() + value.slice(1);
                    }
                }
            }
        });
    </script>
@endsection
