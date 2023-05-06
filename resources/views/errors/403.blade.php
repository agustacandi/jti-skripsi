@extends('layouts.error')

@section('code', '403')

@section('content')
    <div class="page-inner">
        <h1>403</h1>
        <div class="page-description">
            You do not have access to this page.
        </div>
        <div class="page-search">
            <div class="mt-3">
                <a href="{{ url('dashboard') }}">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
