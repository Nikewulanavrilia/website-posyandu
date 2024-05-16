@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Edukasi</h4>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('edukasi.create')}}" class="btn btn-primary p-2 d-flex align-items-center justify-content-center" onclick="showForm()"><span class="text-light ms-2">Tambah Edukasi</span><i class="fas fa-plus ml-2"></i></a>
                                <input class="form-input" placeholder="Cari">
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center text-light mt-3">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">No</th>
                                            <th class="text-primary">Judul</th>
                                            <th class="text-primary">Isi</th>
                                            <th class="text-primary">Foto</th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($edukasi as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ $item->judul }}</td>
                                                    <td class="text-center text-primary">{{ $item->isi }}</td>
                                                    <td>
                                                        <img src="{{ asset('foto_edukasi/' . $item->foto) }}" alt="" style="width: 50px; height: 50px; object-fit: cover; background-color: #f0f0f0; border: 1px solid #ccc;">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn" href="{{ route('edukasi.edit', $item->id_edukasi) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm icon-btn" href="{{ route('edukasi.hapus', $item->id_edukasi) }}"><i
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