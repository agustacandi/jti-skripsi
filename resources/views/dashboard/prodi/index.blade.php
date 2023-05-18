@extends('layouts.app')

@section('title', 'Broadcast')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Program Studi Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menampilkan tabel program studi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Program Studi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div
                class="alert alert-success alert-dismissible show fade"
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
        <section class="section">
            <div class="row" id="table-striped">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-lg-flex justify-content-lg-between">
                                <h4 class="card-title">Tabel Program Studi</h4>
                                <a href="{{ route('program-studi.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-lg prodi-table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kode</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($prodies as $prodi)
                                            <tr>
                                                <td class="text-bold-500">{{$loop->iteration}}</td>
                                                <td class="text-bold-500">{{$prodi->name}}</td>
                                                <td class="text-bold-500">{{$prodi->code}}</td>
                                                <td>{{$prodi->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('program-studi.show', $prodi->id) }}"
                                                       class="btn icon btn-sm btn-success"
                                                    ><i class="fas fa-eye"></i
                                                        ></a>
                                                    <a href="{{ route('program-studi.edit', $prodi->id) }}"
                                                       class="btn icon btn-sm btn-primary"
                                                    ><i class="fas fa-pencil-alt"></i
                                                        ></a>
                                                    <div class="btn icon btn-sm btn-danger" id="delete-button"
                                                         data-id="{{$prodi->id}}"
                                                    ><i class="fas fa-trash"></i
                                                        ></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- table striped -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Striped rows end -->
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('.prodi-table').on('click', '#delete-button', function () {
            let data = $(this).data();
            let id = data.id;
            console.log(id)

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin ingin menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: `{{ url('dashboard/program-studi/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (res) {
                            Swal.fire(
                                'Terhapus!',
                                res.message,
                                res.status
                            )
                            location.reload()
                        }
                    })
                }
            })
        })
    </script>
@endpush
