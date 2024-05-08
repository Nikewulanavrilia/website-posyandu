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
                            <div class="mb-3 d-flex flex-column">
                            <label for="nik_anak" class="col-12 text-primary">Nama Anak</label>
                            <div class="input-group">
                            <input class="form-control form-input fw-medium" type="text" placeholder="Search for..." id="myInput" onkeyup="filterFunction()" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                            </div>
                            <select class="form-select form-input dropdown-content mt-2" name="nik_anak"
                            id="nik_ibu"required>
                            <option value="" aria-disabled="false">--Pilih Nama Anak--</option>
                            @foreach ($nik_anak_list as $nik_anak => $nama_anak)
                            <option value="{{ $nik_anak }}">
                            {{ $nama_anak }} ({{ $nik_anak }})
                            </option>
                            @endforeach
                            </select>
                            <p id="noMatch" style="display:none;color:red;">Tidak ada nama yang cocok.
                            </p>
                            </div>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="tanggal_posyandu" class="col-12 text-primary">Tanggal Posyandu</label>
                            <input type="date" class="form-input datepicker" name="tanggal_posyandu" id="tanggal_posyandu" min="{{ date('Y-m-d') }}"required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="umur_anak" class="col-12 text-primary">Umur Anak</label>
                            <input type="text" class="form-input" name="umur_anak" id="umur_anak" required>
                            </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <a href="{{ route('pages.data_imunisasi') }}"><button class="btn btn-secondary"
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


