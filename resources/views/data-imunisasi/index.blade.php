@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-4">Data Imunisasi</h1>
                <div class="col-12 mt-4">
                    <div class="card">
                        <<div class="card-body">
                                <h3 class="card-title">Tabel Data Imunisasi</h3>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('data_imunisasi.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                            class="text-light ms-2">Tambah Data Imunisasi</span><i class="fas fa-plus"></i></a>
                                    <input class="form-input search-input" placeholder="Cari">
                                </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center text-light">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">No</th>
                                            <th class="text-primary">Nama Vaksin</th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td class="text-center"><strong>1</strong></td>
                                            <td class="text-center">Vaksin rotavirus</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm icon-btn">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm icon-btn">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
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