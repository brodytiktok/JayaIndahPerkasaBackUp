@extends('layout.index')

@section('title', 'Halaman Order')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kode Status</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 100px">Id Status</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session()->has('infodelete'))
                <div class="alert alert-success bg-danger">
                    {{ session()->get('infodelete') }}
                </div>
            @endif
            @if (session()->has('infocreate'))
                <div class="alert alert-success">
                    {{ session()->get('infocreate') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-hover">
                <a href="{{ url('order/create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>
                <thead>
                    <tr class="text-center" style="font-size: 13px;">
                        <th style="width: 6rem">Nama Pelanggan</th>
                        <th style="width: 3rem">Nomor Pesanan</th>
                        <th style="width: 6rem">Tanggal Pesanan</th>
                        <th style="width: 6rem">Tanggal <br>Sampai</th>
                        <th style="width: 2rem">Item</th>
                        <th style="width: 2rem">Metode <br>Pembayaran</th>
                        <th style="width: 7rem">Total Biaya</th>
                        <th style="width: 2rem">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $data)
                        <tr>
                            <td><a href="{{ url('order/' . $data->id) }}">{{ $data->nama_pelanggan }}</a></td>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->tanggal_pemesanan }}</td>
                            <td>{{ $data->tanggal_terima }}</td>
                            <td>{{ $data->items }}</td>
                            <td>{{ $data->metode }}</td>
                            <td>{{ $data->biaya }}</td>
                            <td>{{ $data->statuse_id }}</td>
                            <td class="text-center">
                                <a href="{{ url('order/' . $data->id) . '/edit' }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $data->id }}"
                                    data-nama="{{ $data->nama_pelanggan }}" data-toggle="modal"
                                    data-target="#deleteModal"><i class="bi bi-x-circle-fill"></i></button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- modal delete untuk konfirmasi --}}
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <form action="" method="POST" id="formDelete">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Data </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mb-konfirmasi">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-light">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        // jika tombol hapus ditekan, generate alamat URL untuk proses hapus
        // id disini adalah id prodi
        $('.btn-hapus').click(function() {
            let id = $(this).attr('data-id');
            $('#formDelete').attr('action', '/order/' + id);

            let nama = $(this).attr('data-nama');
            $('#mb-konfirmasi').text("Apakah Anda yakin ingin menghapus data " + nama + " ?");

        })

        // jika tombol Ya, hapus ditekan, submit form hapus
        $('#formDelete [type="submit"]').click(function() {
            $('#formDelete').submit();
        })
    </script>
@endsection
