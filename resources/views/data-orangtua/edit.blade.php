@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Edit data Ibu</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ isset($data_ibu) ? route('data_ibu.update', $data_ibu->nik_ibu) : route('data_ibu.store') }}" method="POST">
                            @csrf
                            @if(isset($data_ibu))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nik_ibu" class="col-12 text-primary">NIK Ibu</label>
                                        <input type="text" class="form-input" name="nik_ibu" id="nik_ibu" value="{{ isset($data_ibu) ? $data_ibu->nik_ibu : '' }}" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nama_ibu" class="col-12 text-primary">Nama Ibu</label>
                                        <input type="text" class="form-input" name="nama_ibu" id="nama_ibu" value="{{ isset($data_ibu) ? $data_ibu->nama_ibu : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="tempat_lahir_ibu" class="col-12 text-primary">Tempat Lahir Ibu</label>
                                        <input type="text" class="form-input" name="tempat_lahir_ibu" id="tempat_lahir_ibu" value="{{ isset($data_ibu) ? $data_ibu->tempat_lahir_ibu : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="tanggal_lahir_ibu" class="col-12 text-primary">Tanggal Lahir Ibu</label>
                                        <input type="date" class="form-input datepicker" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="{{ isset($data_ibu) ? $data_ibu->tanggal_lahir_ibu : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="gol_darah_ibu" class="col-12 text-primary">Gol Darah Ibu</label>
                                <select class="form-select form-input" name="gol_darah_ibu" id="gol_darah_ibu" required>
                                    <option value="A" {{ (isset($data_ibu) && $data_ibu->gol_darah_ibu == 'A') ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ (isset($data_ibu) && $data_ibu->gol_darah_ibu == 'B') ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ (isset($data_ibu) && $data_ibu->gol_darah_ibu == 'AB') ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ (isset($data_ibu) && $data_ibu->gol_darah_ibu == 'O') ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nik_ayah" class="col-12 text-primary">NIK Ayah</label>
                                        <input type="text" class="form-input" name="nik_ayah" id="nik_ayah" value="{{ isset($data_ibu) ? $data_ibu->nik_ayah : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nama_ayah" class="col-12 text-primary">Nama Ayah</label>
                                        <input type="text" class="form-input" name="nama_ayah" id="nama_ayah" value="{{ isset($data_ibu) ? $data_ibu->nama_ayah : '' }}" required>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="alamat" class="col-12 text-primary">Alamat</label>
                                        <input type="text" class="form-input" name="alamat" id="alamat" value="{{ isset($data_ibu) ? $data_ibu->alamat : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="telepon" class="col-12 text-primary">No Telepon</label>
                                        <input type="text" class="form-input" name="telepon" id="telepon" value="{{ isset($data_ibu) ? $data_ibu->telepon : '' }}" required>
                                    </div>
                                </div>
                            </div>                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.data_ibu') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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