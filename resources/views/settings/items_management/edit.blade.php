@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-car"></i> Pengelolaan Barang</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li>Pengaturan</li>
      <li><a href="{{ route('items-management.index') }}">Pengelolaan Barang</a></li>
      <li>Edit Barang</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title">Formulir Edit Barang</h3>
      {{ Form::open(['route' => ['items-management.update', $item->id], 'method'=> 'PUT', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) }}
        <div class="card-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nama Barang</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="name" value="{{ $item->name }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Jenis Barang</label>
            <div class="col-md-8">
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach 
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Kelompok Produksi</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="production_id" value="{{ $item->production_id }}"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Harga</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="price" value="{{ $item->price }}"></input>
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