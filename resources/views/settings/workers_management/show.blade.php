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
      <li><a href="{{ route('workers-management.index') }}">Pengelolaan Karyawan</a></li>
      <li>Tambah Karyawan</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-offset-2 col-md-8">
    <div class="card">
      <h3 class="card-title text-center">Data Karyawan</h3>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 text-right">Nama Karyawan :</div>
            <div class="col-md-6">{{ $worker->name }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Jenis Pekerjaan :</div>
            <div class="col-md-6">{{ $worker->job_id == 1 ? 'Karyawan' : 'Supir' }}</div>
          </div>
          <div class="col-md-12">
            <div class="col-md-6 text-right">Nomor Handphone :</div>
            <div class="col-md-6">{{ $worker->handphone_number }}</div>
          </div>
          <div class="col-md-12" style="margin-top: 10px">
            <div class="col-md-6 text-right">
              <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalPersonalPhoto">Foto Pribadi</button>
            </div>
            <div class="col-md-6">
               <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalPersonalIdentityPhoto">Foto KTP</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <div class="row col-md-offset-4">
          <div class="col-md-2">
            <a class="btn btn-info" href="{{ route('workers-management.edit', $worker->id) }}">Edit</a>
          </div>
          <div class="col-md-2">
            {{ Form::open(['route' => ['workers-management.destroy', $worker->id], 'method'=> 'DELETE', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal', 'id'=>'deleteData']) }}
              <a class="btn btn-danger" href="#" onclick="deleteData()">Hapus</a>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modalPersonalPhoto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Foto Pribadi</h4>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset($worker->path_personal_photo) }}" style="max-width: 50%; max-height: 50%">
      </div>
    </div>
  </div>
</div>
<div id="modalPersonalIdentityPhoto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Foto KTP</h4>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset($worker->path_identity_photo) }}" style="max-width: 50%; max-height: 50%">
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