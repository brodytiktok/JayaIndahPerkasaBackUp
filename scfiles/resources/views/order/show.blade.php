@extends('layout.index')

@section('title', 'Halaman Order')

@section('content')
    <div class="card">
        <div class="m-2 p-2">
            <a href="{{ url('order') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-left-square"></i></a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Informasi Pelanggan <span class="text-bold" style="text-decoration: underline;">
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td>{{ $order->nama_pelanggan }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Pesanan</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pesanan</th>
                        <td>{{ $order->tanggal_pemesanan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Sampai</th>
                        <td>{{ $order->tanggal_terima }}</td>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <td>{{ $order->items }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>{{ $order->metode }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya</th>
                        <td>{{ $order->biaya }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $order->statuse_id }}</td>
                    </tr>
                </thead>
            </table>
            <!-- /.card-body -->
        </div>
    </div>
    <style>
        table {
            border: 1px;
            border-style: groove;
        }

        th {
            text-align: center;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }
    </style>
@endsection
