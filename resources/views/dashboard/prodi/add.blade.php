@extends('layouts.app')

@section('title', 'Tambah Program Studi Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <divn class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Program Studi Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menambah data program studi</p>
                </divn>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('program-studi.index') }}">Program Studi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah
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
                            <h4 class="card-title">Form Tambah Data Program Studi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('program-studi.store') }}" method="POST"
                                      >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Nama Program Studi</label>
                                                <input type="text" id="title"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       placeholder="Nama" name="name" value="{{ old('name') }}" />
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="code">Kode Program Studi</label>
                                                <input type="text" id="code"
                                                       class="form-control @error('code') is-invalid @enderror"
                                                       placeholder="Kode" name="code" value="{{ old('code') }}" />
                                                @error('code')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
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
