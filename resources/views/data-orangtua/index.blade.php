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
                                    <form action="/data-orangtua/cari" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-input" name="cari" placeholder="Cari Nama Ibu .." value="{{ old('cari') }}">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive text-nowrap mt-3">
                                    <table class="table text-center text-light">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">No</th>
                                                <th class="text-primary">NO KK</th>
                                                <th class="text-primary">Nama Ibu</th>
                                                <!-- <th class="text-primary">NIK Ayah</th> -->
                                                <th class="text-primary">Nama Ayah</th>
                                                <!-- <th class="text-primary">Alamat</th> -->
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
                                                    <!-- <td class="text-center text-primary">{{ $item->alamat }}</td> -->
                                                    <td class="text-center text-primary">+62{{ $item->telepon }}</td>
                                                    <!-- <td class="text-center text-primary">{{ $item->email_orang_tua }}</td> -->
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn" href="{{ route('data_ibu.edit', $item->no_kk) }}"><i class="fas fa-edit"></i></a>
                                                        <button class="btn btn-warning btn-detail btn-sm icon-btn" data-no_kk="{{ $item->no_kk }}"><i class="fas fa-info-circle"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script>
        $(document).on('click', '.btn-detail', function() {
            var no_kk = $(this).data('no_kk');
            $.ajax({
                url: '/data-orangtua/detail/' + no_kk,
                method: 'GET',
                success: function(response) {
                    if (response) {
                        var html = '<table class="table table-bordered">';
                        html += '<tr><th class="text-primary">Nomor KK:</th><td>' + response.no_kk + '</td></tr>';
                        html += '<tr><th class="text-primary">NIK Ibu:</th><td>' + response.nik_ibu + '</td></tr>';
                        html += '<tr><th class="text-primary">Nama Ibu:</th><td>' + response.nama_ibu + '</td></tr>';
                        html += '<tr><th class="text-primary">Tempat Lahir Ibu:</th><td>' + response.tempat_lahir_ibu + '</td></tr>';
                        html += '<tr><th class="text-primary">Tanggal Lahir Ibu:</th><td>' + response.tanggal_lahir_ibu + '</td></tr>';
                        html += '<tr><th class="text-primary">Golongan Darah Ibu:</th><td>' + response.gol_darah_ibu + '</td></tr>';
                        html += '<tr><th class="text-primary">NIK Ayah:</th><td>' + response.nik_ayah + '</td></tr>';
                        html += '<tr><th class="text-primary">Nama Ayah:</th><td>' + response.nama_ayah + '</td></tr>';
                        html += '<tr><th class="text-primary">Alamat:</th><td>' + response.alamat + '</td></tr>';
                        html += '<tr><th class="text-primary">Telepon:</th><td>' + response.telepon + '</td></tr>';
                        html += '<tr><th class="text-primary">Email Orang Tua:</th><td>' + response.email_orang_tua + '</td></tr>';
                        html += '</table>';
    
                        Swal.fire({
                            title: '<h3 class="text-primary">Detail Orang Tua</h3>',
                            html: html,
                            showCloseButton: true,
                            showConfirmButton: false
                        });
                    } 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection