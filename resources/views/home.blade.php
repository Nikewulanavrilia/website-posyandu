@extends('layouts.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="card-title text-primary fw-bold">Selamat Datang, {{ Auth::user()->name }}</h2>
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h2 class="text-primary mb-0">{{ $jumlah_anak }}</h2>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon icon-box-primary">
                                        <span class="mdi mdi-human-handsup icon-item" id="icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-primary font-weight-bold">Data Anak</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h2 class="text-primary mb-0">{{ $jumlah_anak_perempuan }}</h2>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon icon-box-primary">
                                        <span class="mdi mdi-human-female icon-item" id="icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-primary font-weight-bold">Anak Perempuan</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h2 class="text-primary mb-0">{{ $jumlah_anak_laki_laki }}</h2>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon icon-box-primary">
                                        <span class="mdi mdi-human-male icon-item" id="icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-primary font-weight-bold">Anak Laki-laki</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h2 class="text-primary mb-0">{{ $jumlah_orang_tua }}</h2>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon icon-box-primary">
                                        <span class="mdi mdi-account-child icon-item" id="icon-item"></span>
                                    </div>
                                </div </div>
                                <h6 class="text-primary font-weight-bold">Data Orang Tua</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-13">
                        <div class="card">
                            <div class="card-body">
                                <div class="container mt-3 text-center">
                                    <div class="row">
                                        <div class="card col-md-6">
                                            <h4 class="card-title">Diagram Data Anak</h4>
                                            <canvas id="chartAnak"></canvas>
                                        </div>
                                        <div class="card col-md-6">
                                            <h4 class="card-title">Diagram Data Orang Tua</h4>
                                            <canvas id="chartOrangTua"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Data Anak Chart
                const ctxAnak = document.getElementById('chartAnak').getContext('2d');
                const chartAnak = new Chart(ctxAnak, {
                    type: 'pie',
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
                        indexAxis: 'y', // Change to horizontal bar
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
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

                // Data Orang Tua Chart
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
                        indexAxis: 'y', // Change to horizontal bar
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
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
