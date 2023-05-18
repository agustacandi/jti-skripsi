@extends('layouts.app')

@section('title', 'Detail Broadcast Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Broadcast Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menampilkan detail data Broadcast</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('broadcast.index') }}">Broadcast</a>
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
                            <h4 class="text-center">Detail Broadcast</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" id="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   placeholder="Judul" name="title" value="{{ $broadcast->title}}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="body">Isi Broadcast</label>
                                            <textarea id="body" class="form-control @error('body') is-invalid @enderror" spellcheck="false" rows="4"
                                                      name="body" placeholder="Masukan Abstrak..." readonly>{{ $broadcast->body }}</textarea>
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

