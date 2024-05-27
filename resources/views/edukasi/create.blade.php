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
                        <form action="{{ route('edukasi.store') }}" method="post" enctype="multipart/form-data" id="uploadForm">
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
                                    <button type="submit" class="btn btn-primary" onclick="validateFile(event)">Simpan</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function validateFile(event) {
        const fileInput = document.getElementById('inputGroupFile01');
        const filePath = fileInput.value;
        const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.svg)$/i;

        if (!allowedExtensions.exec(filePath)) {
            event.preventDefault();
            Swal.fire({
                text: 'File harus berupa gambar (jpg, jpeg, png, gif, svg)',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
            fileInput.value = '';
            return false;
        }

        const fileSize = fileInput.files[0].size / 1024 / 1024;
        if (fileSize > 1) {
            event.preventDefault();
            Swal.fire({
                text: 'File tidak boleh lebih dari 1MB.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33',
            });
            fileInput.value = '';
            return false;
        }
    }

    @if(session('error'))
        Swal.fire({
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33',
        });
    @endif
</script>
@endsection