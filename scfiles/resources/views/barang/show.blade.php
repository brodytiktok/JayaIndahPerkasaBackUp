@extends('layout.index')

@section('title', 'Halaman Barang')

@section('content')
    <div class="card">
        <div class="m-2 p-2">
            <a href="{{ url('barang') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-left-square"></i></a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Informasi <span class="text-bold"
                    style="text-decoration: underline;">{{ $barang->nama_barang }}</span>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $barang->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Kode Produk</th>
                        <td>{{ $barang->kode_barang }}</td>
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td>{{ $barang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Satuan</th>
                        <td>{{ $barang->satuan }}</td>
                    </tr>
                    <tr>
                        <th>Harga Jual (RP)</th>
                        <td>{{ $barang->harga_jual }}</td>
                    </tr>
                    <tr>
                        <th>Stok Awal</th>
                        <td>{{ $barang->stok_awal }}</td>
                    </tr>
                    <tr>
                        <th>Stok Akhir</th>
                        <td>{{ $barang->stok_akhir }}</td>
                    </tr>
                </thead>



            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


@endsection
