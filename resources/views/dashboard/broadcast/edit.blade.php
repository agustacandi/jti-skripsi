@extends('layouts.app')

@section('title', 'Edit Broadcast Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Broadcast Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data broadcast</p>
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
                            <h4 class="card-title">Form Edit Data Broadcast</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('broadcast.update', $broadcast->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Judul</label>
                                                <input type="text" id="title"
                                                       class="form-control @error('title') is-invalid @enderror"
                                                       placeholder="Judul" name="title" value="{{ $broadcast->title}}" />
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="body">Isi Broadcast</label>
                                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" spellcheck="false" rows="4"
                                                          name="body" placeholder="Masukan Abstrak...">{{ $broadcast->body }}</textarea>
                                                @error('body')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="flexSwitchCheckDefault"
                                                    name="is_published"
                                                />
                                                <label
                                                    class="form-check-label"
                                                    for="flexSwitchCheckDefault"
                                                >Publish Broadcast</label
                                                >
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
