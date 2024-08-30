@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h2 class="card-title text-primary fw-bold">Selamat Datang, {{ Auth::user()->name }}</h2>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-normal mb-2 text-primary">Data Anak</h4>
                                <h2 class="text-primary mb-0">{{ $jumlah_anak }}</h2>
                            </div>
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-human-handsup icon-item"></span>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-normal mb-2 text-danger">Anak Perempuan</h4>
                                <h2 class="text-danger mb-0">{{ $jumlah_anak_perempuan }}</h2>
                            </div>
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-human-female icon-item"></span>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-normal mb-2 text-success">Anak Laki-laki</h4>
                                <h2 class="text-success mb-0">{{ $jumlah_anak_laki_laki }}</h2>
                            </div>
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-human-male icon-item"></span>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="font-weight-normal mb-2 text-warning">Data Orang Tua</h4>
                                <h2 class="text-warning mb-0">{{ $jumlah_orang_tua }}</h2>
                            </div>
                            <div class="icon icon-box-warning">
                                <span class="mdi mdi-account-child icon-item"></span>
                            </div>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title text-center">Diagram Data Anak</h4>
                            <canvas id="chartAnak"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title text-center">Diagram Data Orang Tua</h4>
                            <canvas id="chartOrangTua"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxAnak = document.getElementById('chartAnak').getContext('2d');
            const chartAnak = new Chart(ctxAnak, {
                type: 'doughnut',
                data: {
                    labels: ['Anak Perempuan', 'Anak Laki-laki'],
                    datasets: [{
                        label: 'Jumlah Anak',
                        data: [{{ $jumlah_anak_perempuan }}, {{ $jumlah_anak_laki_laki }}],
                        backgroundColor: ['#FF6384', '#36A2EB'],
                        borderColor: ['#FF6384', '#36A2EB'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });

            const ctxOrangTua = document.getElementById('chartOrangTua').getContext('2d');
            const chartOrangTua = new Chart(ctxOrangTua, {
                type: 'doughnut',
                data: {
                    labels: ['Jumlah Anak', 'Jumlah Orang Tua'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $jumlah_anak }}, {{ $jumlah_orang_tua }}],
                        backgroundColor: ['#FFCE56', '#EF5350'],
                        borderColor: ['#FFCE56', '#EF5350'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection