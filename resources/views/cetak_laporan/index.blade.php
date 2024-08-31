@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Data Laporan Posyandu</h4>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-1 row">
                                        <a href="{{ route('data_laporan.cetakPdf', ['month' => $filterMonth]) }}" class="btn btn-primary ml-3 p-2 d-flex align-items-center justify-content-center">
                                            <span class="text-light ms-2">Cetak PDF</span>
                                            <i class="fas fa-print ml-2"></i>
                                        </a>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle p-2 d-flex align-items-center justify-content-center ml-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-light ms-2">Filter Bulan</span>
                                                <i class="fas fa-calendar-alt ml-2"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '01']) }}">Januari</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '02']) }}">Februari</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '03']) }}">Maret</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '04']) }}">April</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '05']) }}">Mei</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '06']) }}">Juni</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '07']) }}">Juli</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '08']) }}">Agustus</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '09']) }}">September</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '10']) }}">Oktober</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '11']) }}">November</a>
                                                <a class="dropdown-item" href="{{ route('data_laporan.index', ['month' => '12']) }}">Desember</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light mt-3">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">Nama Anak</th>
                                                <th class="text-primary">TB (cm)</th>
                                                <th class="text-primary">BB (kg)</th>
                                                <th class="text-primary">Umur Anak (Bulan)</th>
                                                <th class="text-primary">Tanggal Posyandu</th>
                                                <th class="text-primary">Vaksin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $groupedData = $data_posyandu->groupBy('tanggal_posyandu');
                                            @endphp
                                            @foreach ($groupedData as $date => $group)
                                                @foreach ($group->groupBy('nama_anak') as $nama_anak => $items)
                                                    <tr>
                                                        <td rowspan="{{ $items->count() }}" class="text-center text-primary mb-3">{{ $nama_anak }}</td>
                                                        <td rowspan="{{ $items->count() }}" class="text-center text-primary mb-3">{{ $items->first()->tb_anak }}</td>
                                                        <td rowspan="{{ $items->count() }}" class="text-center text-primary mb-3">{{ $items->first()->bb_anak }}</td>
                                                        <td rowspan="{{ $items->count() }}" class="text-center text-primary mb-3">{{ $items->first()->umur_anak }}</td>
                                                        <td rowspan="{{ $items->count() }}" class="text-center text-primary mb-3">{{ \Carbon\Carbon::parse($items->first()->tanggal_posyandu)->format('d-m-Y') }}</td>
                                                        <td class="text-center text-primary">{{ $items->first()->nama_vaksin }}</td>
                                                    </tr>
                                                    @foreach ($items->skip(1) as $item)
                                                        <tr>
                                                            <td class="text-center text-primary">{{ $item->nama_vaksin }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $data_posyandu->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection