@extends('layouts.app')

@section('title', 'List Status Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>List Tugas Akhir Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk manmpilkan list input tugas akhir mahasiswa.</p>
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
            <div class="alert alert-danger alert-dismissible show fade">
                {{ \Illuminate\Support\Facades\Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Status</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            {{ $dataTable->table() }}
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
