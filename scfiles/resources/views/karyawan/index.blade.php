@extends('layout.index')

@section('title', 'Halaman Karyawan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Personal Karyawan</h3>
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
            <table id="example2" class="table table-bordered table-hover">
                <a href="{{ url('karyawan/create') }}" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th>Tempat Lahir</th>
                        <th>Alamat Lengkap</th>
                        <th>Nomor Telepon</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $data)
                        <tr>
                            <td><img src="{{ asset('storage/' . $data->foto) }}" width="40px" height="50px"></td>
                            <td><a href="{{ url('karyawan/' . $data->id) }}"> {{ $data->nama_karyawan }}</a></td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->tempat_lahir }}</td>

                            <td>{{ $data->alamat_lengkap }}</td>
                            <td>{{ $data->nomor_telepon }}</td>
                            <td>
                                <a href="{{ url('karyawan/' . $data->id) . '/edit' }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $data->id }}"
                                    data-nama="{{ $data->nama_lengkap }}" data-toggle="modal"
                                    data-target="#deleteModal"><i class="bi bi-x-circle-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gaji Karyawan</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Penghasilan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $data)
                        <tr>
                            <td><a href="{{ url('karyawan/' . $data->id) }}"> {{ $data->nama_karyawan }}</a></td>
                            <td>{{ $data->jabatan->jabatan }}</td>
                            <td>{{ $data->gol->golongan }}</td>
                            <td>{{ $data->gol->penghasilan }}</td>
                            <td>
                                <a href="{{ url('karyawan/' . $data->id) . '/edit' }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        // jika tombol hapus ditekan, generate alamat URL untuk proses hapus
        // id disini adalah id prodi
        $('.btn-hapus').click(function() {
            let id = $(this).attr('data-id');
            $('#formDelete').attr('action', '/karyawan/' + id);

            let nama = $(this).attr('data-nama');
            $('#mb-konfirmasi').text("Apakah Anda yakin ingin menghapus data " + nama + " ?");

        })

        // jika tombol Ya, hapus ditekan, submit form hapus
        $('#formDelete [type="submit"]').click(function() {
            $('#formDelete').submit();
        })
    </script>
@endsection
