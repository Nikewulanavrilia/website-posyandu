@extends('layouts.template')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Edit data Anak</h3>
                        <form action="{{ isset($data_anak) ? route('data_anak.update', $data_anak->nik_anak) : route('data_anak.store') }}" method="POST">
                            @csrf
                            @if(isset($data_anak))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nik_anak" class="col-12 text-primary">NIK Anak</label>
                                        <input type="text" class="form-input" name="nik_anak" id="nik_anak" value="{{ isset($data_anak) ? $data_anak->nik_anak : '' }}" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                        <input type="text" class="form-input" name="nama_anak" id="nama_anak" value="{{ isset($data_anak) ? $data_anak->nama_anak : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="tempat_lahir_anak" class="col-12 text-primary">Tempat Lahir Anak</label>
                                        <input type="text" class="form-input" name="tempat_lahir_anak" id="tempat_lahir_anak" value="{{ isset($data_anak) ? $data_anak->tempat_lahir_anak : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal Lahir Anak</label>
                                        <input type="date" class="form-input datepicker" name="tanggal_lahir_anak" id="tanggal_lahir_anak" max="{{ date('Y-m-d') }}" value="{{ isset($data_anak) ? $data_anak->tanggal_lahir_anak : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="anak_ke" class="col-12 text-primary">Anak Ke</label>
                                        <input type="text" class="form-input" name="anak_ke" id="anak_ke" value="{{ isset($data_anak) ? $data_anak->anak_ke : '' }}" pattern="[1-9]" maxlength="2" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="gol_darah_ibu" class="col-12 text-primary">Gol Darah Anak</label>
                                        <select class="form-select form-input" name="gol_darah_anak" id="gol_darah_anak" required>
                                            <option value="A" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'A') ? 'selected' : '' }}>A</option>
                                            <option value="B" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'B') ? 'selected' : '' }}>B</option>
                                            <option value="AB" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'AB') ? 'selected' : '' }}>AB</option>
                                            <option value="O" {{ (isset($data_anak) && $data_anak->gol_darah_anak == 'O') ? 'selected' : '' }}>O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="jenis_kelam_anak" class="col-12 text-primary">Jenis Kelamin</label>
                                        <select class="form-select form-input" name="jenis_kelamin_anak" id="jenisKelamin" required>
                                            <option value="Laki-laki" {{ (isset($data_anak) && $data_anak->jenis_kelamin_anak == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ (isset($data_anak) && $data_anak->jenis_kelamin_anak == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="nik_ibu" class="col-12 text-primary">Nama Ibu</label>
                                        <div class="input-group mb-2">
                                            <input class="form-input w-75" type="text" placeholder="Pencarian untuk nama ibu" id="myInput" onkeyup="filterFunction()" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                                        </div>
                                        <select class="form-select form-input" name="no_kk" id="nik_ibu" required>
                                        @foreach ($nik_ibu_list as $no_kk => $nama_ibu)
                                            @if ($no_kk == $data_anak->no_kk)
                                                <option value="{{ $no_kk }}" selected>{{ $nama_ibu }} ({{ $no_kk }})</option>
                                            @else
                                                <option value="{{ $no_kk }}">{{ $nama_ibu }} ({{ $no_kk }})</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pages.data_anak') }}"><button class="btn btn-secondary" type="button">Batal</button></a>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tanggal').setAttribute('min', new Date().toISOString().split("T")[0]);
</script>
<script>
    function filterFunction() {
        var input, filter, select, option, i, matchFound;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        select = document.getElementById("nik_ibu");
        option = select.getElementsByTagName("option");
        matchFound = false;
        for (i = 0; i < option.length; i++) {
            if (option[i].text.toUpperCase().indexOf(filter) > -1) {
                option[i].style.display = "";
                matchFound = true;
            } else {
                option[i].style.display = "none";
            }
        }
        if (!matchFound) {
            document.getElementById("noMatch").style.display = "block";
        } else {
            document.getElementById("noMatch").style.display = "none";
        }
    }
</script>
@endsection