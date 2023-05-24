@extends('layouts.app')

@section('title', 'Broadcast')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Broadcast Page</h3>
                    <p class="text-subtitle text-muted">Halaman untuk menampilkan tabel broadcast.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Broadcast</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-lg-flex justify-content-lg-between">
                        <h4 class="card-title">Tabel Broadcast</h4>
                        <a href="{{ route('broadcast.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                    @endif
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

    <script type="text/javascript">
        $('#broadcast-table').on('click', '#delete-button', function() {
            let data = $(this).data();
            let id = data.id;

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin ingin menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: `{{ url('dashboard/broadcast/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(res) {
                            window.LaravelDataTables["broadcast-table"].ajax.reload();
                            Swal.fire(
                                'Terhapus!',
                                res.message,
                                res.status
                            )
                        }
                    })
                }
            })

        })
    </script>
@endpush
