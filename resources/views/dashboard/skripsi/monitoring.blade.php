@extends('layouts.app')

@section('title', 'Monitoring')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Monitoring Skripsi</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mahasiswa mengisi progress skripsinya.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Monitoring Skripsi</li>
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
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Monitoring Skripsi</h4>
                        </div>
                        {{-- option status --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('monitoring.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                    <div class="row">
                                        <div class="col-12">
                                            {{-- progress bar --}}
                                            <label for="progress">Progress</label>
                                            <div class="progress mb-3" role="progressbar" aria-label="Example with label"
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 25%">{{ $progress }}%</div>
                                            </div>
                                            {{-- input deskripsi --}}
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" spellcheck="false" rows="4"
                                                    name="deskripsi" placeholder="Masukan Deskripsi . . .">{{ old('deskripsi') }}</textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="progress">Progress</label>
                                                <input id="progress" type="number"
                                                    class="form-control @error('progress') is-invalid @enderror"
                                                    placeholder="Input progres..." name="progress">
                                                @error('progress')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- button --}}
                                            <div class="col-12 d-flex justify-content-end mt-3 mb-3">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Riwayat Monitoring Skripsi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="d-lg-flex justify-content-lg-between mt-2">
                                    <table class="table" id="monitoring-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskripsi Monitoring</th>
                                                <th>Point Progres</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        {{-- query id berubah otomatis --}}
                                        <tbody>
                                            @foreach ($monitoring as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->deskripsi }}</td>
                                                    <td>{{ $row->progress }}</td>
                                                    <td>
                                                        <div class="d-flex" style="gap: 10px">
                                                            <a href="' . route('dosen.edit', $row->id) . '"
                                                                class="btn icon btn-sm btn-primary"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <div class="btn icon btn-sm btn-danger" id="delete-button"
                                                                data-progress="{{ $row->progress }}"
                                                                data-deskripsi="{{ $row->deskripsi }}"><i
                                                                    class="fas fa-trash"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        $('#monitoring-table').on('click', '#delete-button', function() {
            let {
                progress,
                deskripsi
            } = $(this).data();

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
                        url: `{{ url('dashboard/status/delete-status/') }}?progress=${progress}&deskripsi=${deskripsi}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(res) {
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
