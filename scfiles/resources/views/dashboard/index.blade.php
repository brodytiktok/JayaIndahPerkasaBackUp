@extends('layout.index')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-white" style="background: url('../dist/img/photo1.png') center center;">
                <h4 class="widget-user-username text-right">{{ Auth::user()->name }}</h4>
                
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="../../dist/img/people.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    {{-- Followers --}}
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">FOLLOWERS</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">
                                @php
                                    echo ' IDR ' . App\Http\Controllers\OrderController::getIncome();
                                @endphp
                            </h5>
                            <span class="description-text">INCOMING</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">
                                @php
                                    echo App\Http\Controllers\OrderController::getTotalItems();
                                @endphp
                            </h5>
                            <span class="description-text">PRODUCTS SOLD</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    
    <div class="card-body">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                Tampilan Status Order
            </p>
        </figure>
        <style>
            .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }
        
        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        
        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }
        
        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
        
        input[type="number"] {
            min-width: 50px;
        }
        </style>
        <script>
            Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafik Status Order'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [
                    @foreach ($result as $item)
                    {
                        name: '{{$item->status}}',
                        y: {{$item->jumlah_status}}
                    },       
                    @endforeach
                ]
            }]
        });
        </script>
        
    </div>
    <h5 class="mb-2">Card Items</h5>
    <div class="card card-success">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card mb-2 bg-gradient-dark">
                        <img class="card-img-top" src="../dist/img/photo1.png" alt="Dist Photo 1">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-center bg-transparent">
                                <div class="mt-3 pt-2">
                                    <h5 class="card-title text-white">
                                        <i class="bi bi-person-badge" style="font-size: 3rem;"></i>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    Jumlah Karyawan <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    @php
                                        echo App\Http\Controllers\KaryawanController::select();
                                    @endphp <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('karyawan') }}" class="text-white">Lihat Daftar Karyawan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card mb-2">
                        <img class="card-img-top" src="../dist/img/photo2.png" alt="Dist Photo 2">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-center bg-transparent">
                                <div class="mt-3 pt-2">
                                    <h5 class="card-title text-white">
                                        <i class="bi bi-box-seam heading" style="font-size: 3rem;"></i>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    Produk Tersedia <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    @php
                                        echo App\Http\Controllers\BarangController::select();
                                    @endphp <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('barang') }}" class="text-white">Lihat Daftar Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="card mb-2 bg-gradient-dark">
                        <img class="card-img-top" src="../dist/img/photo1.png" alt="Dist Photo 1">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-center bg-transparent">
                                <div class="mt-3 pt-2">
                                    <h5 class="card-title text-white">
                                        <i class="bi bi-basket" style="font-size: 3rem;"></i>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    Jumlah Pesanan <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p class="card-text pb-2 pt-1 text-white">
                                    @php
                                        echo App\Http\Controllers\OrderController::getOrder();
                                    @endphp <br>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('order') }}" class="text-white">Lihat Daftar Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
