@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <h1 class="col-12 text-primary mt-4">Pengaturan Akun</h1>
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Data Akun</h4>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('pengaturanakun.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                            class="text-light ms-2">Tambah Data Admin</span><i class="fas fa-plus"></i></a>
                                    <input class="form-input" placeholder="Cari">
                                </div>
                                <div class="table-responsive text-nowrap">
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
                                                <a href="#" class="btn btn-primary btn-sm icon-btn"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm icon-btn"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
@endsection