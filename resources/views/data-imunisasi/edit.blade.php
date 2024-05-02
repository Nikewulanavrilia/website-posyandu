@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Edit data Imunisasi</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ isset($data_imunisasi) ? route('data_imunisasi.update', $data_imunisasi->id_vaksin) : route('data_imunisasi.store') }}" method="POST">
                            @csrf
                            @if(isset($data_imunisasi))
                                @method('PUT')
                            @endif
                            <div class="mb-3 d-flex flex-column">
                                <label for="nama_vaksin" class="col-12 text-primary">Nama Vaksin</label>
                                <input type="text" class="form-input" name="nama_vaksin" id="nama_vaksin" value="{{ isset($data_imunisasi) ? $data_imunisasi->nama_vaksin : '' }}" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.data_imunisasi') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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