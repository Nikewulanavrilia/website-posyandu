@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Jadwal Posyandu</h4>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('jadwal_posyandu.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                        class="text-light ms-2">Tambah Jadwal</span><i class="fas fa-plus ml-2"></i></a>
                            </div>
                            <div class="table-responsive text-nowrap">
                            <table class="table text-center text-light mt-3">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">No</th>
                                            <th class="text-primary">Jadwal Posyandu</th>
                                            <th class="text-primary">Jam Buka</th>
                                            <th class="text-primary">Jam Tutup</th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($jadwal_posyandu as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ \Carbon\Carbon::parse($item->jadwal_posyandu)->format('d-m-Y') }}</td>
                                                    <td class="text-center text-primary">{{ $item->jadwal_buka }}</td>
                                                    <td class="text-center text-primary">{{ $item->jadwal_tutup }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn" href="{{ route('jadwal_posyandu.edit', $item->id_jadwal) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm icon-btn" onclick="deleteConfirmation('{{ route('jadwal_posyandu.hapus', $item->id_jadwal) }}')"><i accordion-button class="fas fa-trash-alt"></i></button>     
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                                {!! $jadwal_posyandu->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirmation(deleteUrl) {
        Swal.fire({
            text: 'Apakah Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            iconColor: '#d33',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = deleteUrl;
            }
        });
    }
</script>
    <script>
        @if (session('success'))
            Swal.fire({
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        @endif

        @if (session('info'))
            Swal.fire({
                text: '{{ session('info') }}',
                icon: 'info',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        @endif
    </script>
@endsection