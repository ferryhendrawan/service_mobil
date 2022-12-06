@extends('service.layout')
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
            service</h5>

        <form method="post" action="{{route('service.update', $data->id_service) }}">

            @csrf
            <div class="mb-3">

                <label for="id_service" class="form-label">ID service</label>

                <input type="text" class="form-control" id="id_service" name="id_service" value="{{ $data->id_service}}">
            </div>

            <div class="mb-3">

                <label for="id_konsumen" class="form-label">ID konsumen</label>

                <input type="text" class="form-control" id="id_konsumen" name="id_konsumen" value="{{ $data->id_konsumen}}">
            </div>

            <div class="mb-3">

                <label for="keluhan" class="form-label">keluhan</label>

                <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $data->keluhan}}">
            </div>
            <div class="mb-3">

                <label for="tindakan_service" class="form-label">tindakan_service</label>

                <input type="text" class="form-control" id="tindakan_service" name="tindakan_service" value="{{ $data->tindakan_service}}">
            </div>
            <div class="mb-3">

                <label for="jenis_service" class="form-label">jenis_service</label>

                <input type="text" class="form-control" id="jenis_service" name="jenis_service" value="{{ $data->jenis_service}}">
            </div>
            <div class="mb-3">

                <label for="tgl_service" class="form-label">tgl_service</label>

                <input type="date" class="form-control" id="tgl_service" name="tgl_service" value="{{ $data->tgl_service}}">
            </div>
            <div class="mb-3">

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
        </form>
    </div>
</div>
@stop
