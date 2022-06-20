@extends('layout.index')

@section('title', 'Halaman Karyawan')

@section('content')
    <div class="card">
        <div class="m-2 p-2">
            <a href="{{ url('karyawan') }}" class="btn btn-sm btn-primary"><i class="bi bi-arrow-left-square"></i></a>
        </div>

        <div class="card-header">
            <h3 class="card-title">Informasi <span class="text-bold"
                    style="text-decoration: underline;">{{ $karyawan->nama_lengkap }}</span>
            </h3>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="d-flex justify-content-center">
                    <img class="card-img-top" src="{{ asset('storage/' . $karyawan->foto) }}" alt="Card image cap"
                        style="height:150px; width:150px;">

                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $karyawan->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $karyawan->jabatan->jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $karyawan->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $karyawan->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $karyawan->alamat_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $karyawan->nomor_telepon }}</td>
                    </tr>

                </thead>



            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


@endsection
