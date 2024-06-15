@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('data_posyandu_terlambat.store') }}" method="post">
                                    @csrf
                                    <div class="container">
                                        <h3 class="text-primary">Tambah Data Terlambat Imunisasi</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="nama_anak" class="col-12 text-primary">Nama Anak</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-input col-10" id="nama_anak"
                                                            name="nama_anak" readonly>
                                                        <button class="btn-primary btn p-2 rounded"
                                                            id="btn-pilih">Pilih</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_lahir_anak" class="col-12 text-primary">Tanggal
                                                        Lahir Anak</label>
                                                    <input type="date" class="form-input datepicker"
                                                        id="tanggal_lahir_anak" name="tanggal_lahir_anak" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="nik_anak" class="col-12 text-primary">NIK Anak</label>
                                                    <input type="text" class="form-input datepicker" name="nik_anak"
                                                        id="nik_anak" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <h3 class="text-primary">Data Imunisasi</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tanggal_posyandu" class="col-12 text-primary">Tanggal
                                                        Imunisasi</label>
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
                                                        id="bb_anak" step="0.1"required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 d-flex flex-column">
                                                    <label for="tb_anak" class="col-12 text-primary">Tinggi Badan
                                                        (cm)</label>
                                                    <input type="number" class="form-input datepicker" name="tb_anak"
                                                        id="tb_anak" step="0.1"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="dataVaksin" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-start align-items-start flex-wrap">
                                                    @foreach ($data_vaksin_list as $id_vaksin => $nama_vaksin)
                                                        <div class="form-check-container" style="margin-right: 20px; @if ($loop->first) margin-left: -20px; @endif">
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
                                        <a href="{{ route('pages.penimbangan') }}"><button class="btn btn-secondary"
                                                type="button" onclick="batal()">Batal</button></a>
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

            function toggleDataVaksin() {
                var umurAnak = $('#umur_anak').val();
                if (umurAnak) {
                    $('#dataVaksin').css('display', 'block');
                } else {
                    $('#dataVaksin').css('display', 'none');
                }
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
                
                if (umurAnak === 0 || umurAnak === 1) {
                    Swal.fire({
                        icon: 'error',
                        text: 'Usia anak tidak diperbolehkan untuk pemberian imunisasi',
                        confirmButtonColor: '#3085d6',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('pages.penimbangan') }}";
                        }
                    });
                    $('#dataVaksin').css('display', 'none');
                    return;
                }

                toggleDataVaksin();

                $('.checkbox-vaksin').hide();

                if (umurAnak === 2) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 3) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 6 || idVaksin === 7) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 4) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 6 || idVaksin === 7 || idVaksin === 8 || idVaksin === 9 ||
                            idVaksin === 10 || idVaksin === 11) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 5) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 6 || idVaksin === 7 || idVaksin === 8 || idVaksin === 9 ||
                            idVaksin === 10 || idVaksin === 11 || idVaksin === 12 || idVaksin ===
                            13 || idVaksin === 14 || idVaksin === 15) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 6) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 6 || idVaksin === 7 || idVaksin === 8 || idVaksin === 9 ||
                            idVaksin === 10 || idVaksin === 11 || idVaksin === 12 || idVaksin ===
                            13 || idVaksin === 14 || idVaksin === 15) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 7) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 8) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 9) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 10) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14 || idVaksin ===
                            16 || idVaksin === 17) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 11) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 2 || idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14 || idVaksin ===
                            16 || idVaksin === 17|| idVaksin === 18) {
                            $(this).show();
                        }
                    });
                }else if (umurAnak === 12) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if ( idVaksin === 3 || idVaksin === 4 || idVaksin === 5 ||
                            idVaksin === 7 || idVaksin === 8 || idVaksin === 9 || idVaksin === 11 ||
                            idVaksin === 12 || idVaksin === 13 || idVaksin === 14 || idVaksin ===
                            16 || idVaksin === 17|| idVaksin === 18) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak === 18) {
                    $('.checkbox-vaksin').each(function() {
                        var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                        if (idVaksin === 3 ||idVaksin === 4 ||idVaksin === 5 ||idVaksin === 7 ||idVaksin === 8 ||
                        idVaksin === 9 ||idVaksin === 11 ||idVaksin === 12 ||idVaksin === 13 ||idVaksin === 14 ||
                        idVaksin === 16 ||idVaksin === 17 ||idVaksin === 18 ||idVaksin === 19||idVaksin === 20 ) {
                            $(this).show();
                        }
                    });
                } else if (umurAnak >= 23 && umurAnak <= 59) {
                        $('.checkbox-vaksin').each(function() {
                            var idVaksin = parseInt($(this).find('input[type="checkbox"]').val());
                            if (idVaksin === 3 || idVaksin === 4 || idVaksin === 5 || idVaksin === 7 ||
                                idVaksin === 8 || idVaksin === 9 || idVaksin === 11 || idVaksin === 12 ||
                                idVaksin === 13 || idVaksin === 14 || idVaksin === 16 || idVaksin === 17 ||
                                idVaksin === 18 || idVaksin === 19 || idVaksin === 20 || idVaksin === 21) {
                                $(this).show();
                            }
                        });
                    } else {
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