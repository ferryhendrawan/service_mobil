@extends('pembayaran.layout')
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
            pembayaran</h5>

        <form method="post" action="{{route('pembayaran.update', $data->id_bayar) }}">

            @csrf
            <div class="mb-3">

                <label for="id_bayar" class="form-label">ID pembayaran</label>

                <input type="text" class="form-control" id="id_bayar" name="id_bayar" value="{{ $data->id_bayar}}">
            </div>

            <div class="mb-3">


                <label for="id_service" class="form-label">id_service</label>

                <input type="text" class="form-control" id="id_service" name="id_service" value="{{ $data->id_service}}">
            </div>
            <div class="mb-3">

                <label for="id_sparepart" class="form-label">id_sparepart</label>

                <input type="text" class="form-control" id="id_sparepart" name="id_sparepart" value="{{ $data->id_sparepart}}">
            </div>
            <div class="mb-3">

                <label for="tgl_bayar" class="form-label">tgl_bayar</label>

                <input type="text" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{ $data->tgl_bayar}}">
            </div>
            <div class="mb-3">

                <label for="total_bayar" class="form-label">total_bayar</label>

                <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="{{ $data->total_bayar}}">
            </div>
            <div class="mb-3">

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
        </form>
    </div>
</div>
@stop
