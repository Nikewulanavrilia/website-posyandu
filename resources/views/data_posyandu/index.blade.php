@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Data Posyandu</h4>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('data_posyandu.create')}}" class="btn btn-primary custom-btn" onclick="showForm()"><span
                                        class="text-light ms-2">Tambah Data Posyandu</span><i class="fas fa-plus ml-2"></i></a>
                                <input class="form-input" placeholder="Cari">
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center text-light">
                                    <thead>
                                        <tr>
                                            <th class="text-primary"></th>
                                            <th class="text-primary"></th>
                                            <th class="text-primary"></th>
                                            <th class="text-primary"></th>
                                            <th class="text-primary"></th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td class="text-center text-primary"></td>
                                            <td class="text-center text-primary"></td>
                                            <td class="text-center text-primary"></td>
                                            <td class="text-center text-primary"></td>
                                            <td class="text-center text-primary"></td>
                                            <td class="text-center text-primary">
                                                <a href="" class="btn btn-primary btn-sm icon-btn"><i
                                                        class="fas fa-edit"></i></a> |
                                                <a href="" class="btn btn-danger btn-sm icon-btn"><i
                                                        class="fas fa-trash-alt"></i></a>
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