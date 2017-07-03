@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-car"></i> Pengelolaan Toko Pengecer</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>Pengaturan</li>
      <li><a href="{{ route('dropoff-stores-management.index') }}">Pengelolaan Toko Pengecer</a></li>
      <li>Edit Toko Pengecer</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title">Formulir Edit Toko Pengecer</h3>
      {{ Form::open(['route' => ['dropoff-stores-management.update', $dropoff_store->id], 'method'=> 'PUT', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) }}
        <div class="card-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nama Toko Pengecer</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="name" value="{{ $dropoff_store->name }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Alamat</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="address" value="{{ $dropoff_store->address }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nomor Handphone</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="handphone_number" value="{{ $dropoff_store->handphone_number }}"></input>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="text-center">
              <button class="btn btn-primary">Selesai</button>
            </div>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection