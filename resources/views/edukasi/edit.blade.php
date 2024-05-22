@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Edit Data Edukasi</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ isset($edukasi) ? route('edukasi.update', $edukasi->id_edukasi) : route('edukasi.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @if(isset($edukasi))
                                @method('PUT')
                            @endif
                            <div class="mb-3 d-flex flex-column">
                            <label for="judul" class="col-12 text-primary">Judul</label>
                            <input type="text" class="form-input" name="judul" id="judul" value="{{ isset($edukasi) ? $edukasi->judul : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="isi" class="col-12 text-primary">Isi</label>
                            <input type="text" class="form-input" name="isi" id="isi" value="{{ isset($edukasi) ? $edukasi->isi : '' }}" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label class="col-12 text-primary" for="inputGroupFile01">Upload Foto</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="foto" {{ isset($edukasi) ? '' : 'required' }}>
                                @if(isset($edukasi) && $edukasi->foto)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($edukasi->foto) }}" alt="Edukasi Foto" style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.edukasi') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
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