@extends('layouts.app')

@section('title', 'Profile')

@php
    $random_number = rand(1, 8);
    $user = null;
    if (Auth::check()) {
        $user = Auth::user();
    } elseif (Aut::guard('dosen')->check()) {
        $user = Auth::guard('dosen')->user();
    }
@endphp

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile Page</h3>
                    <p class="text-subtitle text-muted">Halaman profile user.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Profile</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="text-center">
                                        <img src="{{ $user->avatar != '' ? asset('storage/' . $user->avatar) : asset('assets/compiled/jpg/' . $random_number . '.jpg') }}"
                                            alt="Avatar" class="avatar-custom mb-2">
                                        <h4>{{ $user->name }}</h4>
                                        <p>{{ $user->program_studi->name }} - {{ $user->nim }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email"
                                                name="email" value="{{ $user->email }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone-number">No. Telepon</label>
                                            <input type="text" id="phone-number" class="form-control" name="phone_number"
                                                placeholder="Contoh +628XXXX" value="{{ $user->phone_number }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="angkatan">Tahun Angkatan</label>
                                            <input type="text" id="angkatan" class="form-control" name="angkatan"
                                                value="{{ $user->angkatan }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <input type="text" id="gender" class="form-control" name="gender"
                                                value="{{ $user->gender }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <textarea id="address" class="form-control" spellcheck="false" rows="4" name="address"
                                                placeholder="Masukan Alamat..." readonly>{{ $user->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
