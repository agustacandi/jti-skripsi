@extends('layouts.app')

@section('title', 'Riwayat Input Skripsi Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Riwayat Input Skripsi Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mahasiswa input skripsi dan memilih dosen
                        pembimbing.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Input Skripsi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-danger alert-dismissible show fade">
                {{ \Illuminate\Support\Facades\Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Riwayat Input Skripsi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul 1</th>
                                    <th>Deskrpisi 1</th>
                                    <th>Output 1</th>
                                    <th>Judul 2</th>
                                    <th>Deskrpisi 2</th>
                                    <th>Output 2</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skripsi as $skrp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skrp->judul_1 }}</td>
                                        <td>{{ $skrp->deskripsi_1 }}</td>
                                        <td>{{ $skrp->output_1 }}</td>
                                        <td>{{ $skrp->judul_2 }}</td>
                                        <td>{{ $skrp->deskripsi_2 }}</td>
                                        <td>{{ $skrp->output_2 }}</td>
                                        <td><span class="badge bg-primary">{{ $skrp->status }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
