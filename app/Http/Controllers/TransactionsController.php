<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\BreadTransaction;
use App\SnackTransaction;
use App\DropoffStoreTransaction;
use App\Item;
use App\Car;
use App\Worker;
use App\DropoffStore;
use App\BreadInformation;
use App\SnackInformation;
use DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::table('transactions')
                        ->join('cars', 'cars.id', '=', 'transactions.car_id')
                        ->select('transactions.*', 'cars.*', 'transactions.id as transaction_id', 'cars.name as car_name')
                        ->get();
        $workers = DB::table('workers')->get();
                
        return view('transactions.index', compact('transactions', 'workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breads = Item::where('category_id', 1)->get();
        $snacks = Item::where('category_id', 2)->get();
        $cars = Car::all();
        $workers = Worker::all();
        $dropoffStores = DropoffStore::all();

        return view('transactions.create', compact('breads', 'snacks', 'cars', 'workers', 'dropoffStores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $newTransaction = new Transaction();
        $newTransaction->car_id = $request->car_id;
        $newTransaction->worker_id_1 = $request->worker_id_1;
        $newTransaction->worker_id_2 = $request->worker_id_2;
        $newTransaction->date = date('Y-m-d', strtotime($request->transaction_date));
        $newTransaction->electricity_exp = $request->electricity_exp;
        $newTransaction->gasoline_exp = $request->gasoline_exp;
        $newTransaction->eat_exp = $request->eat_exp;
        $newTransaction->police_exp = $request->police_exp;
        $newTransaction->park_exp = $request->park_exp;
        $newTransaction->save();

        $newDropoffStoreTransaction = new DropoffStoreTransaction();
        $newDropoffStoreTransaction->transaction_id = $newTransaction->id;
        $newDropoffStoreTransaction->dropoff_store_id = $request->dropoff_store_id;
        $newDropoffStoreTransaction->price = $request->dropoff_store_price;
        $newDropoffStoreTransaction->save();

        for($i=0;$i<count($request->bread_id);$i++) {
            $newBreadTransaction = new BreadTransaction();
            $newBreadTransaction->transaction_id = $newTransaction->id;
            $newBreadTransaction->item_id = $request->bread_id[$i];
            $newBreadTransaction->price = $request->bread_price[$i];
            $newBreadTransaction->bring_old_qty = $request->bring_old_bread[$i];
            $newBreadTransaction->bring_new_qty = $request->bring_new_bread[$i];
            $newBreadTransaction->remain_old_qty = $request->return_old_bread[$i];
            $newBreadTransaction->remain_new_qty = $request->return_new_bread[$i];
            $newBreadTransaction->save();

            if(isset($request->add_bread[$i])) {
                for($j=0;$j<count($request->add_bread[$i]);$j++) {
                    $newBreadInformation = new BreadInformation();
                    $newBreadInformation->bread_transaction_id = $newBreadTransaction->id;
                    $newBreadInformation->status_item = 1;
                    $newBreadInformation->qty = $request->add_bread[$i][$j];
                    $newBreadInformation->information = $request->add_bread_information[$i][$j];
                    $newBreadInformation->save();
                }
            }

            if(isset($request->loss_bread[$i])) {
                for($j=0;$j<count($request->loss_bread[$i]);$j++) {
                    $newLossBreadInformation = new BreadInformation();
                    $newLossBreadInformation->bread_transaction_id = $newBreadTransaction->id;
                    $newLossBreadInformation->status_item = 2;
                    $newLossBreadInformation->qty = $request->loss_bread[$i][$j];
                    $newLossBreadInformation->information = $request->loss_bread_information[$i][$j];
                    $newLossBreadInformation->save();
                }
            }

            $newNewSnackTransaction = new SnackTransaction();
            $newNewSnackTransaction->transaction_id = $newTransaction->id;
            $newNewSnackTransaction->item_id = $request->snack_id[$i];
            $newNewSnackTransaction->price = $request->snack_price[$i];
            $newNewSnackTransaction->bring_qty = $request->bring_snack[$i];
            $newNewSnackTransaction->remain_qty = $request->return_snack[$i];
            $newNewSnackTransaction->save();

            if(isset($request->add_snack[$i])) {
                for($j=0;$j<count($request->add_snack[$i]);$j++) {
                    $newAddSnackInformation = new SnackInformation();
                    $newAddSnackInformation->snack_transaction_id = $newNewSnackTransaction->id;
                    $newAddSnackInformation->status_item = 1;
                    $newAddSnackInformation->qty = $request->add_snack[$i][$j];
                    $newAddSnackInformation->information = $request->add_snack_information[$i][$j];
                    $newAddSnackInformation->save();
                }
            }

            if(isset($request->loss_snack[$i])) {
                for($j=0;$j<count($request->loss_snack[$i]);$j++) {
                    $newLossSnackInformation = new SnackInformation();
                    $newLossSnackInformation->snack_transaction_id = $newNewSnackTransaction->id;
                    $newLossSnackInformation->status_item = 2;
                    $newLossSnackInformation->qty = $request->loss_snack[$i][$j];
                    $newLossSnackInformation->information = $request->loss_snack_information[$i][$j];
                    $newLossSnackInformation->save();
                }
            }
        }
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = DB::table('transactions')
                        ->join('cars', 'cars.id', '=', 'transactions.car_id')
                        ->select('transactions.*', 'cars.*', 'transactions.id as transaction_id', 'cars.name as car_name')
                        ->where('transactions.id', $id)
                        ->first();

        $workers = DB::table('workers')->get();

        $dropoffStoreTransaction = DB::table('dropoff_store_transactions')
                                    ->join('dropoff_stores', 'dropoff_stores.id', '=', 'dropoff_store_transactions.dropoff_store_id')
                                    ->where('dropoff_store_transactions.transaction_id', $id)
                                    ->first();

        $breadTransactions = DB::table('bread_transactions')
                                ->join('items', 'bread_transactions.item_id', '=', 'items.id')
                                ->select('bread_transactions.*', 'items.*', 'bread_transactions.id as bread_transaction_id', 'items.id as item_id')
                                ->where('bread_transactions.transaction_id', $id)
                                ->get();

        $snackTransactions = DB::table('snack_transactions')
                                ->join('items', 'snack_transactions.item_id', '=', 'items.id')
                                ->select('snack_transactions.*', 'items.*', 'snack_transactions.id as snack_transaction_id', 'items.id as item_id')
                                ->where('snack_transactions.transaction_id', $id)
                                ->get();                        

        $breadInformations = DB::table('bread_informations')
                            ->get(); 

        $snackInformations = DB::table('snack_informations')
                            ->get();         
                                        
        return view('transactions.show', compact('transaction', 'workers', 'dropoffStoreTransaction', 'breadTransactions', 'breadInformations', 'snackTransactions', 'snackInformations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $dropoffstore_transaction = DropoffStoreTransaction::where('transaction_id', $id)->first();
        $bread_transactions = DB::table('bread_transactions')
                                ->join('items', 'bread_transactions.item_id', '=', 'items.id')
                                ->select('bread_transactions.*', 'items.*', 'bread_transactions.id as bread_transaction_id')
                                ->where('bread_transactions.transaction_id', $id)
                                ->get();
        $bread_informations = DB::table('bread_informations')->get();
        $snack_transactions = DB::table('snack_transactions')
                                ->join('items', 'snack_transactions.item_id', '=', 'items.id')
                                ->select('snack_transactions.*', 'items.*', 'snack_transactions.id as snack_transaction_id', 'items.id as item_id')
                                ->where('snack_transactions.transaction_id', $id)
                                ->get();
        $snack_informations = DB::table('snack_informations')->get();

        $cars = Car::all();
        $workers = Worker::all();
        $dropoffStores = DropoffStore::all();

        return view('transactions.edit', compact('transaction', 'dropoffstore_transaction', 'bread_transactions', 'bread_informations', 'snack_transactions', 'snack_informations', 'cars', 'workers', 'dropoffStores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateTransaction = Transaction::find($id);
        $updateTransaction->car_id = $request->car_id;
        $updateTransaction->worker_id_1 = $request->worker_id_1;
        $updateTransaction->worker_id_2 = $request->worker_id_2;
        $updateTransaction->date = date('Y-m-d', strtotime($request->transaction_date));
        $updateTransaction->electricity_exp = $request->electricity_exp;
        $updateTransaction->gasoline_exp = $request->gasoline_exp;
        $updateTransaction->eat_exp = $request->eat_exp;
        $updateTransaction->police_exp = $request->police_exp;
        $updateTransaction->park_exp = $request->park_exp;
        $updateTransaction->save();

        $deleteDropoffStoreTransaction = DropoffStoreTransaction::where('transaction_id', $id)->delete();
        $newDropoffStoreTransaction = new DropoffStoreTransaction();
        $newDropoffStoreTransaction->transaction_id = $updateTransaction->id;
        $newDropoffStoreTransaction->dropoff_store_id = $request->dropoff_store_id;
        $newDropoffStoreTransaction->price = $request->dropoff_store_price;
        $newDropoffStoreTransaction->save();

        $deleteBreadTransaction = BreadTransaction::where('transaction_id', $id)->delete();
        foreach ($request->bread_transaction_id as $bread_transaction_id) {
            $deleteBreadInformation = BreadInformation::where('bread_transaction_id', $bread_transaction_id)->delete();
        }

        for($i=0;$i<count($request->bread_id);$i++) {
            $newBreadTransaction = new BreadTransaction();
            $newBreadTransaction->transaction_id = $updateTransaction->id;
            $newBreadTransaction->item_id = $request->bread_id[$i];
            $newBreadTransaction->price = $request->bread_price[$i];
            $newBreadTransaction->bring_old_qty = $request->bring_old_bread[$i];
            $newBreadTransaction->bring_new_qty = $request->bring_new_bread[$i];
            $newBreadTransaction->remain_old_qty = $request->return_old_bread[$i];
            $newBreadTransaction->remain_new_qty = $request->return_new_bread[$i];
            $newBreadTransaction->save();

            if(isset($request->add_bread[$i])) {
                for($j=0;$j<count($request->add_bread[$i]);$j++) {
                    $newBreadInformation = new BreadInformation();
                    $newBreadInformation->bread_transaction_id = $newBreadTransaction->id;
                    $newBreadInformation->status_item = 1;
                    $newBreadInformation->qty = $request->add_bread[$i][$j];
                    $newBreadInformation->information = $request->add_bread_information[$i][$j];
                    $newBreadInformation->save();
                }
            }

            if(isset($request->loss_bread[$i])) {
                for($j=0;$j<count($request->loss_bread[$i]);$j++) {
                    $newLossBreadInformation = new BreadInformation();
                    $newLossBreadInformation->bread_transaction_id = $newBreadTransaction->id;
                    $newLossBreadInformation->status_item = 2;
                    $newLossBreadInformation->qty = $request->loss_bread[$i][$j];
                    $newLossBreadInformation->information = $request->loss_bread_information[$i][$j];
                    $newLossBreadInformation->save();
                }
            }

            $newNewSnackTransaction = new SnackTransaction();
            $newNewSnackTransaction->transaction_id = $updateTransaction->id;
            $newNewSnackTransaction->item_id = $request->snack_id[$i];
            $newNewSnackTransaction->price = $request->snack_price[$i];
            $newNewSnackTransaction->bring_qty = $request->bring_snack[$i];
            $newNewSnackTransaction->remain_qty = $request->return_snack[$i];
            $newNewSnackTransaction->save();

            if(isset($request->add_snack[$i])) {
                for($j=0;$j<count($request->add_snack[$i]);$j++) {
                    $newAddSnackInformation = new SnackInformation();
                    $newAddSnackInformation->snack_transaction_id = $newNewSnackTransaction->id;
                    $newAddSnackInformation->status_item = 1;
                    $newAddSnackInformation->qty = $request->add_snack[$i][$j];
                    $newAddSnackInformation->information = $request->add_snack_information[$i][$j];
                    $newAddSnackInformation->save();
                }
            }

            if(isset($request->loss_snack[$i])) {
                for($j=0;$j<count($request->loss_snack[$i]);$j++) {
                    $newLossSnackInformation = new SnackInformation();
                    $newLossSnackInformation->snack_transaction_id = $newNewSnackTransaction->id;
                    $newLossSnackInformation->status_item = 2;
                    $newLossSnackInformation->qty = $request->loss_snack[$i][$j];
                    $newLossSnackInformation->information = $request->loss_snack_information[$i][$j];
                    $newLossSnackInformation->save();
                }
            }
        }
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breadTransactions = BreadTransaction::where('transaction_id', $id)->get();
        foreach ($breadTransactions as $breadTransaction) {
            $deleteBreadInformation = BreadInformation::where('bread_transaction_id', $breadTransaction->id)->delete();
        }
        $deleteBreadTransactions = BreadTransaction::where('transaction_id', $id)->delete();

        $snackTransactions = SnackTransaction::where('transaction_id', $id)->get();
        foreach ($snackTransactions as $snackTransaction) {
            $deleteSnackInformation = BreadInformation::where('bread_transaction_id', $snackTransaction->id)->delete();
        }
        $deleteSnackTransactions = SnackTransaction::where('transaction_id', $id)->delete();

        $deleteDropoffStoreTransaction = DropoffStoreTransaction::where('transaction_id', $id)->delete(); 
        $deleteTransaction = Transaction::find($id)->delete();

        return redirect()->route('transactions.index');
    }
}
