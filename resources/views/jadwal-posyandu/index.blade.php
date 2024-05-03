@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Jadwal Posyandu</h4>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('jadwal_posyandu.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                        class="text-light ms-2">Tambah Jadwal</span><i class="fas fa-plus"></i></a>
                                <input class="form-input" placeholder="Cari">
                            </div>
                            <div class="table-responsive text-nowrap">
                            <table class="table text-center text-light">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">No</th>
                                            <th class="text-primary">Jadwal Posyandu</th>
                                            <th class="text-primary">Jam Buku</th>
                                            <th class="text-primary">Jadwal Tutup</th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($jadwal_posyandu as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ $item->jadwal_posyandu }}</td>
                                                    <td class="text-center text-primary">{{ $item->jadwal_buka }}</td>
                                                    <td class="text-center text-primary">{{ $item->jadwal_tutup }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn" href="{{ route('jadwal_posyandu.edit', $item->id_jadwal) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm icon-btn" href="{{ route('jadwal_posyandu.hapus', $item->id_jadwal) }}"><i
                                                                class="fas fa-trash-alt"></i></a>     
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