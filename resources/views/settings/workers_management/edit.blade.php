@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-car"></i> Pengelolaan Karyawan</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>Pengaturan</li>
      <li><a href="{{ route('items-management.index') }}">Pengelolaan Karyawan</a></li>
      <li>Edit Karyawan</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title">Formulir Edit Karyawan</h3>
      {{ Form::open(['route' => ['workers-management.update', $worker->id], 'method'=> 'PUT', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) }}
        <div class="card-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nama Karyawan</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="name" value="{{ $worker->name }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Jenis Pekerjaan</label>
            <div class="col-md-8">
            <select class="form-control" name="job_id">
                <option value="1" {{ $worker->job_id == 1 ? 'selected' : '' }}>Karyawan</option>
                <option value="2" {{ $worker->job_id == 2 ? 'selected' : '' }}>Supir</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nomor Handphone</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="handphone_number" value="{{ $worker->handphone_number }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Foto Pribadi</label>
            <div class="col-md-8">
              <input type="file" accept="image/*" class="form-control" name="personal_photo"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Foto KTP</label>
            <div class="col-md-8">
              <input type="file" accept="image/*" class="form-control" name="identity_photo"></input>
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