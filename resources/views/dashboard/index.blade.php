@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li><a href="#">Dashboard</a></li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#transaction_bread_snack">Penjualan Roti Snack</a></li>
        <li><a data-toggle="tab" href="#dropoff_store_transaction">Penjualan Toko Pengecer</a></li>
        <li><a data-toggle="tab" href="#expense">Pengeluaran</a></li>
        <li><a data-toggle="tab" href="#absence">Absensi Karyawan</a></li>
      </ul>
      <div class="tab-content">
        <div id="transaction_bread_snack" class="tab-pane fade in active">
          <div class="row" style="margin-top: 20px">
            {!! $chartTransaction->render() !!}
          </div>
        </div>
        <div id="dropoff_store_transaction" class="tab-pane fade in">
          <div class="row" style="margin-top: 20px">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  @foreach($dropoffStores as $dropoffStore)
                    <th>{{ $dropoffStore->name }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($dates as $indexData => $date)
                  <tr>
                    <td>{{ date('d - m - Y', strtotime($date)) }}</td>
                    @for($index = 0 ; $index < count($dropoffStores) ; $index++)
                      <td class="text-right">Rp {{ number_format($dataDropoffStores[$index][$indexData],0,',','.') }}</td>
                    @endfor  
                  </tr>
                @endforeach
                <tr>
                  <td class="text-right bold">Grand Total</td>
                  @for($index = 0 ; $index < count($dropoffStores) ; $index++)
                    <td class="text-right bold">Rp {{ number_format(array_sum($dataDropoffStores[$index]),0,',','.') }}</td>
                  @endfor 
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="expense" class="tab-pane fade in">
          <div class="row" style="margin-top: 20px">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2">Tanggal</th>
                  @foreach($car_lists as $car_list)
                    <th colspan="5" class="text-center">{{ $car_list->name }}</th>
                  @endforeach
                </tr>
                <tr>
                  @foreach($car_lists as $car_list)
                    <th>Listrik</th>
                    <th>Bensin</th>
                    <th>Makan</th>
                    <th>Satpam</th>
                    <th>Parkir</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($dates as $indexData => $date)
                <tr>
                  <td>{{ date('d - m - Y', strtotime($date)) }}</td>
                  @foreach($car_lists as $car_list)
                    <?php $flag = 0; ?>
                    @foreach($transactions as $transaction)
                      @if($transaction->date == $date && $transaction->car_id == $car_list->id)
                        <td class="text-right">Rp {{ number_format($transaction->electricity_exp,0,',','.') }}</td>
                        <td class="text-right">Rp {{ number_format($transaction->gasoline_exp,0,',','.') }}</td>
                        <td class="text-right">Rp {{ number_format($transaction->eat_exp,0,',','.') }}</td>
                        <td class="text-right">Rp {{ number_format($transaction->police_exp,0,',','.') }}</td>
                        <td class="text-right">Rp {{ number_format($transaction->park_exp,0,',','.') }}</td>
                        <?php $flag += 1; ?>
                      @endif
                    @endforeach
                    @if($flag == 0)
                      <td class="text-right">Rp {{ number_format(0,0,',','.') }}</td>
                      <td class="text-right">Rp {{ number_format(0,0,',','.') }}</td>
                      <td class="text-right">Rp {{ number_format(0,0,',','.') }}</td>
                      <td class="text-right">Rp {{ number_format(0,0,',','.') }}</td>
                      <td class="text-right">Rp {{ number_format(0,0,',','.') }}</td>
                    @endif  
                  @endforeach 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div id="absence" class="tab-pane fade in">
          <div class="row" style="margin-top: 20px">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  @foreach($worker_lists as $worker_list)
                    <th class="text-center">{{ $worker_list->name }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach($dates as $indexData => $date)
                <tr>
                  <td>{{ date('d - m - Y', strtotime($date)) }}</td>
                  @foreach($worker_lists as $worker_list)
                  <?php $counter = 0; ?>
                    @foreach($transactions as $transaction)
                      @if($transaction->date == $date && ($transaction->worker_id_1 == $worker_list->id || $transaction->worker_id_2 == $worker_list->id))
                        <td class="text-center"><span><i class="fa fa-check"></i></span></td>
                        <?php $counter += 1; ?>
                      @endif
                    @endforeach
                    @if($counter == 0)
                      <td class="text-center"><span><i class="fa fa-minus"></i></span></td>
                    @endif  
                  @endforeach 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection