@extends('layout.index')

@section('title', 'Halaman Jabatan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Jabatan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="body mb-3">
                <a href="{{ url('jabatan/create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>
            </div>
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">ID</th>
                        <th class="text-center">Jabatan</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatans as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td class="text-center">{{ $data->jabatan }}</td>
                            <td> <a href="{{ url('jabatan/' . $data->id) . '/edit' }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $data->id }}"
                                    data-nama="{{ $data->jabatan }}" data-toggle="modal" data-target="#deleteModal"><i
                                        class="bi bi-x-circle-fill"></i></button>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
    <!-- /.card -->
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
            $('#formDelete').attr('action', '/jabatan/' + id);

            let nama = $(this).attr('data-nama');
            $('#mb-konfirmasi').text("Apakah Anda yakin ingin menghapus data " + nama + " ?");

        })

        // jika tombol Ya, hapus ditekan, submit form hapus
        $('#formDelete [type="submit"]').click(function() {
            $('#formDelete').submit();
        })
    </script>
@endsection
