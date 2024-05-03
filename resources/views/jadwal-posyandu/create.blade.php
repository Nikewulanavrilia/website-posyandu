@extends('layouts.template')
@section('contect')
@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Tambah Jadwal</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('jadwal_posyandu.store') }}" method="post">
                            @csrf 
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_posyandu" class="col-12 text-primary">Tanggal Posyandu</label>
                            <input type="date" class="form-input datepicker" name="jadwal_posyandu" id="tanggal" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_buka" class="col-12 text-primary">Jam Buka</label>
                            <input type="time" class="form-input" name="jadwal_buka" id="jadwal_buka" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_tutup" class="col-12 text-primary">Jam Selesai</label>
                            <input type="time" class="form-input" name="jadwal_tutup" id="jadwal_tutup" required>
                            </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <a href="{{ route('pages.jadwal') }}"><button class="btn btn-secondary"
                                            type="button" onclick="batal()">Batal</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.getElementById('tanggal').setAttribute('min', new Date().toISOString().split("T")[0]);
</script>
