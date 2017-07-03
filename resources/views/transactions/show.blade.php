@extends('layouts.apps')

@section('title')
Toko Roti
@endsection

@section('content')
<div class="page-title">
  <div>
    <h1><i class="fa fa-money"></i> Transaksi</h1>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li><a href="{{ route('transactions.index') }}">Transaksi</a></li>
      <li>Detail Transaksi</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-12">
    <div class="card">
      <h3 class="card-title">Detail Transaksi</h3>
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#base_data">Informasi Awal</a></li>
          <li><a data-toggle="tab" href="#bread_transaction">Transaksi Roti</a></li>
          <li><a data-toggle="tab" href="#snack_transaction">Transaksi Snack</a></li>
        </ul>
        <div class="tab-content">
          <div id="base_data" class="tab-pane fade in active">
            <div class="row" style="margin-top: 15px">
              <div class="col-md-12">
                <table class="table table-bordered" style="margin-bottom: 0">
                  <tr>
                    <td style="width: 20%">Tanggal</td>
                    <td>{{ date('d - m - Y', strtotime($transaction->date)) }}</td>
                  </tr>
                  <tr>
                    <td>Nama Mobil</td>
                    <td>{{ $transaction->car_name }}</td>
                  </tr>
                  <tr>
                    <td>Nama Karyawan 1</td>
                    <td>
                      @foreach($workers as $worker)
                        {{ $transaction->worker_id_1 == $worker->id ? $worker->name : '' }}
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Karyawan 2</td>
                    <td>
                      @foreach($workers as $worker)
                        {{ $transaction->worker_id_2 == $worker->id ? $worker->name : '' }}
                      @endforeach
                    </td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <?php $profit = 0; ?>
                  <tr>
                    <td class="text-right">Roti</td>
                    <td class="text-right" id="grand_total_bread" style="width: 15%"></td>
                  </tr>
                  <tr>
                    <td class="text-right">Cemilan</td>
                    <td class="text-right" id="grand_total_snack" style="width: 15%"></td>
                  </tr>
                  <tr>
                    <td class="text-right">{{ $dropoffStoreTransaction->name }}</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($dropoffStoreTransaction->price,0,',','.') }}</td>
                    <?php $profit = $profit + $dropoffStoreTransaction->price; ?>
                  </tr>
                  <tr>
                    <td class="text-right">Biaya Listrik</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($transaction->electricity_exp,0,',','.') }}</td>
                    <?php $profit = $profit - $transaction->electricity_exp; ?>
                  </tr>
                  <tr>
                    <td class="text-right">Biaya Bensin</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($transaction->gasoline_exp,0,',','.') }}</td>
                    <?php $profit = $profit - $transaction->gasoline_exp; ?>
                  </tr>
                  <tr>
                    <td class="text-right">Biaya Makan</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($transaction->eat_exp,0,',','.') }}</td>
                    <?php $profit = $profit - $transaction->eat_exp; ?>
                  </tr>
                  <tr>
                    <td class="text-right">Biaya Satpam</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($transaction->police_exp,0,',','.') }}</td>
                    <?php $profit = $profit - $transaction->police_exp; ?>
                  </tr>
                  <tr>
                    <td class="text-right">Biaya Parkir</td>
                    <td class="text-right" style="width: 15%">Rp {{ number_format($transaction->park_exp,0,',','.') }}</td>
                    <?php $profit = $profit - $transaction->park_exp; ?>
                  </tr>
                  <tr>
                    <td class="text-right bold">Grand Total</td>
                    <td class="text-right bold" id="profit" style="width: 15%"></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div id="bread_transaction" class="tab-pane fade in">
            <?php $grand_total_bread_price = 0; ?>
            <div class="row" style="margin-top: 15px">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <td rowspan="2" class="center bold" style="width: 10%">Nama Roti</td>
                    <td colspan="2" class="center bold">Awal</td>
                    <td rowspan="2" class="center bold" style="width: 12%">Tambah</td>
                    <td rowspan="2" class="center bold" style="width: 12%">Kurang</td>
                    <td colspan="2" class="center bold">Kembali</td>
                    <td rowspan="2" class="center bold" style="width: 7%">Terjual</td>
                    <td rowspan="2" class="center bold" style="width: 8%">Harga</td>
                    <td rowspan="2" class="center bold" style="width: 10%">Jumlah</td>
                  </tr>  
                  <tr>
                    <td class="center bold" style="width: 7%">Lama</td>
                    <td class="center bold" style="width: 7%">Baru</td>
                    <td class="center bold" style="width: 7%">Lama</td>
                    <td class="center bold" style="width: 7%">Baru</td>
                  </tr>
                  @foreach($breadTransactions as $index=>$breadTransaction)
                  <?php 
                  $total_bread_sold = 0;
                  $total_bread_price = 0;
                  ?>
                  <tr>
                    <td class="center">
                      {{ $breadTransaction->name }}
                    </td>
                    <td>
                      <input type="text" class="form-control" id="bring_old_bread_{{ $index }}" value="{{ $breadTransaction->bring_old_qty }}" readonly></input>
                      <?php $total_bread_sold = $total_bread_sold + $breadTransaction->bring_old_qty ?>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="bring_new_bread_{{ $index }}" value="{{ $breadTransaction->bring_new_qty }}" readonly></input>
                      <?php $total_bread_sold = $total_bread_sold + $breadTransaction->bring_new_qty ?>
                    </td>
                    <td>
                      <div id="add_bread_{{ $index }}">
                        @foreach($breadInformations as $index2=>$breadInformation)
                        @if($breadInformation->bread_transaction_id == $breadTransaction->bread_transaction_id && $breadInformation->status_item == 1)
                        <div class="input-group add_bread_{{ $index }}" style="margin-bottom: 3px">
                          <input type="text" class="form-control" id="add_breads_{{ $index }}" value="{{ $breadInformation->qty }}" readonly></input>
                          <?php $total_bread_sold = $total_bread_sold + $breadInformation->qty ?>
                          <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddBread{{ $breadInformation->id }}"><i class="fa fa-comment"></i></button></span>
                        </div>
                        <div id="modalInfoAddBread{{ $breadInformation->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <textarea class="form-control" readonly>{{ $breadInformation->information }}</textarea>
                              </div>
                              <div class="modal-footer center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </td>
                    <td>
                      <div id="loss_bread_{{ $index }}">
                        @foreach($breadInformations as $index2=>$breadInformation)
                        @if($breadInformation->bread_transaction_id == $breadTransaction->bread_transaction_id && $breadInformation->status_item == 2)
                        <div class="input-group loss_bread_{{ $index }}" style="margin-bottom: 3px">
                          <input type="text" class="form-control" id="loss_breads_{{ $index }}" value="{{ $breadInformation->qty }}" readonly></input>
                          <?php $total_bread_sold = $total_bread_sold - $breadInformation->qty ?>
                          <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossBread{{ $breadInformation->id }}"><i class="fa fa-comment"></i></button></span>
                        </div>
                        <div id="modalInfoLossBread{{ $breadInformation->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <textarea class="form-control" readonly>{{ $breadInformation->information }}</textarea>
                              </div>
                              <div class="modal-footer center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="return_old_bread_{{ $index }}" value="{{ $breadTransaction->remain_old_qty }}" readonly></input>
                      <?php $total_bread_sold = $total_bread_sold - $breadTransaction->remain_old_qty ?>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="return_new_bread_{{ $index }}" value="{{ $breadTransaction->remain_old_qty }}" readonly></input>
                      <?php $total_bread_sold = $total_bread_sold - $breadTransaction->remain_new_qty ?>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="sold_bread_{{ $index }}" value="{{ $total_bread_sold }}" readonly></input>
                    </td>
                    <td>
                      <input type="text" class="form-control money text-right" id="bread_price_{{ $index }}" value="{{ $breadTransaction->price }}" readonly></input>
                    </td>
                    <?php $total_bread_price = $total_bread_sold * $breadTransaction->price ?>
                    <td>
                      <input type="text" class="form-control money text-right" data="bread_total_price" id="bread_total_price_{{ $index }}" value="{{ $total_bread_price }}" readonly></input>
                    </td>
                  </tr>
                  <?php $grand_total_bread_price = $grand_total_bread_price + $total_bread_price ?>
                  @endforeach
                  <tr>
                    <td colspan="9" class="text-right" style="vertical-align: middle"> Grand Total</td>
                    <td>
                      <input type="text" class="form-control text-right" id="grand_total_bread_price" value="{{ $grand_total_bread_price }}" readonly></input>
                      <?php $profit = $profit + $grand_total_bread_price; ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div id="snack_transaction" class="tab-pane fade in">
            <?php $grand_total_snack_price = 0; ?>
            <div class="row" style="margin-top: 15px">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <td class="center bold" style="width: 20%">Nama Snack</td>
                    <td class="center bold" style="width: 10%">Stok</td>
                    <td class="center bold" style="width: 12%">Tambah</td>
                    <td class="center bold" style="width: 12%">Kurang</td>
                    <td class="center bold" style="width: 12%">Kembali</td>
                    <td class="center bold" style="width: 10%">Terjual</td>
                    <td class="center bold" style="width: 10%">Harga</td>
                    <td class="center bold" style="width: 14%">Jumlah</td>
                  </tr>  
                  @foreach($snackTransactions as $index=>$snackTransaction)
                  <?php 
                  $total_snack_sold = 0;
                  $total_snack_price = 0;
                  ?>
                  <tr>
                    <td class="center">
                      {{ $snackTransaction->name }}
                    </td>
                    <td>
                      <input type="text" class="form-control" id="bring_snack_{{ $index }}" value="{{ $snackTransaction->bring_qty }}" readonly></input>
                      <?php $total_snack_sold = $total_snack_sold + $snackTransaction->bring_qty ?>
                    </td>
                    <td>
                      <div id="add_snack_{{ $index }}">
                        @foreach($snackInformations as $index2=>$snackInformation)
                        @if($snackInformation->snack_transaction_id == $snackTransaction->snack_transaction_id && $snackInformation->status_item == 1)
                        <div class="input-group add_snack_{{ $index }}" style="margin-bottom: 3px">
                          <input type="text" class="form-control" id="add_snacks_{{ $index }}" value="{{ $snackInformation->qty }}" readonly></input>
                          <?php $total_snack_sold = $total_snack_sold + $snackInformation->qty ?>
                          <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddSnack{{ $snackInformation->id }}"><i class="fa fa-comment"></i></button></span>
                        </div>
                        <div id="modalInfoAddSnack{{ $snackInformation->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <textarea class="form-control" readonly>{{ $snackInformation->information }}</textarea>
                              </div>
                              <div class="modal-footer center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </td>
                    <td>
                      <div id="loss_snack_{{ $index }}">
                        @foreach($snackInformations as $index2=>$snackInformation)
                        @if($snackInformation->snack_transaction_id == $snackTransaction->snack_transaction_id && $snackInformation->status_item == 2)
                        <div class="input-group loss_snack_{{ $index }}" style="margin-bottom: 3px">
                          <input type="text" class="form-control" id="loss_snacks_{{ $index }}" value="{{ $snackInformation->qty }}" readonly></input>
                          <?php $total_snack_sold = $total_snack_sold - $snackInformation->qty ?>
                          <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossSnack{{ $snackInformation->id }}"><i class="fa fa-comment"></i></button></span>
                        </div>
                        <div id="modalInfoLossSnack{{ $snackInformation->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <textarea class="form-control" readonly>{{ $snackInformation->information }}</textarea>
                              </div>
                              <div class="modal-footer center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="return_snack_{{ $index }}" value="{{ $snackTransaction->remain_qty }}" readonly></input>
                      <?php $total_snack_sold = $total_snack_sold - $snackTransaction->remain_qty ?>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="sold_snack_{{ $index }}" value="{{ $total_snack_sold }}" readonly></input>
                    </td>
                    <td>
                      <input type="text" class="form-control money text-right" id="snack_price_{{ $index }}" value="{{ $snackTransaction->price }}" readonly></input>
                    </td>
                    <?php $total_snack_price = $total_snack_sold * $snackTransaction->price ?>
                    <td>
                      <input type="text" class="form-control money text-right" data="snack_total_price" id="snack_total_price_{{ $index }}" value="{{ $total_snack_price }}" readonly></input>
                    </td>
                  </tr>
                  <?php $grand_total_snack_price = $grand_total_snack_price + $total_snack_price ?>
                  @endforeach
                  <tr>
                    <td colspan="7" class="text-right" style="vertical-align: middle"> Grand Total</td>
                    <td>
                      <input type="text" class="form-control text-right" id="grand_total_snack_price" value="{{ $grand_total_snack_price }}" readonly></input>
                      <?php $profit = $profit + $grand_total_snack_price; ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row col-md-offset-5">
          <div class="col-md-2">
            <a class="btn btn-info" href="{{ route('transactions.edit', $transaction->transaction_id) }}">Edit</a>
          </div>
          <div class="col-md-2">
            {{ Form::open(['route' => ['transactions.destroy', $transaction->transaction_id], 'method'=> 'DELETE', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal', 'id'=>'deleteData']) }}
            <a class="btn btn-danger" href="#" onclick="deleteData()">Hapus</a>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
    <div id="modal"></div>
  </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">$('#cars_table').DataTable();</script>
<script>
  $(document).ready(function() {
    $('#grand_total_bread').text("Rp {{ number_format($grand_total_bread_price,0,',','.') }}");
    $('#grand_total_snack').text("Rp {{ number_format($grand_total_snack_price,0,',','.') }}");
    $('#profit').text("Rp {{ number_format($profit,0,',','.') }}");
  });

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