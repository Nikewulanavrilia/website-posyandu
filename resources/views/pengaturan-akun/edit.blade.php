@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title">Edit data Admin</h3>
                        <form action="{{ isset($pengaturan_akun) ? route('pengaturanakun.update', $pengaturan_akun->id) : route('pengaturanakun.store') }}" method="POST">
                            @csrf
                            @if(isset($pengaturan_akun))
                                @method('PUT')
                            @endif
                            <input type="hidden" name="id" value="{{ isset($pengaturan_akun) ? $pengaturan_akun->id : '' }}">
                            <div class="mb-3 d-flex flex-column">
                                <label for="nama" class="col-12 text-primary">Nama Lengkap</label>
                                <input type="text" class="form-input" name="name" id="namaLengkap" value="{{ isset($pengaturan_akun) ? $pengaturan_akun->name : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="email" class="col-12 text-primary">Email</label>
                                <input type="text" class="form-input" name="email" id="email" value="{{ isset($pengaturan_akun) ? $pengaturan_akun->email : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="password" class="col-12 text-primary">Password</label>
                                <input type="password" class="form-input" name="password" id="password" value="{{ isset($pengaturan_akun) ? $pengaturan_akun->password : '' }}" disabled>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="jenis_kelamin" class="col-12 text-primary">Jenis Kelamin</label>
                                <select class="form-select form-input" name="jenis_kelamin" id="jenisKelamin" required>
                                    <option value="Laki-laki" {{ (isset($pengaturan_akun) && $pengaturan_akun->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ (isset($pengaturan_akun) && $pengaturan_akun->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.pengaturanakun') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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