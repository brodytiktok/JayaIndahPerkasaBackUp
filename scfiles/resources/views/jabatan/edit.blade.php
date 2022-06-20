@extends('layout.index')

@section('title', 'Halaman Jabatan')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">

        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('jabatan.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan"
                            value="{{ old('jabatan') ?? $jabatan->jabatan }}">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width: 130px">Tambahkan</button>
                <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                        href="{{ url('jabatan') }}">Batal</a></button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
