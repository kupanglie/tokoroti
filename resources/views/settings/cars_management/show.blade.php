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
      <h3 class="card-title text-center">Data Mobil</h3>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 text-right">Nama Mobil :</div>
            <div class="col-md-6">{{ $car->name }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Nomor Polisi :</div>
            <div class="col-md-6">{{ $car->police_number }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Lokasi :</div>
            <div class="col-md-6">{{ $car->location }}</div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <div class="row col-md-offset-4">
          <div class="col-md-2">
            <a class="btn btn-info" href="{{ route('cars-management.edit', $car->id) }}">Edit</a>
          </div>
          <div class="col-md-2">
            {{ Form::open(['route' => ['cars-management.destroy', $car->id], 'method'=> 'DELETE', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal', 'id'=>'deleteCar']) }}
              <a class="btn btn-danger" href="#" onclick="deleteCar()">Hapus</a>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">$('#cars_table').DataTable();</script>
<script type="text/javascript">
  function deleteCar() {
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
            $('#deleteCar').submit();
            swal("berhasil dihapus!", "", "success");
          } else {
            swal("Berhasil dibatalkan", "", "error");
          }
        });
  }
</script>
@endsection