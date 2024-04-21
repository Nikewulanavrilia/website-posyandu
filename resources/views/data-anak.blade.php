@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <h1 class="col-12 text-primary mt-4">Data Anak</h1>
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Data Anak</h4>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                            class="text-light ms-2">Tambah Data Anak</span><i class="fas fa-plus"></i></a>
                                    <input class="form-input" placeholder="Cari">
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">No</th>
                                                <th class="text-primary">Nama Lengkap</th>
                                                <th class="text-primary">Tanggal Lahir</th>
                                                <th class="text-primary">Jenis Kelamin</th>
                                                <th class="text-primary">Nama Ibu</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td class="text-center text-primary"><strong>1</strong></td>
                                                <td class="text-center text-primary">Yanuar Ardhika</td>
                                                <td class="text-center text-primary">26/01/2024</td>
                                                <td class="text-center text-primary">laki-laki</td>
                                                <td class="text-center text-primary">Mimi</td>
                                                <td class="text-center text-primary">
                                                    <a href="" class="btn btn-primary btn-sm icon-btn"><i
                                                            class="fas fa-edit"></i></a> |
                                                    <a href="" class="btn btn-danger btn-sm icon-btn"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
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

    <form action="" method="post">
        @csrf
        <div id="formAnak" style="display: none;">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tambah Data Anak</h5>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-input" name="namaLengkap" id="namaLengkap" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="tempat_lahir_anak" class="form-label">Tempat</label>
                                    <input type="text" class="form-input" name="tempat_lahir_anak" id="tempat_tanggal_lahir" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-input datepicker" name="tanggalLahir"
                                        id="tanggalLahir" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-input" name="jenisKelamin" id="jenisKelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="gol_darah" class="form-label">Golongan darah</label>
                                    <input type="text" class="form-input" name="gol_darah" id="gol_darah" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="namaIbu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-input" name="namaIbu" id="namaIbu"
                                        placeholder="Nama Ibu" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <button type="button" class="btn btn-secondary" onclick="batal()">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function showForm() {
            Swal.fire({
                html: $('#formAnak').html(),
                showCancelButton: false,
                showConfirmButton: false,
                width: '60%',
            });
            $('.datepicker').datepicker();
        }

        function simpanData() {
            var namaLengkap = $('#namaLengkap').val();
            var tanggalLahir = $('#tanggalLahir').val();
            var jenisKelamin = $('#jenisKelamin').val();
            var namaIbu = $('#namaIbu').val();

            $.ajax({
                url: '/store-data',
                type: 'POST',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "namaLengkap": namaLengkap,
                    "tanggalLahir": tanggalLahir,
                    "jenisKelamin": jenisKelamin,
                    "namaIbu": namaIbu
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan saat menyimpan data.',
                        showConfirmButton: true,
                    });
                }
            });
        }

        function batal() {
            Swal.close();
        }
    </script>
@endsection