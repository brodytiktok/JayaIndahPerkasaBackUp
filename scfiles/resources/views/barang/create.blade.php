@extends('layout.index')

@section('title', 'Create Barang')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" placeholder="Masukan Tanggal">

                        </div>
                        <!-- /.form-group -->
                        {{-- kode barang --}}
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" placeholder="masukan kode barang">

                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    {{-- kode barang --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="masukan kode barang">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                {{-- kodebarang --}}
                <div class="form-group">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><label for="satuan">Satuan</label></th>
                                <th><label for="harga_jual">Harga Jual (RP)</label></th>
                                <th><label for="stok_awal">Stok Awal</label></th>
                                <th><label for="stok_akhir">Stok Akhir</label></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="satuan" placeholder="masukan satuan">
                                </td>
                                <td><input type="text" class="form-control" name="harga_jual"
                                        placeholder="masukan harga jual"></td>
                                <td><input type="text" class="form-control" name="stok_awal"
                                        placeholder="masukan stok akhir">
                                </td>
                                <td><input type="text" class="form-control" name="stok_akhir"
                                        placeholder="masukan stok akhir">
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            {{-- Nama Barang --}}
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="width: 130px">Tambahkan</button>
        <button type="button" class="btn btn-default float-right" style="width: 130px"><a
                href="{{ url('barang') }}">Batal</a></button>
    </div>
    </form>
    </div>
@endsection
