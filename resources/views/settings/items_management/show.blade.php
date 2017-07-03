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
      <li>Tambah Barang</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title text-center">Data Barang</h3>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 text-right">Nama Barang :</div>
            <div class="col-md-6">{{ $item->item_name }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Jenis Barang :</div>
            <div class="col-md-6">{{ $item->category_name }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Kelompok Produksi :</div>
            <div class="col-md-6">{{ $item->production_id == NULL ? 'Tidak ada kelompok' : $item->production_id }}</div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <div class="row col-md-offset-4">
          <div class="col-md-2">
            <a class="btn btn-info" href="{{ route('items-management.edit', $item->id) }}">Edit</a>
          </div>
          <div class="col-md-2">
            {{ Form::open(['route' => ['items-management.destroy', $item->id], 'method'=> 'DELETE', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal', 'id'=>'deleteData']) }}
              <a class="btn btn-danger" href="#" onclick="deleteData()">Hapus</a>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
  function deleteData() {
    swal({
          title: "Yakin Bro?",
          text: "Datanya ilang loh!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Iya, hapus aja!",
          cancelButtonText: "Jangan please!",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            $('#deleteData').submit();
            swal("berhasil dihapus!", "", "success");
          } else {
            swal("Berhasil dibatalkan", "", "error");
          }
        });
  }
</script>
@endsection