@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Edit Jadwal Posyandu</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ isset($jadwal_posyandu) ? route('jadwal_posyandu.update', $jadwal_posyandu->id_jadwal) : route('jadwal_posyandu.store') }}" method="POST">
                            @csrf
                            @if(isset($jadwal_posyandu))
                                @method('PUT')
                            @endif
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_posyandu" class="col-12 text-primary">Jadwal Posyandu</label>
                            <input type="date" class="form-input datepicker" name="jadwal_posyandu" id="tanggal" min="{{ date('Y-m-d') }}" value="{{ isset($jadwal_posyandu) ? $jadwal_posyandu->jadwal_posyandu : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_buka" class="col-12 text-primary">Jam Buka</label>
                            <input type="time" class="form-input" name="jadwal_buka" id="jadwal_buka" value="{{ isset($jadwal_posyandu) ? $jadwal_posyandu->jadwal_buka : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="jadwal_tutup" class="col-12 text-primary">Jam Selesai</label>
                            <input type="time" class="form-input" name="jadwal_tutup" id="jadwal_tutup" value="{{ isset($jadwal_posyandu) ? $jadwal_posyandu->jadwal_tutup : '' }}"required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.jadwal') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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