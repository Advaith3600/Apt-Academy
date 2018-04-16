<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body style="height: 10000px;">
    <div id="app">
        @include('partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
