@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
    {{ Guard::getLoggedInGuard() }}
@endsection
