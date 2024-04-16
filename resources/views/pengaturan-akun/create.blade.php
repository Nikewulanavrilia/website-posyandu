@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Tambah Admin</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{isset($pengaturan_akun) ? route('pengaturanakun.update',$pengaturan_akun->id) : route('pengaturanakun.store') }}" method="post">
                            @csrf 
                            <div class="mb-3 d-flex flex-column">
                            <label for="nama" class="col-12 text-primary">Nama Lengkap</label>
                            <input type="text" class="form-input" name="name" id="namaLengkap" required>
                            </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="email" class="col-12 text-primary">Email</label>
                                    <input type="text" class="form-input datepicker" name="email"
                                        id="email" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="password" class="col-12 text-primary">Password</label>
                                    <input type="text" class="form-input datepicker" name="password"
                                        id="password" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <label for="jenis_kelamin" class="col-12 text-primary">Jenis Kelamin</label>
                                    <select class="form-select form-input" name="jenis_kelamin" id="jenisKelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <a href="{{ route('pages.pengaturanakun') }}"><button class="btn btn-secondary"
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