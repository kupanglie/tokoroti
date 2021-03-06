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
      <li><a href="#">Pengaturan</a></li>
      <li><a href="#">Pengelolaan Barang</a></li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-12" style="margin-bottom: 10px">
    <a href="{{ route('items-management.create') }}" class="btn btn-primary icon-btn">
      <i class="fa fa-plus"></i> Tambah Barang
    </a>
  </div>
  <div class="col col-md-12">
    <div class="card">
      <h3 class="card-title">Daftar Barang</h3>
      <div class="card-body">
        <table class="table table-hover table-bordered" id="data_table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jenis Barang</th>
              <th>Harga</th>
              <th width="5%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <td>{{ $item->item_name }}</td>
              <td>{{ $item->category_name }}</td>
              <td>{{ $item->price }}</td>
              <td class="text-center">
                <a class="btn-info btn-sm" href="{{ route('items-management.show', $item->id) }}"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('custom-js')
  <script type="text/javascript">$('#data_table').DataTable();</script>
@endsection