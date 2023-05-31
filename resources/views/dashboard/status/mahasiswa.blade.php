@extends('layouts.app')

@section('title', 'Status Mahasiswa Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Status Mahasiswa Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menambahkan status dan melihat status mahasiswa.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Status Mahasiswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success alert-dismissible show fade">
                {{ \Illuminate\Support\Facades\Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Status</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select @error('name') is-invalid @enderror" id="status"
                                    name="name">
                                    <option value="">--- Pilih Status ---</option>
                                    <option value="Belum input judul TA">Belum input judul TA</option>
                                    <option value="Sudah input judul TA">Sudah input judul TA</option>
                                    <option value="Sudah Sempro">Sudah Sempro</option>
                                    <option value="Sudah melakukan sidang">Sudah melakukan sidang</option>
                                    <option value="Lulus dengan revisi">Lulus dengan revisi</option>
                                    <option value="Belum Lulus">Belum Lulus</option>
                                </select>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </fieldset>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            @if (filter_var($status->is_verified, FILTER_VALIDATE_BOOLEAN))
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            @else
                                <button type="submit" disabled class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            @endif
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                </div>
                </form>
            </div>
    </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Riwayat Status</h4>
            </div>
            <div class="card-body">
                @if (sizeof($statuses) > 0)
                    @foreach ($statuses as $status)
                        <div class="card border">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img class="avatar" style="width: 50px; height: 50px; margin-right: 10px;"
                                        src="https://pm1.narvii.com/5679/703675c7b19a91624c6e5cfa11ef4a8c74029978_hq.jpg"
                                        alt="Avatar">
                                    <div>
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <p>{{ $status->name }} - {{ $status->created_at }}</p>
                                        @if (filter_var($status->is_verified, FILTER_VALIDATE_BOOLEAN))
                                            <span class="badge bg-success">Approved</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Belum ada status</p>
                @endif
            </div>
        </div>
    </section>
    </div>
@endsection
