@extends('layouts.app')

@section('title', 'Update Status Mahasiswa')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Status</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mahasiswa update status skripsinya.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Status</li>
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
                            <h4 class="card-title">Update Status</h4>
                        </div>
                        {{-- option status --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{route('index.status')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                    <div class="row">
                                        <div class="col-12">
                                          <label for="status">Update Status</label>
                                          <select class="form-select @error('status') is-invalid @enderror"
                                                  id="status" name="status">
                                              <option>Pilih status</option>
                                              <option value="Belum input judul TA">Belum input Judul TA</option>
                                              <option value="Sudah input judul TA">Sudah input Judul TA</option>
                                              <option value="Sudah Sempro">Sudah Sempro</option>
                                              <option value="Sudah melakukan sidang">Sudah melakukan sidang</option>
                                              <option value="Lulus dengan revisi">Lulus dengan revisi</option>
                                              <option value="Belum Lulus">Belum Lulus</option>
                                          </select>
                                          @error('status')
                                          <div class="invalid-feedback">
                                              <i class="bx bx-radio-circle"></i>
                                              {{ $message }}
                                          </div>
                                          @enderror
                                          {{-- button --}}
                                          <div class="col-12 d-flex justify-content-end mt-3 mb-3">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                          {{-- tabel data riwayat status --}}
                                          <label for="tabel-status">Riwayat Update Status</label>
                                          <div class="d-lg-flex justify-content-lg-between mt-2">
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama Mahasiswa</th>
                                                <th scope="col">User ID</th>
                                                <th scope="col">Status</th>
                                                {{-- <th scope="col">Dibuat pada</th>
                                                <th scope="col">Diupdate pada</th> --}}
                                              </tr>
                                            </thead>
                                            {{-- query id berubah otomatis --}}
                                            <tbody>
                                              @php
                                                  $no = 1;
                                              @endphp
                                              @foreach ($status as $row)
                                              <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $row->nama}}</td>
                                                <td>{{ $row->user_id}}</td>
                                                <td>{{ $row->status }}</td>
                                                {{-- <td>{{ $row->created_at}}</td>
                                                <td>{{ $row->updated_at }}</td> --}}
                                              </tr>   
                                              @endforeach
                                            </tbody>
                                          </table>
                                          </div>
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
