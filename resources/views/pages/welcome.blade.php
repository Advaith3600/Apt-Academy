@extends('layouts.app')

@section('content')
    {{ Guard::getLoggedInGuard() }}
@endsection
