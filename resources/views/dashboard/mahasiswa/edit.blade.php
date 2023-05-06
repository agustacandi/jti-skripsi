@extends('layouts.app')

@section('title', 'Edit Mahasiswa Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Mahasiswa Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data mahasiswa</p>
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
                                Edit
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
                            <h4 class="card-title">Form Edit Data Mahasiswa</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Nama" name="name" value="{{ $mhs->name }}" />
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
                                                    placeholder="Email" name="email" value="{{ $mhs->email }}"
                                                    disabled />
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
                                                    placeholder="NIM" name="nim" value="{{ $mhs->nim }}" disabled />
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
                                                    value="{{ $mhs->phone_number }}" disabled />
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
                                                    name="address" placeholder="Masukan Alamat...">{{ $mhs->address }}</textarea>
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
                                                    value="{{ date('Y') }}" name="angkatan"
                                                    value="{{ $mhs->angkatan }}">
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
                                                    @if ($mhs->gender == 'Laki-laki')
                                                        <option value="Laki-laki" selected>Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    @else
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan" selected>Perempuan</option>
                                                    @endif
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
                                                    <option value="{{ $mhs->program_studi_id }}">
                                                        {{ $mhs->program_studi->name }}</option>
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
                                                <label for="avatar" class="form-label">Avatar</label>
                                                <input class="form-control @error('avatar') is-invalid @enderror"
                                                    type="file" id="avatar" name="avatar"
                                                    onchange="previewImage()" />
                                                @error('avatar')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Preview Avatar</label>
                                                @if ($mhs->avatar)
                                                    <img src="{{ asset('storage/' . $mhs->avatar) }}" class="img-preview"
                                                        style="width: 200px; height: 200px; object-fit:cover; display:block;">
                                                @else
                                                    <img class="img-preview"
                                                        style="width: 200px; height: 200px; object-fit:cover; display: block;">
                                                @endif
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

@push('scripts')
    <script>
        function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
