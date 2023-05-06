@extends('layouts.app')

@section('title', 'Tambah Mahasiswa Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Mahasiswa Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menambah data mahasiswa</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('mahasiswa.index') }}">
                                    Mahasiswa
                                </a>
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
                            <h4 class="card-title">Form Tambah Data Mahasiswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('mahasiswa.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" id="name"
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
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Email" name="email" value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nim">NIM</label>
                                                <input type="text" id="nim"
                                                    class="form-control @error('nim') is-invalid @enderror"
                                                    placeholder="NIM" name="nim" value="{{ old('nim') }}" />
                                                @error('nim')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone-number">No. Telepon</label>
                                                <input type="text" id="phone-number"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    name="phone_number" placeholder="Contoh +628XXXX"
                                                    value="{{ old('phone_number') }}" />
                                                @error('phone_number')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" spellcheck="false" rows="4"
                                                    name="address" placeholder="Masukan Alamat...">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="angkatan">Tahun Angkatan</label>
                                                <input id="angkatan" type="number"
                                                    class="form-control @error('angkatan') is-invalid @enderror"
                                                    min="2017" max="{{ date('Y') }}" step="1"
                                                    value="{{ date('Y') }}" name="angkatan">
                                                @error('angkatan')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select class="form-select @error('gender') is-invalid @enderror"
                                                    id="gender" name="gender">
                                                    <option>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="program-studi">Program Studi</label>
                                                <select class="form-select @error('program_studi') is-invalid @enderror"
                                                    id="program-studi" name="program_studi_id">
                                                    @foreach ($prodies as $prodi)
                                                        <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('program_studi')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="formFile">Avatar</label>
                                                <input class="form-control @error('avatar') is-invalid @enderror"
                                                    type="file" id="formFile" name="avatar" />
                                                @error('avatar')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Password" name="password" />
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password-confirm">Konfirmasi Password</label>
                                                <input type="password" id="password-confirm"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    placeholder="Konfirmasi password" name="password_confirmation" />
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-lg-flex justify-content-lg-between">
                                <h4 class="card-title">Import Data Dari Excel</h4>
                                <a href="{{ route('excel.mahasiswa') }}" class="btn btn-primary">Download Format</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('mahasiswa.import') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="file">File</label>
                                                <input type="file" id="file"
                                                    class="form-control @error('file') is-invalid @enderror"
                                                    name="file" />
                                                @error('file')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1 mb-1">Import</button>
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
