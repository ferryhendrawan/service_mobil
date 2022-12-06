@extends('konsumen.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data
            konsumen</h5>

        <form method="post" action="{{route('konsumen.update', $data->id_konsumen) }}">

            @csrf
            <div class="mb-3">

                <label for="id_konsumen" class="form-label">ID konsumen</label>

                <input type="text" class="form-control" id="id_konsumen" name="id_konsumen" value="{{ $data->id_konsumen}}">
            </div>

            <div class="mb-3">


                <label for="keluhan" class="form-label">keluhan</label>

                <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $data->keluhan}}">
            </div>
            <div class="mb-3">

                <label for="nama_konsumen" class="form-label">nama_konsumen</label>

                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $data->nama_konsumen}}">
            </div>
            <div class="mb-3">

                <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>

                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $data->jenis_kelamin}}">
            </div>
            <div class="mb-3">

                <label for="jenis_mobil" class="form-label">jenis_mobil</label>

                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil" value="{{ $data->jenis_mobil}}">
            </div>
            <div class="mb-3">

                <label for="Alamat" class="form-label">Alamat</label>

                <input type="text" class="form-control" id="Alamat" name="Alamat" value="{{ $data->Alamat}}">
            </div>
            <div class="mb-3">

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
        </form>
    </div>
</div>
@stop
