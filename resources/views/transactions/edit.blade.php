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
      <li>Edit Transaksi</li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col col-md-12">
    <div class="card">
      <h3 class="card-title">Formulir Edit Transaksi</h3>
      {{ Form::open(['route' => ['transactions.update', $transaction->id], 'method'=> 'PUT', 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) }}
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
                <div class="col-md-2 text-right">
                  <label class="control-label">Tanggal</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control" id="transaction_date" type="text" name="transaction_date" value="{{ date('d-m-Y', strtotime($transaction->date)) }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Nama Mobil</label>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="car_id">
                    @foreach($cars as $car)
                      <option value="{{ $car->id }}" {{ $transaction->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Nama Supir</label>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="worker_id_1">
                    @foreach($workers as $worker)
                      @if($worker->job_id == 2)
                        <option value="{{ $worker->id }}" {{ $transaction->worker_id_1 == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                      @endif 
                    @endforeach 
                  </select>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Nama Karyawan 2</label>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="worker_id_2">
                    @foreach($workers as $worker)
                      @if($worker->job_id == 1)
                        <option value="{{ $worker->id }}" {{ $transaction->worker_id_2 == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                      @endif
                    @endforeach 
                  </select>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Nama Toko Pengecer</label>
                </div>
                <div class="col-md-6">
                  <select class="form-control" name="dropoff_store_id">
                    @foreach($dropoffStores as $dropoffStore)
                      <option value="{{ $dropoffStore->id }}" {{ $dropoffstore_transaction->id == $dropoffStore->id ? 'selected' : '' }}>{{ $dropoffStore->name }}</option>
                    @endforeach 
                  </select>
                </div>
                <div class="col-md-4">
                  <input class="form-control money" name="dropoff_store_price" type="text" value="{{ $dropoffstore_transaction->price }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Biaya Listrik</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control money" type="text" name="electricity_exp" value="{{ $transaction->electricity_exp }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Biaya Bensin</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control money" type="text" name="gasoline_exp" value="{{ $transaction->gasoline_exp }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Biaya Makan</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control money" type="text" name="eat_exp" value="{{ $transaction->eat_exp }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Biaya Satpam</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control money" type="text" name="police_exp" value="{{ $transaction->police_exp }}"></input>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <div class="col-md-2 text-right">
                  <label class="control-label">Biaya Parkir</label>
                </div>
                <div class="col-md-10">
                  <input class="form-control money" type="text" name="park_exp" value="{{ $transaction->park_exp }}"></input>
                </div>
              </div>
            </div>
          </div>
          <div id="bread_transaction" class="tab-pane fade">
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
              <?php $flag_bread = 1; $flag_snack = 1; ?>
              @foreach($bread_transactions as $index=>$bread_transaction)
                <input type="hidden" name="bread_transaction_id[]" value="{{ $bread_transaction->bread_transaction_id }}">
                <tr>
                  <td class="center">
                    <input type="hidden" name="bread_id[{{ $index }}]" value="{{ $bread_transaction->item_id }}">
                    {{ $bread_transaction->name }}
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bring_old_bread[{{ $index }}]" id="bring_old_bread_{{ $index }}" value="{{ $bread_transaction->bring_old_qty }}" onchange="calcBreadSold({{ $index }})"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bring_new_bread[{{ $index }}]" id="bring_new_bread_{{ $index }}" value="{{ $bread_transaction->bring_new_qty }}" onchange="calcBreadSold({{ $index }})"></input>
                  </td>
                  <td>
                    <div id="add_bread_{{ $index }}">
                      @foreach($bread_informations as $bread_information)
                        @if($bread_information->bread_transaction_id == $bread_transaction->bread_transaction_id && $bread_information->status_item == 1)
                          <?php $flag_bread += 1 ?>
                          <div class="input-group add_bread_{{ $index }}" style="margin-bottom: 3px">
                            <input type="text" class="form-control" id="add_breads_{{ $index }}" onchange="calcBreadSold({{ $index }})" value="{{ $bread_information->qty }}" name="add_bread[{{ $index }}][]"></input>
                            <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddBread{{ $flag_bread }}"><i class="fa fa-comment"></i></button></span>
                          </div>
                          <div id="modalInfoAddBread{{ $flag_bread }}" class="modal fade modal_add_bread_{{ $index }}" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <textarea class="form-control" name="add_bread_information[{{ $index }}][]">{{ $bread_information->information }}</textarea>
                                </div>
                                <div class="modal-footer center">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach 
                    </div>
                    <div style="text-align: center">
                      <span class="btn btn-primary" style="margin-top: 5px" onclick="appendAddBread({{ $index }})"><i class="fa fa-plus"></i></span>
                      <span class="btn btn-danger" style="margin-top: 5px" onclick="removeAddBread({{ $index }}); calcBreadSold({{ $index }})"><i class="fa fa-minus"></i></span>
                    </div>
                  </td>
                  <td>
                    <div id="loss_bread_{{ $index }}">
                      @foreach($bread_informations as $bread_information)
                        @if($bread_information->bread_transaction_id == $bread_transaction->bread_transaction_id && $bread_information->status_item == 2)
                          <?php $flag_bread += 1 ?>
                          <div class="input-group loss_bread_{{ $index }}" style="margin-bottom: 3px">
                            <input type="text" class="form-control" value="{{ $bread_information->qty }}" id="loss_breads_{{ $index }}" onchange="calcBreadSold({{ $index }})" name="loss_bread[{{ $index }}][]"></input>
                            <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossBread{{ $flag_bread }}"><i class="fa fa-comment"></i></button></span>
                          </div>
                          <div id="modalInfoLossBread{{ $flag_bread }}" class="modal fade  modal_loss_bread_{{ $index }}" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <textarea class="form-control" name="loss_bread_information[{{ $index }}][]">{{ $bread_information->information }}</textarea>
                                </div>
                                <div class="modal-footer center">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach 
                    </div>
                    <div style="text-align: center">
                      <span class="btn btn-primary" style="margin-top: 5px" onclick="appendLossBread({{ $index }})"><i class="fa fa-plus"></i></span>
                      <span class="btn btn-danger" style="margin-top: 5px" onclick="removeLossBread({{ $index }}); calcBreadSold({{ $index }})"><i class="fa fa-minus"></i></span>
                    </div>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="return_old_bread[{{ $index }}]" id="return_old_bread_{{ $index }}" value="{{ $bread_transaction->remain_old_qty }}" onchange="calcBreadSold({{ $index }})"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="return_new_bread[{{ $index }}]" id="return_new_bread_{{ $index }}" value="{{ $bread_transaction->remain_new_qty }}" onchange="calcBreadSold({{ $index }})"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control" id="sold_bread_{{ $index }}" value="0" readonly></input>
                  </td>
                  <td>
                    <input type="text" class="form-control money text-right" id="bread_price_{{ $index }}" name="bread_price[{{ $index }}]" value="{{ $bread_transaction->price }}" onchange="calcBreadSold({{ $index }})"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control money text-right" data="bread_total_price" id="bread_total_price_{{ $index }}" value="0" readonly></input>
                  </td>
                </tr>
                <script type="text/javascript">
                  $(document).ready(function() {
                    calcBreadSold({{ $index }});
                  });
                </script>
                @endforeach
                <tr>
                  <td colspan="9" class="text-right" style="vertical-align: middle"> Grand Total</td>
                  <td>
                    <input type="text" class="form-control text-right" id="grand_total_bread_price" value="0" readonly></input>
                  </td>
                </tr>
            </table>
          </div>
          <div id="snack_transaction" class="tab-pane fade">
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
              @foreach($snack_transactions as $index=>$snack_transaction)
                <tr>
                  <td class="center">
                    <input type="hidden" name="snack_id[{{ $index }}]" value="{{ $snack_transaction->item_id }}">
                    {{ $snack_transaction->name }}
                  </td>
                  <td>
                    <input type="text" class="form-control" name="bring_snack[{{ $index }}]" id="bring_snack_{{ $index }}" onchange="calcSnackSold({{ $index }})" value="{{ $snack_transaction->bring_qty }}"></input>
                  </td>
                  <td>
                    <div id="add_snack_{{ $index }}">
                      @foreach($snack_informations as $snack_information)
                        @if($snack_information->snack_transaction_id == $snack_transaction->snack_transaction_id && $snack_information->status_item == 1)
                          <?php $flag_snack += 1 ?>
                          <div class="input-group add_snack_{{ $index }}" style="margin-bottom: 3px">
                            <input type="text" class="form-control" id="add_snacks_{{ $index }}" onchange="calcSnackSold({{ $index }})" value="{{ $snack_information->qty }}" name="add_snack[{{ $index }}][]"></input>
                            <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddSnack{{ $flag_snack }}"><i class="fa fa-comment"></i></button></span>
                          </div>
                          <div id="modalInfoAddSnack{{ $flag_snack }}" class="modal fade modal_add_snack_{{ $index }}" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <textarea class="form-control" name="add_snack_information[{{ $index }}][]">{{ $snack_information->information }}</textarea>
                                </div>
                                <div class="modal-footer center">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach 
                    </div>
                    <div style="text-align: center">
                      <span class="btn btn-primary" style="margin-top: 5px" onclick="appendAddSnack({{ $index }})"><i class="fa fa-plus"></i></span>
                      <span class="btn btn-danger" style="margin-top: 5px" onclick="removeAddSnack({{ $index }}); calcSnackSold({{ $index }})"><i class="fa fa-minus"></i></span>
                    </div>
                  </td>
                  <td>
                    <div id="loss_snack_{{ $index }}">
                      @foreach($snack_informations as $snack_information)
                        @if($snack_information->snack_transaction_id == $snack_transaction->snack_transaction_id && $snack_information->status_item == 2)
                          <?php $flag_snack += 1 ?>
                          <div class="input-group loss_snack_{{ $index }}" style="margin-bottom: 3px">
                            <input type="text" class="form-control" id="loss_snacks_{{ $index }}" onchange="calcSnackSold({{ $index }})" value="{{ $snack_information->qty 
                            }}" name="loss_snack[{{ $index }}][]"></input>
                            <span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossSnack{{ $flag_snack }}"><i class="fa fa-comment"></i></button></span>
                          </div>
                          <div id="modalInfoLossSnack{{ $flag_snack }}" class="modal fade modal_loss_snack_{{ $index }}" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <textarea class="form-control" name="loss_snack_information[{{ $index }}][]">{{ $snack_information->information }}</textarea>
                                </div>
                                <div class="modal-footer center">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach  
                    </div>
                    <div style="text-align: center">
                      <span class="btn btn-primary" style="margin-top: 5px" onclick="appendLossSnack({{ $index }})"><i class="fa fa-plus"></i></span>
                      <span class="btn btn-danger" style="margin-top: 5px" onclick="removeLossSnack({{ $index }}); calcSnackSold({{ $index }})"><i class="fa fa-minus"></i></span>
                    </div>
                  </td>
                  <td>
                    <input type="text" class="form-control" name="return_snack[{{ $index }}]" id="return_snack_{{ $index }}" onchange="calcSnackSold({{ $index }})" value="{{ $snack_transaction->remain_qty }}"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control" id="sold_snack_{{ $index }}" value="0" readonly></input>
                  </td>
                  <td>
                    <input type="text" class="form-control money text-right" name="snack_price[{{ $index }}]" id="snack_price_{{ $index }}" value="{{ $snack_transaction->price }}" onchange="calcSnackSold({{ $index }})"></input>
                  </td>
                  <td>
                    <input type="text" class="form-control money text-right" data="snack_total_price" id="snack_total_price_{{ $index }}" value="0" readonly></input>
                  </td>
                </tr>
                <script type="text/javascript">
                  $(document).ready(function() {
                    calcSnackSold({{ $index }});
                  });
                </script>
                @endforeach
                <tr>
                  <td colspan="7" class="text-right" style="vertical-align: middle"> Grand Total</td>
                  <td>
                    <input type="text" class="form-control" id="grand_total_snack_price" value="0" readonly></input>
                  </td>
                </tr>
            </table>
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
      <div id="modal"></div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">$('#cars_table').DataTable();</script>
<script>
  var flag_bread = {{ $flag_bread }};
  var flag_snack = {{ $flag_snack }};

  function appendAddBread(index) {
    var data_td = 
    '<div class="input-group add_bread_'+index+'" style="margin-bottom: 3px">'+
    '<input type="text" class="form-control" id="add_breads_'+index+'" onchange="calcBreadSold('+index+')" value="0" name="add_bread['+index+'][]"></input>'+
    '<span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddBread'+flag_bread+'"><i class="fa fa-comment"></i></button></span>'+
    '</div>';

    var data_modal =
    '<div id="modalInfoAddBread'+flag_bread+'" class="modal fade modal_add_bread_'+index+'" role="dialog">'+
    '<div class="modal-dialog">'+
    '<div class="modal-content">'+
    '<div class="modal-body">'+
    '<textarea class="form-control" name="add_bread_information['+index+'][]"></textarea>'+
    '</div>'+
    '<div class="modal-footer center">'+
    '<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>'+
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    $('#add_bread_'+index).append(data_td);
    $('#modal').append(data_modal);
    flag_bread++;
  }

  function removeAddBread(index) {
    $('.add_bread_'+index+':last').remove();
    $('.modal_add_bread_'+index+':last').remove();
  }

  function appendLossBread(index) {
    var data = 
    '<div class="input-group loss_bread_'+index+'" style="margin-bottom: 3px">'+
    '<input type="text" class="form-control" value="0" id="loss_breads_'+index+'" onchange="calcBreadSold('+index+')" name="loss_bread['+index+'][]"></input>'+
    '<span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossBread'+flag_bread+'"><i class="fa fa-comment"></i></button></span>'+
    '</div>';

    var data_modal =
    '<div id="modalInfoLossBread'+flag_bread+'" class="modal fade  modal_loss_bread_'+index+'" role="dialog">'+
    '<div class="modal-dialog">'+
    '<div class="modal-content">'+
    '<div class="modal-body">'+
    '<textarea class="form-control" name="loss_bread_information['+index+'][]"></textarea>'+
    '</div>'+
    '<div class="modal-footer center">'+
    '<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>'+
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    $('#loss_bread_'+index).append(data);
    $('#modal').append(data_modal);
    flag_bread++;
  }

  function removeLossBread(index) {
    $('.loss_bread_'+index+':last').remove();
    $('.modal_loss_bread_'+index+':last').remove();
  }

  function appendAddSnack(index) {
    var data_td = 
    '<div class="input-group add_snack_'+index+'" style="margin-bottom: 3px">'+
    '<input type="text" class="form-control" id="add_snacks_'+index+'" onchange="calcSnackSold('+index+')" value="0" name="add_snack['+index+'][]"></input>'+
    '<span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoAddSnack'+flag_snack+'"><i class="fa fa-comment"></i></button></span>'+
    '</div>';

    var data_modal =
    '<div id="modalInfoAddSnack'+flag_snack+'" class="modal fade modal_add_snack_'+index+'" role="dialog">'+
    '<div class="modal-dialog">'+
    '<div class="modal-content">'+
    '<div class="modal-body">'+
    '<textarea class="form-control" name="add_snack_information['+index+'][]"></textarea>'+
    '</div>'+
    '<div class="modal-footer center">'+
    '<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>'+
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    $('#add_snack_'+index).append(data_td);
    $('#modal').append(data_modal);
    flag_snack++;
  }

  function removeAddSnack(index) {
    $('.add_snack_'+index+':last').remove();
    $('.modal_add_snack_'+index+':last').remove();
  }

  function appendLossSnack(index) {
    var data = 
    '<div class="input-group loss_snack_'+index+'" style="margin-bottom: 3px">'+
    '<input type="text" class="form-control" id="loss_snacks_'+index+'" onchange="calcSnackSold('+index+')" value="0" name="loss_snack['+index+'][]"></input>'+
    '<span class="input-group-btn"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalInfoLossSnack'+flag_snack+'"><i class="fa fa-comment"></i></button></span>'+
    '</div>';

    var data_modal =
    '<div id="modalInfoLossSnack'+flag_snack+'" class="modal fade modal_loss_snack_'+index+'" role="dialog">'+
    '<div class="modal-dialog">'+
    '<div class="modal-content">'+
    '<div class="modal-body">'+
    '<textarea class="form-control" name="loss_snack_information['+index+'][]"></textarea>'+
    '</div>'+
    '<div class="modal-footer center">'+
    '<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>'+
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    $('#loss_snack_'+index).append(data);
    $('#modal').append(data_modal);
    flag_snack++;
  }

  function removeLossSnack(index) {
    $('.loss_snack_'+index+':last').remove();
    $('.modal_loss_snack_'+index+':last').remove();
  }

  function calcBreadSold(index) {
    var total_bread_sold = 0;
    var total_price = 0;
    var grand_total_bread_price = 0;

    total_bread_sold = parseInt(total_bread_sold) + parseInt($('#bring_old_bread_'+index).val());
    total_bread_sold = parseInt(total_bread_sold) + parseInt($('#bring_new_bread_'+index).val());
    $("input[id='add_breads_"+index+"']").each(function() {
      total_bread_sold = parseInt(total_bread_sold) + parseInt($(this).val());
    });
    $("input[id='loss_breads_"+index+"']").each(function() {
      total_bread_sold = parseInt(total_bread_sold) - parseInt($(this).val());
    });
    total_bread_sold = parseInt(total_bread_sold) - parseInt($('#return_new_bread_'+index).val());
    total_bread_sold = parseInt(total_bread_sold) - parseInt($('#return_old_bread_'+index).val());

    $('#sold_bread_'+index).val(total_bread_sold);
    total_price = parseInt(total_bread_sold) * parseInt($('#bread_price_'+index).val());
    $('#bread_total_price_'+index).val(total_price);

    $("input[data='bread_total_price']").each(function() {
      grand_total_bread_price = parseInt(grand_total_bread_price) + parseInt($(this).val());
    });
    $('#grand_total_bread_price').val(grand_total_bread_price);
  }

  function calcSnackSold(index) {
    var total_snack_sold = 0;
    var total_price = 0;
    var grand_total_snack_price = 0;

    total_snack_sold = parseInt(total_snack_sold) + parseInt($('#bring_snack_'+index).val());
    $("input[id='add_snacks_"+index+"']").each(function() {
      total_snack_sold = parseInt(total_snack_sold) + parseInt($(this).val());
    });
    $("input[id='loss_snacks_"+index+"']").each(function() {
      total_snack_sold = parseInt(total_snack_sold) - parseInt($(this).val());
    });
    total_snack_sold = parseInt(total_snack_sold) - parseInt($('#return_snack_'+index).val());

    $('#sold_snack_'+index).val(total_snack_sold);
    total_price = parseInt(total_snack_sold) * parseInt($('#snack_price_'+index).val());
    $('#snack_total_price_'+index).val(total_price);

    $("input[data='snack_total_price']").each(function() {
      grand_total_snack_price = parseInt(grand_total_snack_price) + parseInt($(this).val());
    });
    $('#grand_total_snack_price').val(grand_total_snack_price);
  }

  $('#transaction_date').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    todayHighlight: true
  });

  // $('.money').mask('#.##0', {reverse: true});
</script>
@endsection