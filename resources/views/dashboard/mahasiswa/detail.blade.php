@extends('layouts.app')

@section('title', 'Detail Mahasiswa Page')

@php
    $random_number = rand(1, 8);
@endphp

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Mahasiswa Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menampilkan detail data mahasiswa</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('mahasiswa.index') }}">
                                    Mahasiswa
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Detail
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
                            <h4 class="text-center">Detail Mahasiswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="text-center">
                                        <img src="{{ $mahasiswa->avatar != '' ? asset('storage/' . $mahasiswa->avatar) : asset('assets/compiled/jpg/' . $random_number . '.jpg') }}"
                                            alt="Avatar" class="avatar-custom mb-2">
                                        <h4>{{ $mahasiswa->name }}</h4>
                                        <p>{{ $mahasiswa->program_studi->name }} - {{ $mahasiswa->nim }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email"
                                                name="email" value="{{ $mahasiswa->email }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone-number">No. Telepon</label>
                                            <input type="text" id="phone-number" class="form-control" name="phone_number"
                                                placeholder="Contoh +628XXXX" value="{{ $mahasiswa->phone_number }}"
                                                readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="angkatan">Tahun Angkatan</label>
                                            <input type="text" id="angkatan" class="form-control" name="angkatan"
                                                value="{{ $mahasiswa->angkatan }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <input type="text" id="gender" class="form-control" name="gender"
                                                value="{{ $mahasiswa->gender }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <textarea id="address" class="form-control" spellcheck="false" rows="4" name="address"
                                                placeholder="Masukan Alamat..." readonly>{{ $mahasiswa->address }}</textarea>
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
