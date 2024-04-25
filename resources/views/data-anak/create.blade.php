@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Tambah Data Anak</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('data_anak.store') }}" method="post">
                            @csrf 
                            <div class="mb-3 d-flex flex-column">
                                    <label for="nik_anak" class="col-12 text-primary">NIK Anak</label>
                                    <input type="text" class="form-input" name="nik_anak"
                                        id="nik_anak" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                    <input type="text" class="form-input" name="nama_anak"
                                        id="nama_anak" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="tempat_lahir_anak" class="col-12 text-primary">Tempat Lahir Anak</label>
                                    <input type="text" class="form-input" name="tempat_lahir_anak"
                                        id="tempat_lahir_anak" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal Lahir Anak</label>
                                    <input type="date" class="form-input datepicker" name="tanggal_lahir_anak"
                                        id="tanggal_lahir_anak" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="anak_ke" class="col-12 text-primary">Anak Ke</label>
                                    <input type="text" class="form-input" name="anak_ke"
                                        id="anak_ke" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                <label for="gol_darah_anak" class="col-12 text-primary">Gol Darah Anak</label>
                                <select class="form-select form-input" name="gol_darah_anak" id="gol_darah_anak" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="jenis_kelamin_anak" class="col-12 text-primary">Jenis Kelamin</label>
                                    <select class="form-select form-input" name="jenis_kelamin_anak" id="jenisKelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                <label for="nik_ibu" class="col-12 text-primary">NIK Ibu</label>
                                <select class="form-select form-input" name="nik_ibu" id="nik_ibu" required>
                                @foreach ($nik_ibu_list as $nik_ibu => $nama_ibu)
                                <option value="{{ $nik_ibu }}">{{ $nama_ibu }} ({{ $nik_ibu }})</option>
                                @endforeach
                                </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <a href="{{ route('pages.data_anak') }}"><button class="btn btn-secondary"
                                            type="button" onclick="batal()">Batal</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection