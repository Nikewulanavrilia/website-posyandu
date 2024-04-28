@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Edit data Anak</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ isset($data_anak) ? route('data_anak.update', $data_anak->nik_anak) : route('data_anak.store') }}" method="POST">
                            @csrf
                            @if(isset($data_anak))
                                @method('PUT')
                            @endif
                            <div class="mb-3 d-flex flex-column">
                                <label for="nik_anak" class="col-12 text-primary">NIK Anak</label>
                                <input type="text" class="form-input" name="nik_anak" id="nik_anak" value="{{ isset($data_anak) ? $data_anak->nik_anak : '' }}" required disabled>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                <input type="text" class="form-input" name="nama_anak" id="nama_anak" value="{{ isset($data_anak) ? $data_anak->nama_anak : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="tempat_lahir_anak" class="col-12 text-primary">Tempat Lahir Anak</label>
                                <input type="text" class="form-input" name="tempat_lahir_anak" id="tempat_lahir_anak" value="{{ isset($data_anak) ? $data_anak->tempat_lahir_anak : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal Lahir Anak</label>
                                <input type="date" class="form-input datepicker" name="tanggal_lahir_anak" id="tanggal_lahir_anak" value="{{ isset($data_anak) ? $data_anak->tanggal_lahir_anak : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="anak_ke" class="col-12 text-primary">Anak Ke</label>
                                <input type="text" class="form-input" name="anak_ke" id="anak_ke" value="{{ isset($data_anak) ? $data_anak->anak_ke : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="gol_darah_ibu" class="col-12 text-primary">Gol Darah Anak</label>
                                <select class="form-select form-input" name="gol_darah_anak" id="gol_darah_anak" required>
                                    <option value="A" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'A') ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'B') ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'AB') ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'O') ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="jenis_kelam_anak" class="col-12 text-primary">Jenis Kelamin</label>
                                <select class="form-select form-input" name="jenis_kelamin_anak" id="jenisKelamin" required>
                                    <option value="Laki-laki" {{ (isset($data_anak) && $data_anak->jenis_kelamin_anak == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ (isset($data_anak) && $data_anak->jenis_kelamin_anak == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
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
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.data_anak') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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