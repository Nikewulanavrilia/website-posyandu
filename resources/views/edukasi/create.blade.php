@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-primary mt-2">Tambah Data Edukasi</h1>
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('edukasi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="mb-3 d-flex flex-column">
                            <label for="judul" class="col-12 text-primary">Judul</label>
                            <input type="text" class="form-input" name="judul" id="judul" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label for="isi" class="col-12 text-primary">Isi</label>
                            <input type="text" class="form-input" name="isi" id="isi" required>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                            <label class="col-12 text-primary" for="inputGroupFile01">Upload Foto</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="foto" required>
                            </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                                    <a href="{{ route('pages.edukasi') }}"><button class="btn btn-secondary"
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