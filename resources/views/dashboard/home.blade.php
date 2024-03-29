@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    @if (Auth::check())
                        <h3>Selamat datang {{ Auth::user()->name }}!</h3>
                    @elseif(Auth::guard('dosen')->check())
                        <h3>Selamat datang {{ Auth::guard('dosen')->user()->name }}!</h3lass=>
                    @endif
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">JTI-Skripsi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            @if (Auth::guard('dosen')->check())
                @if (Auth::guard('dosen')->user()->role === 'dosen')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Mahasiswa Yang Dibimbing</h6>
                                            <h6 class="font-extrabold mb-0">{{ $mahasiswa }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="fas fa-bullhorn"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Broadcast Dibuat</h6>
                                            <h6 class="font-extrabold mb-0">{{ $mahasiswa }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if (Auth::guard('dosen')->check())
                @if (Auth::guard('dosen')->user()->role === 'admin')
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Mahasiswa</h6>
                                            <h6 class="font-extrabold mb-0">{{ $mahasiswa }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Dosen</h6>
                                            <h6 class="font-extrabold mb-0">{{ $dosen }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Judul Diajukan</h6>
                                            <h6 class="font-extrabold mb-0">{{ $skripsi }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Pengajuan Pending</h6>
                                            <h6 class="font-extrabold mb-0">{{ $skripsi }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @if (Auth::guard('web')->check())
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daily Reminder</h4>
                            </div>
                            <div class="card-body">
                                <p>Jangan lupa cicil skripsi!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Broadcast</h4>
                            </div>
                            <div class="card-body">
                                @if ($broadcasts->count() === 0)
                                    <p>Belum ada broadcast</p>
                                @endif
                                @foreach ($broadcasts as $broadcast)
                                    <div
                                        style="border-radius: 10px; border: 1px solid white; padding: 20px; margin-bottom: 20px">
                                        <h5>{{ $broadcast->title }}</h5>
                                        <p>Oleh {{ $broadcast->dosen->name }} |
                                            {{ $broadcast->created_at->locale('id_ID')->diffForHumans() }}</p>
                                        <p>{{ $broadcast->description }}</p>
                                        <hr>
                                        <p>{{ $broadcast->body }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
