@extends('layouts.app')

@section('title', 'Contact us | ')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body d-md-flex">
                <div class="col-md-5">
                    <div id="googleMap" style="width: 100%; height: 280px;"></div>
                </div>

                <div class="col-md-7 mt-3 mt-md-0">
                    <form method="post">
                        @csrf

                        <div class="d-md-flex">
                            <div class="col-md-6 pl-0 pr-md-2 pr-0">
                                <input type="text" name="name" value="{{ Guard::check() ? Auth::guard(Guard::getLoggedInGuard())->user()->name : old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6 pr-0 pl-md-2 pl-0 mt-3 mt-md-0">
                                <input type="text" name="email" value="{{ Guard::check() ? Auth::guard(Guard::getLoggedInGuard())->user()->email : old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w-100 mt-3">
                            <textarea name="comment" rows="8" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" placeholder="Your valuable comment" required>{{ old('comment') }}</textarea>

                            @if ($errors->has('comment'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="w-100 mt-3">
                            <button type="submit" class="px-4 btn btn-outline-success float-right">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function myMap() {
            var mapProp= {
                center: new google.maps.LatLng(8.454394, 76.948101),
                zoom: 18,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8aFiqCas-vOZYAGz3smDot5q0waHEfPo&callback=myMap"></script>
@endsection
