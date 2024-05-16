@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Tabel Data Imunisasi</h3>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('data_imunisasi.create') }}" class="btn btn-primary p-2 d-flex align-items-center justify-content-center" onclick="showForm()"><span class="text-light ms-2">Tambah Imunisasi</span><i class="fas fa-plus ml-2"></i></a>
                                    <form action="/data-imunisasi/cari" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-input" name="cari" placeholder="Cari Nama Vaksin .." value="{{ old('cari') }}">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive text-nowrap mt-3">
                                    <table class="table text-center text-light">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">No</th>
                                                <th class="text-primary">Nama Vaksin</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_imunisasi as $item)
                                                <tr>
                                                    <td class="text-center text-primary">{{ $loop->iteration }}</td>
                                                    <td class="text-center text-primary">{{ $item->nama_vaksin }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm icon-btn"
                                                            href="{{ route('data_imunisasi.edit', $item->id_vaksin) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                        {{-- <a class="btn btn-danger btn-sm icon-btn"
                                                            href="{{ route('data_imunisasi.hapus', $item->id_vaksin) }}"><i
                                                                class="fas fa-trash-alt"></i></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $data_imunisasi->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection