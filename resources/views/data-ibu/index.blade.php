@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <h1 class="col-12 text-primary mt-4">Data Ibu</h1>
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Data Ibu</h4>
                                <div class="d-flex justify-content-between">
                                    <input class="form-input" placeholder="Cari">
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light">
                                    <thead>
                                    <tr>
                                        <th class="text-primary">No</th>
                                        <th class="text-primary">NIK Ibu</th>
                                        <th class="text-primary">Nama Ibu</th>
                                        <!-- <th class="text-primary">NIK Ayah</th> -->
                                        <th class="text-primary">Nama Ayah</th>
                                        <th class="text-primary">Alamat</th>
                                        <th class="text-primary">Telepon</th>
                                        <!-- <th class="text-primary">Email</th> -->
                                        <th class="text-primary">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_ibu as $item)
                                        <tr>
                                            <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                            <td class="text-center text-primary">{{ $item->nik_ibu }}</td>
                                            <td class="text-center text-primary">{{ $item->nama_ibu }}</td>
                                            <!-- <td class="text-center text-primary">{{ $item->nik_ayah }}</td> -->
                                            <td class="text-center text-primary">{{ $item->nama_ayah }}</td>
                                            <td class="text-center text-primary">{{ $item->alamat }}</td>
                                            <td class="text-center text-primary">{{ $item->telepon }}</td>
                                            <!-- <td class="text-center text-primary">{{ $item->email_orang_tua }}</td> -->
                                            <td>
                                            <a class="btn btn-primary btn-sm icon-btn" href="{{ route('data_ibu.edit',$item->nik_ibu)}}">
                                            <i class="fas fa-edit"></i></a>
                                                <a href="{{ route('data_ibu.hapus',$item->nik_ibu)}}"  class="btn btn-danger btn-sm icon-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></a>
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