@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('data_posyandu.store') }}" method="post">
                                    @csrf
                                    <div class="container">
                                        <h3 class="text-primary">Tambah Data Posyandu</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                                    <div class="input-group">
                                                    <input type="text" class="form-input col-10" id="nama_anak" name="nama_anak" readonly>
                                                        <button class="btn-primary btn p-2 rounded"
                                                            id="btn-pilih">Pilih</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal
                                                        Lahir Anak</label>
                                                        <input type="date" class="form-input datepicker" id="tanggal_lahir_anak" name="tanggal_lahir_anak" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="nik_anak" class="col-12 text-primary">NIK Anak</label>
                                                    <input type="text" class="form-input datepicker" name="nik_anak" id="nik_anak" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <h3 class="text-primary">Data Posyandu</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_posyandu" class="col-12 text-primary">Tanggal
                                                        Posyandu</label>
                                                    <input type="date" class="form-input datepicker"
                                                        name="tanggal_posyandu" id="tanggal_posyandu"
                                                        min="{{ date('Y-m-d') }}"required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="umur_anak" class="col-12 text-primary">Umur Anak
                                                        (bulan)</label>
                                                    <input type="number" class="form-input datepicker" name="umur_anak"
                                                        id="umur_anak" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="bb_anak" class="col-12 text-primary">Berat Badan
                                                        (kg)</label>
                                                    <input type="number" class="form-input datepicker" name="bb_anak"
                                                        id="bb_anak"step="0.1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tb_anak" class="col-12 text-primary">Tinggi Badan
                                                        (cm)</label>
                                                    <input type="number" class="form-input datepicker" name="tb_anak"
                                                        id="tb_anak" step="0.1" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="tdk_ada_vaksin" style="display: none;">
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <input type="hidden" class="form-input" value="22" name="kondisi_anak" id="tdk_vaksin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="kondisi-anak" style="display: block;">
                                            <div class="col-md-6 d-flex align-items-center">
                                                <div class="form-check ml-3">
                                                    <input class="form-check-input" type="radio" id="sehat" name="kondisi_anak" value="sehat" onchange="toggleDataVaksinVisibility()">
                                                    <label class="form-check-label fw-bold" for="sehat" style="font-size: 1rem;">Sehat</label>
                                                </div>
                                                <div class="form-check ml-5">
                                                    <input class="form-check-input" type="radio" id="sakit" name="kondisi_anak" value="22" onchange="toggleDataVaksinVisibility()">
                                                    <label class="form-check-label fw-bold" for="sakit" style="font-size: 1rem;">Sakit/Tidak Vaksin</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="dataVaksin" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-start align-items-start flex-wrap">
                                                    @foreach ($data_vaksin_list as $id_vaksin => $nama_vaksin)
                                                        <div class="form-check-container" style="margin-right: 20px;">
                                                            <div class="form-check checkbox-vaksin">
                                                                <input class="form-check-input" type="checkbox" name="vaksin[]" id="vaksin_{{ $id_vaksin }}" value="{{ $id_vaksin }}">
                                                                <label class="form-check-label fw-bold" for="vaksin_{{ $id_vaksin }}" style="font-size: 1rem;">
                                                                    {{ $nama_vaksin }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" container mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('pages.penimbangan') }}"><button class="btn btn-secondary" type="button" onclick="batal()">Batal</button></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var sakitRadio = document.getElementById("sakit");
        var firstVaccineId = document.getElementById('first_vaccine_id').value;

        sakitRadio.value = firstVaccineId;
    </script>
    <script>
        function toggleDataVaksinVisibility() {
    var sehatRadio = document.getElementById("sehat");
    var sakitRadio = document.getElementById("sakit");
    var dataVaksin = document.getElementById("dataVaksin");

    if (sehatRadio.checked) {
        dataVaksin.style.display = "block";
    } else if (sakitRadio.checked) {
        dataVaksin.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', (event) => {
    toggleDataVaksinVisibility();
});

    </script>
    <script>
        document.getElementById('tanggal_posyandu').setAttribute('min', new Date().toISOString().split("T")[0]);
    </script>
    <script>
        $(document).ready(function() {
            function showSweetAlert(htmlContent) {
                Swal.fire({
                    html: htmlContent,
                    showConfirmButton: false
                });
            }

            $(document).on('click', '.btn-pilih', function() {
                var namaAnak = $(this).closest('tr').find('td:eq(0)').text();
                var tanggalLahirAnak = $(this).closest('tr').find('td:eq(1)').text();
                var nikAnak = $(this).data('id');

                $('#nama_anak').val(namaAnak);
                $('#tanggal_lahir_anak').val(tanggalLahirAnak);
                $('#nik_anak').val(nikAnak);

                Swal.close();
            });


            $('#tanggal_posyandu').on('change', function() {
                var tanggalPosyandu = new Date($(this).val());
                var tanggalLahirAnak = new Date($('#tanggal_lahir_anak').val());

                var diff = tanggalPosyandu.getTime() - tanggalLahirAnak.getTime();
                var umurAnak = Math.floor(diff / (1000 * 60 * 60 * 24 * 30.4375));

                $('#umur_anak').val(umurAnak);

                if ([5, 6, 7, 8, 11, 13, 14, 15, 16, 17,19,20,21,22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 
                44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,
            83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100].includes(umurAnak)) {
                    document.getElementById('tdk_ada_vaksin').style.display = 'block';
                    document.getElementById('kondisi-anak').style.display = 'none';
                } else {
                    document.getElementById('tdk_ada_vaksin').style.display = 'none';
                    document.getElementById('kondisi-anak').style.display = 'block';
                }

                $('.checkbox-vaksin').hide();

                if (umurAnak === 0) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 1 || idVaksin === 2 || idVaksin === 3) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 1) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 2) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 4 || idVaksin === 5 || idVaksin === 6 || idVaksin === 7) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 3) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 8 || idVaksin === 9 || idVaksin === 10 || idVaksin === 11) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 4) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 12 || idVaksin === 13 || idVaksin === 14 || idVaksin === 15) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 9) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 16 || idVaksin === 17) {
                            $(this).show();
                        }
                    });
                }else if (umurAnak === 10) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 18) {
                            $(this).show();
                        }
                    });
                }else if (umurAnak === 12) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 19) {
                            $(this).show();
                        }
                    });
                }else if (umurAnak === 18) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 20|| idVaksin === 21) {
                            $(this).show();
                        }
                    });
                }
                else {
                    $('.checkbox-vaksin').show();
                }
            });

            function fetchData(page = 1) {
                $.ajax({
                    url: '/pilih-data-anak',
                    method: 'GET',
                    data: { page: page },
                    success: function(response) {
                        var tableContent =
                            '<table class="table"><thead><tr><th>Nama Anak</th><th>Tanggal Lahir</th><th>Action Pilih</th></tr></thead><tbody>';
                        response.data.forEach(function(anak) {
                            // Membatasi panjang nama anak
                            var truncatedName = anak.nama_anak.length > 20 ? anak.nama_anak.substring(0, 17) + '...' : anak.nama_anak;
                            tableContent += '<tr><td class="nama-anak" title="' + anak.nama_anak + '">' + truncatedName + '</td><td>' +
                                anak.tanggal_lahir_anak +
                                '</td><td><button class="btn btn-primary btn-pilih" data-id="' +
                                anak.nik_anak + '">pilih</button></td></tr>';
                        });
                        tableContent += '</tbody></table>';

                        // Add pagination controls
                        tableContent += '<div class="pagination">';
                        if (response.prev_page_url) {
                            tableContent += '<button class="btn btn-secondary paginate-btn" data-page="' + (response.current_page - 1) + '">Previous</button>';
                        }
                        if (response.next_page_url) {
                            tableContent += '<button class="btn btn-secondary paginate-btn" data-page="' + (response.current_page + 1) + '">Next</button>';
                        }
                        tableContent += '</div>';

                        showSweetAlert(tableContent);

                        $('.swal-wide').css({
                            'width': 'auto',
                            'max-width': '100%',
                            'white-space': 'normal',
                            'word-wrap': 'break-word'
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        showSweetAlert('Error: ' + error);
                    }
                });
            }

            $('#btn-pilih').on('click', function() {
                fetchData();
            });

            $(document).on('click', '.paginate-btn', function() {
                var page = $(this).data('page');
                fetchData(page);
            });
        });
    </script>
@endsection