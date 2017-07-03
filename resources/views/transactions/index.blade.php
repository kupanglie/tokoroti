@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-money"></i> Daftar Transaksi</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li><a href="#">Transaksi</a></li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-12" style="margin-bottom: 10px">
    <a href="{{ route('transactions.create') }}" class="btn btn-primary icon-btn">
      <i class="fa fa-plus"></i> Tambah Transaksi
    </a>
  </div>
  <div class="col col-md-12">
    <div class="card">
      <h3 class="card-title">Daftar Transaksi</h3>
      <div class="card-body">
        <table class="table table-hover table-bordered" id="data_table">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama Mobil</th>
              <th>Nama karyawan 1</th>
              <th>Nama Karyawan 2</th>
              <th>Lokasi</th>
              <th width="5%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $transaction)
            <tr>
              <td>{{ date('d - m - Y', strtotime($transaction->date)) }}</td>
              <td>{{ $transaction->car_name }}</td>
              <td>
              @foreach($workers as $worker)
                {{ $transaction->worker_id_1 == $worker->id ? $worker->name : '' }}
              @endforeach
              </td>
              <td>
              @foreach($workers as $worker)
                {{ $transaction->worker_id_2 == $worker->id ? $worker->name : '' }}
              @endforeach
              </td>
              <td>{{ $transaction->location }}</td>
              <td class="text-center">
                <a class="btn-info btn-sm" href="{{ route('transactions.show', $transaction->transaction_id) }}"><i class="fa fa-eye"></i></a>
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