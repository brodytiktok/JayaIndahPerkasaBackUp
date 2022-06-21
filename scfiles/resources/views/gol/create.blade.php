@extends('layout.index')

@section('title', 'Halaman Karyawan')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Add Golongan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('gol.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="golongan" placeholder="Masukan Golongan">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="penghasilan" class="col-sm-2 col-form-label">Penghasilan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="penghasilan" placeholder="Masukan Penghasilan">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width: 130px">Tambahkan</button>
                <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                        href="{{ url('gol') }}">Batal</a></button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
