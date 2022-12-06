@extends('service.layout')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h4 class="mt-5">Data Service</h4>
<div class="container d-flex mb-3">
    <a href="{{ route('service.create') }}" type="button" class="btn btn-success rounded-3 me-auto">Tambah Data</a>
    <form class="d-flex" role="search" method="GET" action="{{ route('service.search') }}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
<div class="container mb-3">
    <a href="{{ route('service.trash') }}" type="button" class="btn btn-warning rounded-3">Recent Delete</a>
</div>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>id_service</th>
            <th>Id_konsumen</th>
            <th>Keluhan</th>
            <th>tindakan_service</th>
            <th>jenis_service</th>
            <th>tgl_service</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id_service }}</td>
            <td>{{ $data->id_konsumen }}</td>
            <td>{{ $data->keluhan }}</td>
            <td>{{ $data->tindakan_service }}</td>
            <td>{{ $data->jenis_service }}</td>
            <td>{{ $data->tgl_service }}</td>
            <td>
                <a href="{{ route('service.edit',$data->id_service) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_service }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_service }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('service.hide',$data->id_service) }}">
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