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
                                    <a href="{{route('data_anak.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                            class="text-light ms-2">Tambah Data Anak</span><i class="fas fa-plus"></i></a>
                                    <input class="form-input" placeholder="Cari">
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light">
                                    <thead>
                                    <tr>
                                        <th class="text-primary">No</th>
                                        <th class="text-primary">NIK Anak</th>
                                        <th class="text-primary">Nama Anak</th>
                                        <th class="text-primary">Umur anak</th>
                                        <th class="text-primary">Jenis Kelamin Anak</th>
                                        <th class="text-primary">Anak Ke</th>
                                        <th class="text-primary">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_anak as $item)
                                        <tr>
                                            <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-center text-primary">{{ $item->nik_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->nama_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->umur_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->jenis_kelamin_anak }}</td>
                                            <td class="text-center text-primary">{{ $item->anak_ke }}</td>
                                            <td>
                                            <a class="btn btn-primary btn-sm icon-btn" href="{{ route('data_anak.edit',$item->nik_anak)}}">
                                            <i class="fas fa-edit"></i></a>
                                                <a href="{{ route('data_anak.hapus',$item->nik_anak)}}"  class="btn btn-danger btn-sm icon-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></a>
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