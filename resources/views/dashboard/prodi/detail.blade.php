@extends('layouts.app')

@section('title', 'Detail Broadcast Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Program Studi Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menampilkan detail data program studi</p>
                </div>
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
                            <h4 class="text-center">Detail Program Studi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Program Studi</label>
                                            <input type="text" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="Nama" name="name" value="{{$programStudi->name}}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="code">Kode Program Studi</label>
                                            <input type="text" id="code"
                                                   class="form-control @error('code') is-invalid @enderror"
                                                   placeholder="Kode" name="code" value="{{$programStudi->code}}" readonly />
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

