@extends('konsumen.layout')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h4 class="mt-5">Data Konsumen</h4>
<div class="container d-flex mb-3">
    <a href="{{ route('konsumen.create') }}" type="button" class="btn btn-success rounded-3 me-auto">Tambah Data</a>
    <form class="d-flex" role="search" method="GET" action="{{ route('konsumen.search') }}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
<div class="container mb-3">
    <a href="{{ route('konsumen.trash') }}" type="button" class="btn btn-warning rounded-3">Recent Delete</a>
</div>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Id_konsumen</th>
            <th>Keluhan</th>
            <th>Nama_Konsumen</th>
            <th>Jenis_Kelamin</th>
            <th>Jenis_Mobil</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id_konsumen }}</td>
            <td>{{ $data->keluhan }}</td>
            <td>{{ $data->nama_konsumen }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->jenis_mobil }}</td>
            <td>{{ $data->Alamat }}</td>
            <td>
                <a href="{{ route('konsumen.edit',$data->id_konsumen) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_konsumen }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_konsumen }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('konsumen.hide',$data->id_konsumen) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop