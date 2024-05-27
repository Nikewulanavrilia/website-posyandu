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
                                        <a href="{{ route('data_posyandu.create') }}"
                                            class="btn btn-primary p-2 d-flex align-items-center justify-content-center"
                                            onclick="showForm()"><span class="text-light ms-2">Tambah Data Posyandu</span><i
                                                class="fas fa-plus ml-2"></i></a>
                                        <a href="{{ route('data_posyandu_terlambat.create') }}"
                                            class="btn btn-primary p-2 d-flex align-items-center justify-content-center ml-3"
                                            onclick="showForm()"><span class="text-light ms-2">Tambah Data Terlambat
                                                Imunisasi</span><i class="fas fa-clock ml-2"></i></a>
                                    </div>
                                    <form action="/data-posyandu/cari" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-input" name="cari"
                                                placeholder="Cari Nama Anak .." value="{{ old('cari') }}">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table text-center text-light mt-3">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">Nama Anak</th>
                                                <th class="text-primary">TB (cm)</th>
                                                <th class="text-primary">BB (kg)</th>
                                                <th class="text-primary">Umur Anak</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        @endif

        @if (session('info'))
            Swal.fire({
                text: '{{ session('info') }}',
                icon: 'info',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        @endif
    </script>
@endsection
