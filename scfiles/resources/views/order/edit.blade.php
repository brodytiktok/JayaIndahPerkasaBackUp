@extends('layout.index')

@section('title', 'Halaman Order')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Add Order</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            {{-- @method('PUT') --}}
            <div class="card-body">
                {{-- Nama Pelanggan --}}
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan"
                        value="{{ old('nama_pelanggan') ?? $order->nama_pelanggan }}">
                </div>
                <!-- /.form-group -->
                {{-- Tanggal Pemesanan --}}
                <div class="form-group">
                    <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                    <input type="date" class="form-control" name="tanggal_pemesanan"
                        value="{{ old('tanggal_pemesanan') ?? $order->tanggal_pemesanan }}">
                </div>
                {{-- Tanggal Sampai --}}
                <div class="form-group">
                    <label for="tanggal_terima">Tanggal Sampai</label>
                    <input type="date" class="form-control" name="tanggal_terima"
                        value="{{ old('tanggal_terima') ?? $order->tanggal_terima }}">
                </div>
                {{-- Items --}}
                <div class="form-group">
                    <label for="items">Items</label>
                    <input type="text" class="form-control" name="items" placeholder="Masukan Items"
                        value="{{ old('items') ?? $order->items }}">
                </div>
                {{-- Metode --}}
                <div class="form-group">
                    <label for="metode">Metode Pembayaran</label>
                    <input type="text" class="form-control" name="metode" placeholder="Masukan Metode Pembayaran"
                        value="{{ old('metode') ?? $order->metode }}">
                </div>
                {{-- Status --}}
                <div class="form-group">
                    <label for="statuse_id">Status</label>
                    <select name="statuse_id" class="form-control select2">
                        <option value="">Pilih Status</option>
                        @foreach ($status as $item)
                            <option value="{{ $item->id }} "
                                {{ $item->id == $order->statuse_id ? 'selected' : null }}>
                                {{ $item->status }}
                            </option>
                        @endforeach

                    </select>
                </div>
                {{-- Biaya --}}
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="text" class="form-control" name="biaya" placeholder="Masukan Biaya Total"
                        value="{{ old('biaya') ?? $order->biaya }}">
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary m-2" style="width: 130px">Simpan</button>
                    <button type="submit" class="btn btn-danger float-right m-2" style="width: 130px"><a
                            href="{{ url('order') }}">Batal</a></button>
                </div>
            </div>
        </form>
    </div>
@endsection
