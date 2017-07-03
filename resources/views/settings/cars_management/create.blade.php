@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-car"></i> Pengelolaan Mobil</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>Pengaturan</li>
      <li><a href="{{ route('cars-management.index') }}">Pengelolaan Mobil</a></li>
      <li>Tambah Mobil</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title">Formulir Tambah Mobil</h3>
      {{ Form::open(['route' => ['cars-management.store'], 'method'=> 'POST', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) }}
        <div class="card-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nama Mobil</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="name"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nomor Polisi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="police_number"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Lokasi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="location"></input>
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

@section('custom-js')
<script type="text/javascript">$('#cars_table').DataTable();</script>
@endsection