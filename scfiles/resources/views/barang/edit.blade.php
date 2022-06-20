@extends('layout.index')

@section('title', 'Halaman Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Barang</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('barang.update', ['barang' => $barang->id]) }}" method="POST">

            @method('PATCH')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- tanggal --}}
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal"
                                value="{{ old('tanggal') ?? $barang->tanggal }}">

                        </div>
                        <!-- /.form-group -->
                        {{-- kode barang --}}
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" placeholder="masukan kode barang"
                                value="{{ old('kode_barang') ?? $barang->kode_barang }}">

                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    {{-- kode barang --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="masukan kode barang"
                                value="{{ old('nama_barang') ?? $barang->nama_barang }}">
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
                                <td><input type="text" class="form-control" name="satuan" placeholder="masukan satuan"
                                        value="{{ old('satuan') ?? $barang->satuan }}">

                                </td>
                                <td><input type="text" class="form-control" name="harga_jual"
                                        placeholder="masukan harga jual"
                                        value="{{ old('harga_jual') ?? $barang->harga_jual }}">
                                </td>
                                <td><input type="text" class="form-control" name="stok_awal"
                                        placeholder="masukan stok akhir"
                                        value="{{ old('stok_awal') ?? $barang->stok_awal }}">
                                </td>
                                <td><input type="text" class="form-control" name="stok_akhir"
                                        placeholder="masukan stok akhir"
                                        value="{{ old('stok_akhir') ?? $barang->stok_akhir }}">
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width: 130px">Simpan</button>
                <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                        href="{{ url('barang') }}">Batal</a></button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    </form>
@endsection
