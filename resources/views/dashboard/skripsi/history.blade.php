@extends('layouts.app')

@section('title', 'Riwayat Input Tugas Akhir Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Riwayat Input Tugas Akhir Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mahasiswa input tugas akhir dan memilih dosen
                        pembimbing.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Input TA</li>
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
                            <h4 class="card-title">Riwayat Input Tugas Akhir</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{route('store.ta')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="judul1">Planning Judul Tugas Akhir 1</label>
                                                <input type="text" id="judul1" class="form-control @error('judul_1') is-invalid @enderror"
                                                    placeholder="Input planning judul TA..." name="judul_1" value="{{old('judul_1')}}" />
                                                @error('judul_1')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi1">Deskripsi Singkat Tentang Topik Tugas Akhir 1</label>
                                                <input type="text" id="deskripsi1" class="form-control @error('output_1') is-invalid @enderror"
                                                    placeholder="Input deskripsi TA..." name="deskripsi_1" value="{{old('deskripsi_1')}}"/>
                                                @error('deskripsi_1')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="output1">Planning Output Dari Tugas Akhir 1</label>
                                                <input type="text" id="output1" class="form-control @error('deskripsi_1') is-invalid @enderror"
                                                    placeholder="Input output TA..." name="output_1" value="{{old('output_1')}}"/>
                                                @error('output_1')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="judul2">Planning Judul Tugas Akhir 2</label>
                                                <input type="text" id="judul2" class="form-control @error('judul_2') is-invalid @enderror"
                                                       placeholder="Input planning judul TA..." name="judul_2" value="{{old('judul_2')}}"/>
                                                @error('judul_2')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi2">Deskripsi Singkat Tentang Topik Tugas Akhir 2</label>
                                                <input type="text" id="deskripsi2" class="form-control @error('deskripsi_2') is-invalid @enderror"
                                                       placeholder="Input deskripsi TA..." name="deskripsi_2" value="{{old('deskripsi_2')}}"/>
                                                @error('deskripsi_2')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="ouput2">Planning Output Dari Tugas Akhir 2</label>
                                                <input type="text" id="output2" class="form-control @error('output_2') is-invalid @enderror"
                                                       placeholder="Input output TA..." name="output_2" value="{{old('output_2')}}" />
                                                @error('output_2')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="pembimbing1">Planning Pembimbing 1</label>
                                                <select class="form-select @error('pembimbing_1') is-invalid @enderror"
                                                        id="pembimbing1" name="pembimbing_1">
                                                    <option>Pilih dosen pembimbing</option>
                                                    @foreach($dosens as $dosen)
                                                        <option value="{{$dosen->id}}">{{$dosen->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('pembimbing_1')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="pembimbing2">Planning Pembimbing 2</label>
                                                <select class="form-select @error('pembimbing_2') is-invalid @enderror"
                                                        id="pembimbing2" name="pembimbing_2">
                                                    <option>Pilih dosen pembimbing</option>
                                                    @foreach($dosens as $dosen)
                                                        <option value="{{$dosen->id}}">{{$dosen->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('pembimbing_2')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </fieldset>
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
