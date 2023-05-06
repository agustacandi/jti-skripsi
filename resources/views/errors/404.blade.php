@extends('layouts.error')

@section('code', '404')

@section('content')
    <div class="page-inner">
        <h1>404</h1>
        <div class="page-description">
            The page you were looking for could not be found.
        </div>
        <div class="page-search">
            <div class="mt-3">
                <a href="{{ url('dashboard') }}">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
