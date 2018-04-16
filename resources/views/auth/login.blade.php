@extends('layouts.app')

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
                    Login as a
                    <a href="#" @click="changeGuard('student', $event)" class="guardLink text-underline">Student</a> or
                    <a href="#"  @click="changeGuard('guardian', $event)" class="guardLink">Guardian</a> or
                    <a href="#"  @click="changeGuard('faculty', $event)" class="guardLink">Faculty</a> or
                    <a href="#"  @click="changeGuard('web', $event)" class="guardLink">Normal User</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" v-model="guard" name="guard">

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" v-cloak>
                                    {{ __('Login') }} as a @{{ guardName }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
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
        var app = new Vue({
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
