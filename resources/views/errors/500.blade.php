@extends('layouts.error')

@section('code', '500')

@section('content')
    <div class="page-inner">
        <h1>500</h1>
        <div class="page-description">
            Whoopps, something went wrong.
        </div>
        <div class="page-search">
            <div class="mt-3">
                <a href="{{ url('dashboard') }}">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
