@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Tabel Data Orang Tua</h3>
                                <div class="d-flex justify-content-between">
                                    <input class="form-input" placeholder="Cari">
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">No</th>
                                                <th class="text-primary">NO KK</th>
                                                <th class="text-primary">Nama Ibu</th>
                                                <!-- <th class="text-primary">NIK Ayah</th> -->
                                                <th class="text-primary">Nama Ayah</th>
                                                <th class="text-primary">Alamat</th>
                                                <th class="text-primary">Telepon</th>
                                                <!-- <th class="text-primary">Email</th> -->
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_ibu as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ $item->no_kk }}</td>
                                                    <td class="text-center text-primary">{{ $item->nama_ibu }}</td>
                                                    <!-- <td class="text-center text-primary">{{ $item->nik_ayah }}</td> -->
                                                    <td class="text-center text-primary">{{ $item->nama_ayah }}</td>
                                                    <td class="text-center text-primary">{{ $item->alamat }}</td>
                                                    <td class="text-center text-primary">+62{{ $item->telepon }}</td>
                                                    <!-- <td class="text-center text-primary">{{ $item->email_orang_tua }}</td> -->
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn"
                                                            href="{{ route('data_ibu.edit', $item->no_kk) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm icon-btn"
                                                            onclick="deleteConfirmation('{{ route('data_ibu.hapus', $item->no_kk) }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $data_ibu->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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