@extends('layout.index')

@section('title', 'Halaman Karyawan')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Add Karyawan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('karyawan.update', ['karyawan' => $karyawan->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control"
                        value="{{ old('foto') ?? $karyawan->foto }}">
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
                                placeholder="Masukan nama lengkap"
                                value="{{ old('nama_karyawan') ?? $karyawan->nama_karyawan }}">
                        </div>
                        <!-- /.form-group -->
                        {{-- Golongan --}}
                        <div class="form-group">
                            <label for="gol_id">Golongan</label>
                            <select name="gol_id" class="form-control select2">
                                <option value="">Pilih Golongan</option>
                                @foreach ($gol as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $karyawan->gol_id ? 'selected' : null }}>
                                        {{ $item->golongan }} </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Tanggal Lahir --}}
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                placeholder="masukan tanggal lahir"
                                value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}">
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                placeholder="masukan tempat lahir"
                                value="{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}">
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
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $karyawan->jabatan_id ? 'selected' : null }}>
                                        {{ $item->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        {{-- Alamat lengkap --}}
                        <div class="form-group">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat_lengkap"
                                placeholder="masukan alamat lengkap"
                                value="{{ old('alamat_lengkap') ?? $karyawan->alamat_lengkap }}">
                        </div>
                        <!-- /.form-group -->

                        {{-- Nomor Telepon --}}

                        <div class="form-group">
                            <label for="nomor telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" name="nomor telepon"
                                placeholder="masukan nomor telepon"
                                value="{{ old('nomor_telepon') ?? $karyawan->nomor_telepon }}">>
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
        <button type="submit" class="btn btn-primary" style="width: 130px">Ubah</button>
        <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                href="{{ url('karyawan') }}">Batal</a></button>
    </div>
    </form>
    </div>
@endsection
