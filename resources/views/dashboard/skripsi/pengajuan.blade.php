@extends('layouts.app')

@section('title', 'Pengajuan Perubahan Judul')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengajuan Perubahan Judul</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mahasiswa mengajukan perubahan judul tugas akhir.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Pengajuan Perubahan Judul</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div
                class="alert alert-danger alert-dismissible show fade"
            >
                {{\Illuminate\Support\Facades\Session::get('message')}}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        @endif
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Pengajuan Perubahan Judul</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{route('store.ta')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="judul_sebelum">Judul TA Sebelumnya</label>
                                                <input type="text" id="judul_sebelum" class="form-control @error('judul_sebelum') is-invalid @enderror"
                                                name="judul_sebelum" value="{{old('judul_sebelum')}}" />
                                                @error('judul_sebelum')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="judul_baru">Judul TA Baru</label>
                                                <input type="text" id="judul_baru" class="form-control @error('output_1') is-invalid @enderror"
                                                    placeholder="Input judul TA baru . . ." name="judul_baru" value="{{old('judul_baru')}}"/>
                                                @error('judul_baru')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Singkat Judul TA Baru</label>
                                                <input type="text" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                                    placeholder="Input deskripsi . . ." name="deskripsi" value="{{old('deskripsi')}}"/>
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
                                                <label for="alasan">Alasan Perubahan Judul</label>
                                                <input type="text" id="alasan" class="form-control @error('alasan') is-invalid @enderror"
                                                       placeholder="Input alasan perubahan judul . . ." name="alasan" value="{{old('alasan')}}"/>
                                                @error('alasan')
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
