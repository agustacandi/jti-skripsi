@extends('layouts.error')

@section('code', '404')

@section('content')
    <img
        class="img-error"
        src="{{asset('assets/compiled/svg/error-404.svg')}}"
        alt="Not Found"
    />
    <h1 class="error-title">NOT FOUND</h1>
    <p class="fs-5 text-gray-600">
        The page you are looking not found.
    </p>
    <a href="{{url()->previous()}}" class="btn btn-lg btn-outline-primary mt-3"
    >Go Back</a
    >
@endsection
