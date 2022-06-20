@extends('layout.index')

@section('title', 'Halaman Order')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h3 class="card-title">Add Status Order</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('status.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" placeholder="Masukan Status">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" style="width: 130px">Tambahkan</button>
                <button type="submit" class="btn btn-default float-right" style="width: 130px"><a
                        href="{{ url('status') }}">Batal</a></button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
