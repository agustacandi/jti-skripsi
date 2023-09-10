@extends('layouts.app')

@section('title', 'Edit Broadcast Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <divn class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Monitoring</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data monitoring</p>
                </divn>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('monitoring.ta') }}">Skripsi</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Monitoring</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <h4 class="card-title">Form Edit Data Program Studi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form"
                                    action="{{ url('dashboard/skripsi/monitoring/edit?progress=' . $data->progress . '&deskripsi=' . $data->deskripsi) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <input type="text" id="description"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    placeholder="Nama" name="deskripsi" value="{{ $data->deskripsi }}" />
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="progress">Progress</label>
                                                <input type="number" id="progress"
                                                    class="form-control @error('progress') is-invalid @enderror"
                                                    placeholder="Kode" name="progress" value="{{ $data->progress }}" />
                                                @error('progress')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
