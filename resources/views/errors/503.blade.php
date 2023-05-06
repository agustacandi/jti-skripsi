@extends('layouts.error')

@section('code', '503')

@section('content')
    <div class="page-inner">
        <h1>503</h1>
        <div class="page-description">
            Be right back.
        </div>
        <div class="page-search">
            <div class="mt-3">
                <a href="{{ url('dashboard') }}">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
