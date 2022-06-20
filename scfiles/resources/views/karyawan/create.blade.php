@extends('layout.index')

@section('title', 'Halaman Karyawan')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Add Karyawan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {{-- tanggal --}}
                        <div class="form-group">
                            <label for="nama_karyawan">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_karyawan"
                                placeholder="Masukan nama lengkap">
                        </div>
                        <!-- /.form-group -->
                        {{-- Golongan --}}
                        <div class="form-group">
                            <label for="gol_id">Golongan</label>
                            <select name="gol_id" class="form-control select2">
                                <option value="">Pilih Golongan</option>
                                @foreach ($gol as $item)
                                    <option value="{{ $item->id }} "> {{ $item->golongan }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        {{-- Tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                placeholder="masukan tanggal lahir">
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                placeholder="masukan tempat lahir">
                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        {{-- Jabatan --}}
                        <div class="form-group">
                            <label for="jabatan_id">Jabatan</label>
                            <select name="jabatan_id" class="form-control select2">
                                <option value="">Pilih Jabatan</option>
                                @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }} "> {{ $item->jabatan }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        {{-- Alamat lengkap --}}
                        <div class="form-group">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat_lengkap"
                                placeholder="masukan alamat lengkap">
                        </div>
                        <!-- /.form-group -->

                        {{-- Nomor Telepon --}}

                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nomor_telepon"
                                placeholder="masukan nomor telepon">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="width: 130px">Tambahkan</button>
        <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                href="{{ url('karyawan') }}">Batal</a></button>
    </div>
    </form>
    </div>
@endsection
