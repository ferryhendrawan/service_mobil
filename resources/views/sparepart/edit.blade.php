@extends('sparepart.layout')
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
            sparepart</h5>

        <form method="post" action="{{route('sparepart.update', $data->id_sparepart) }}">

            @csrf
            <div class="mb-3">

                <label for="id_sparepart" class="form-label">ID sparepart</label>

                <input type="text" class="form-control" id="id_sparepart" name="id_sparepart" value="{{ $data->id_sparepart}}">
            </div>

            <div class="mb-3">


                <label for="name_sparepart" class="form-label">nama sparepart</label>

                <input type="text" class="form-control" id="name_sparepart" name="name_sparepart" value="{{ $data->name_sparepart}}">
            </div>
            <div class="mb-3">

                <label for="Qty" class="form-label">Qty</label>

                <input type="text" class="form-control" id="Qty" name="Qty" value="{{ $data->Qty}}">
            </div>
            <div class="mb-3">

                <label for="harga_sparepart" class="form-label">harga_sparepart</label>

                <input type="text" class="form-control" id="harga_sparepart" name="harga_sparepart" value="{{ $data->harga_sparepart}}">
            </div>
            <div class="mb-3">

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Ubah" />
                </div>
        </form>
    </div>
</div>
@stop
