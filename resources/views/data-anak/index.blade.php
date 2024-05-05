@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    {{-- <h4 class="col-12 text-header text-primary">Data Anak</h4> --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Tabel Data Anak</h3>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('data_anak.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                            class="text-light ms-2">Tambah Data Anak</span><i class="fas fa-plus"></i></a>
                                            <form action="/data-anak/cari" method="GET">
		                                    <input type="text" name="cari" placeholder="Cari Nama Anak .." value="{{ old('cari') }}">
                                            <input type="submit" value="CARI">
                                            </form>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light">
                                    <thead>
                                    <tr>
                                        <th class="text-primary">No</th>
                                        <th class="text-primary">NIK Anak</th>
                                        <th class="text-primary">Nama Anak</th>
                                        <th class="text-primary">Umur Anak</th>
                                        <th class="text-primary">Jenis Kelamin</th>
                                        <th class="text-primary">Nama Ibu</th>
                                        <th class="text-primary">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_anak as $item)
                                        <tr>
                                            <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-center text-primary">{{ $item->nik_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->nama_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->umur_anak }} Bulan</td>
                                            <td class="text-center text-primary">{{ $item->jenis_kelamin_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->nama_ibu }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm icon-btn" href="{{ route('data_anak.edit',$item->nik_anak)}}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm icon-btn" onclick="deleteConfirmation('{{ route('data_anak.hapus',$item->nik_anak)}}')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteConfirmation(deleteUrl) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
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
@endsection