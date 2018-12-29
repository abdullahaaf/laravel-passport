@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Mahasiswa</div>

                <div class="card-body">
                    <ul>
                        @foreach($errors->all() as $key => $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @if(session('report'))
                        <div class="alert alert-success" role="alert">
                            {{ session('report') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('home.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group" style="width: 100%">
                            <label class="control-label col-md-4">Nama Mahasiswa</label>
                            <div class="col-md-8" style="width: 100%;">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="{{ old('nama') }}" required>
                            </div>
                        </div>
                        <div class="form-group" style="width: 100%">
                            <label class="control-label col-md-4">Jurusan</label>
                            <div class="col-md-8" style="width: 100%;">
                                <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}" required>
                            </div>
                        </div>
                        <div class="form-group" style="width: 100%">
                            <label class="control-label col-md-4">Alamat</label>
                            <div class="col-md-8" style="width: 100%;">
                                <textarea class="form-control" name="alamat" required>{{ old('alamat') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group" style="width: 100%">
                            <label class="control-label col-md-4">Nomor Telepon</label>
                            <div class="col-md-8" style="width: 100%;">
                                <input type="number" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}" maxlength="12" required>
                            </div>
                        </div>
                        <div class="form-group" style="width: 100%; margin-left: 15px;">
                            <input type="submit" name="" value="Simpan" class="btn btn-flat btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection