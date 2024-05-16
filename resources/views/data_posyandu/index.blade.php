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
                                <div class="mt-1 row">
                                    <a href="{{route('data_posyandu.create')}}"
                                        class="btn btn-primary p-2 d-flex align-items-center justify-content-center"
                                        onclick="showForm()"><span class="text-light ms-2">Tambah Data Posyandu</span><i
                                            class="fas fa-plus ml-2"></i></a>
                                    <a href="{{route('data_posyandu.create_terlambat')}}"
                                        class="btn btn-primary p-2 d-flex align-items-center justify-content-center ml-3"
                                        onclick="showForm()"><span class="text-light ms-2">Tambah Data Terlambat
                                            Imunisasi</span><i class="fas fa-clock ml-2"></i></a>
                                </div>
                                {{-- <input class="form-input" placeholder="Cari"> --}}
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center text-light mt-3">
                                    <thead>
                                        <tr>
                                            <!-- <th class="text-primary">No</th> -->
                                            <th class="text-primary">Nama Anak</th>
                                            <th class="text-primary">Tinggi Badan</th>
                                            <th class="text-primary">Berat Badan</th>
                                            <th class="text-primary">Umur Anak</th>
                                            <th class="text-primary">Tanggal Posyandu</th>
                                            <th class="text-primary">Vaksin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $previous_date = null; 
                                        @endphp
                                        @foreach ($data_posyandu as $item)
                                         <tr>
                                        @if ($item->tanggal_posyandu != $previous_date)
                                        <td rowspan="{{ $data_posyandu->where('tanggal_posyandu', $item->tanggal_posyandu)->count() }}"
                                        class="text-center text-primary">{{ $item->nama_anak }}</td>
                                        <td rowspan="{{ $data_posyandu->where('tanggal_posyandu', $item->tanggal_posyandu)->count() }}"
                                        class="text-center text-primary">{{ $item->tb_anak }}</td>
                                        <td rowspan="{{ $data_posyandu->where('tanggal_posyandu', $item->tanggal_posyandu)->count() }}"
                                        class="text-center text-primary">{{ $item->bb_anak }}</td>
                                        <td rowspan="{{ $data_posyandu->where('tanggal_posyandu', $item->tanggal_posyandu)->count() }}"
                                        class="text-center text-primary">{{ $item->umur_anak }}</td>
                                        <td rowspan="{{ $data_posyandu->where('tanggal_posyandu', $item->tanggal_posyandu)->count() }}"
                                        class="text-center text-primary">
                                        {{ \Carbon\Carbon::parse($item->tanggal_posyandu)->format('d-m-Y') }}
                                        </td>
                                        @endif
                                        <td class="text-center text-primary">{{ $item->nama_vaksin }}</td>
                                        </tr>
                                        @php
                                        $previous_date = $item->tanggal_posyandu; 
                                        @endphp
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