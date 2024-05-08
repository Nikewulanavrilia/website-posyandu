@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <h1 class="col-12 text-primary mt-2">Tambah Data Imunisasi</h1>
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('data_posyandu.store') }}" method="post">
                                    @csrf
                                    <div class="container">
                                        <h3 class="text-primary">Data Anak</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-input col-10" name="nama_anak"
                                                            id="nama_anak" readonly>
                                                        <button class="btn-primary btn p-2 rounded" id="btn-pilih">Pilih</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal
                                                        Lahir Anak</label>
                                                    <input type="date" class="form-input datepicker"
                                                        name="tanggal_lahir_anak" id="tanggal_lahir_anak" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <h3 class="text-primary">Data Posyandu</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_posyandu" class="col-12 text-primary">Tanggal Posyandu</label>
                                                    <input type="date" class="form-input datepicker" name="tanggal_posyandu" id="tanggal_posyandu" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="umur_anak" class="col-12 text-primary">Umur Anak</label>
                                                    <input type="number" class="form-input datepicker" name="umur_anak"
                                                        id="umur_anak" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="bb_anak" class="col-12 text-primary">Berat Badan
                                                        (BB)</label>
                                                    <input type="number" class="form-input datepicker" name="bb_anak"
                                                        id="bb_anak" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tb_anak" class="col-12 text-primary">Tinggi Badan
                                                        (TB)</label>
                                                    <input type="number" class="form-input datepicker" name="tb_anak"
                                                        id="tb_anak" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" container mb-3">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="simpanData()">Simpan</button>
                                        <a href="{{ route('pages.data_imunisasi') }}"><button class="btn btn-secondary" type="button" onclick="batal()">Batal</button></a>
                                    </div>
                                </form>
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
        $(document).ready(function() {
            function showSweetAlert(htmlContent) {
                Swal.fire({
                    html: htmlContent,
                    showConfirmButton: false
                });
            }

            $(document).on('click', '.btn-pilih', function() {
                var namaAnak = $(this).closest('tr').find('td:eq(0)').text();
                var tanggalLahirAnak = $(this).closest('tr').find('td:eq(1)').text();

                $('#nama_anak').val(namaAnak);
                $('#tanggal_lahir_anak').val(tanggalLahirAnak);
                
                Swal.close();
            });

            $('#tanggal_posyandu').on('change', function() {
            var tanggalPosyandu = new Date($(this).val());
            var tanggalLahirAnak = new Date($('#tanggal_lahir_anak').val());

            var diff = tanggalPosyandu.getTime() - tanggalLahirAnak.getTime();
            var umurAnak = Math.floor(diff / (1000 * 60 * 60 * 24 * 30.4375));

            $('#umur_anak').val(umurAnak);
            });
    
            $('#btn-pilih').on('click', function() {
                $.ajax({
                    url: '/pilih-data-anak',
                    method: 'GET',
                    success: function(response) {
                        var tableContent = '<table class="table"><thead><tr><th>Nama Anak</th><th>Tanggal Lahir</th><th>Action Pilih</th></tr></thead><tbody>';
                        response.forEach(function(anak) {
                            tableContent += '<tr><td>' + anak.nama_anak + '</td><td>' + anak.tanggal_lahir_anak + '</td><td><button class="btn btn-primary btn-pilih" data-id="' + anak.nik_anak + '">pilih</button></td></tr>';
                        });
                        tableContent += '</tbody></table>';
    
                        showSweetAlert(tableContent);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        showSweetAlert('Error: ' + error);
                    }
                });
            });
        });
    </script>    
@endsection