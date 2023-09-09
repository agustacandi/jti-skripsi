@extends('layouts.app')

@section('title', 'List Status Page')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>List Status Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk manmpilkan list status mahasiswa.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">List Status Mahasiswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible show fade">
                {{ Session::get('message') }}
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
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status as $sts)
                                    <tr>
                                        <td class="text-bold-500">{{ $sts->mahasiswa->name }}</td>
                                        <td>{{ $sts->mahasiswa->nim }}</td>
                                        <td class="text-bold-500">{{ $sts->name }}</td>
                                        <td>
                                            <button class="btn btn-primary" id="accept-button"
                                                data-id="">Accept</button>
                                            <button class="btn btn-danger" id="reject-button" data-id="">Reject</button>
                                        </td>
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

@push('scripts')
    <script>
        $('#logout-button').on('click', function() {

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                showLoaderOnConfirm: true,
                closeOnConfirm: false,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '{{ route('logout') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(res) {
                            location.reload()
                        }
                    })
                }
            })
        })
    </script>
@endpush
