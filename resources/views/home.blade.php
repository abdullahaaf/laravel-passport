@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('home.create') }}" class="btn btn-primary btn-flat pull-right">Tambah Data</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jurusan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Nomor Telepon</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bunch_of_mahasiswa as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->jurusan }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->nomor_telepon }}</td>
                                    <td>
                                        <a href="{{ route('home.edit', $value->id) }}" class="btn btn-warning btn-flat btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-flat btn-sm" onclick="deleteConfirm('delete-form{{ $value->id }}')">Hapus</a>
                                        <form id="delete-form{{ $value->id }}" action="{{ route('home.destroy', $value->id) }}" method="post" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteConfirm(idForm)
    {
        var conf = confirm('Anda yakin untuk menghapus data?');
        if(conf){
            document.getElementById(idForm).submit();
        }
    }
</script>
@endsection
