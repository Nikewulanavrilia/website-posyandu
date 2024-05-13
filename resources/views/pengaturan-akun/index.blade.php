@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Pengaturan Data Akun</h4>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('pengaturanakun.create') }}" class="btn btn-primary custom-btn"
                                        onclick="showForm()"><span class="text-light ms-2">Tambah Data Admin</span><i
                                            class="fas fa-plus ml-2"></i></a>
                                    <form action="/pengaturan-akun/cari" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-input" name="cari" placeholder="Cari Nama Admin ..." value="{{ old('cari') }}">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive text-nowrap mt-3">
                                    <table class="table text-center text-light">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">No</th>
                                                <th class="text-primary">Nama Lengkap</th>
                                                <th class="text-primary">Email</th>
                                                <th class="text-primary">Jenis Kelamin</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengaturan_akun as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ $item->name }}</td>
                                                    <td class="text-center text-primary">{{ $item->email }}</td>
                                                    <td class="text-center text-primary">{{ $item->jenis_kelamin }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn"
                                                            href="{{ route('pengaturanakun.edit', $item->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="{{ route('pengaturanakun.hapus', $item->id) }}"
                                                            class="btn btn-danger btn-sm icon-btn"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $pengaturan_akun->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection