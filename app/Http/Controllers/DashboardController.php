<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function random_color_part() 
        {
            return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        }

        function random_color() 
        {
            return random_color_part() . random_color_part() . random_color_part();
        }
        
        
        $transactions = DB::table('transactions')
                        ->get();
        $cars = DB::select('SELECT DISTINCT car_id, name FROM transactions JOIN cars WHERE car_id = cars.id');

        /** Bread and Snack Transaction **/
        $chartTransaction = Charts::multi('line', 'c3');  
        $chartTransaction->title('');
        $chartTransaction->elementLabel('');

        $transactionColors = [];
        for($i=0;$i<count($cars); $i++) 
        {
            array_push($transactionColors, '#' . random_color());
        }
        $chartTransaction->colors($transactionColors);

        $date_transaction = [];
        for($i = 1; $i <=  date('t'); $i++)
        {
           $dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT) . ' 00:00:00';
           array_push($date_transaction, $i);
        }
        $chartTransaction->labels($date_transaction);

        foreach ($cars as $car) 
        {
            $profits = [];
            foreach ($dates as $date) 
            {
                $flag = 0;
                foreach($transactions as $transaction) 
                {
                    if ($transaction->car_id == $car->car_id && $transaction->date == $date) 
                    {
                        $profit = 0;

                        $profit -= $transaction->electricity_exp;
                        $profit -= $transaction->gasoline_exp;
                        $profit -= $transaction->eat_exp;
                        $profit -= $transaction->police_exp;
                        $profit -= $transaction->park_exp;

                        $dropoffStoreTransaction = DB::table('dropoff_store_transactions')
                        ->where('dropoff_store_transactions.transaction_id', $transaction->id)
                        ->first();
                        $profit = $profit + $dropoffStoreTransaction->price;

                        $breadTransactions = DB::table('bread_transactions')
                        ->where('bread_transactions.transaction_id', $transaction->id)
                        ->get();

                        foreach ($breadTransactions as $breadTransaction) 
                        {
                            $sold = 0;
                            $total_price = 0;

                            $sold += $breadTransaction->bring_old_qty;
                            $sold += $breadTransaction->bring_new_qty;
                            $sold -= $breadTransaction->remain_old_qty;
                            $sold -= $breadTransaction->remain_new_qty;

                            $breadInformations = DB::table('bread_informations')
                            ->where('bread_informations.bread_transaction_id', $breadTransaction->id)
                            ->get();

                            foreach ($breadInformations as $breadInformation) 
                            {
                                if($breadInformation->status_item == 1) {
                                    $sold += $breadInformation->qty;
                                } else {
                                    $sold -= $breadInformation->qty;
                                }
                            } 

                            $total_price = $sold * $breadTransaction->price;       
                            $profit += $total_price;
                        }       

                        $snackTransactions = DB::table('snack_transactions')
                        ->where('snack_transactions.transaction_id', $transaction->id)
                        ->get();

                        foreach ($snackTransactions as $snackTransaction) 
                        {
                            $sold = 0;
                            $total_price = 0;

                            $sold += $snackTransaction->bring_qty;
                            $sold -= $snackTransaction->remain_qty;

                            $snackInformations = DB::table('snack_informations')
                            ->where('snack_informations.snack_transaction_id', $snackTransaction->id)
                            ->get();

                            foreach ($snackInformations as $snackInformation) 
                            {
                                if($snackInformation->status_item == 1) {
                                    $sold += $snackInformation->qty;
                                } else {
                                    $sold -= $snackInformation->qty;
                                }
                            } 

                            $total_price = $sold * $snackTransaction->price;       
                            $profit += $total_price;
                        }
                        array_push($profits, $profit);
                        $flag += 1;
                    }
                }
                if($flag == 0)
                {
                    array_push($profits, 0);
                }
            }
            $chartTransaction->dataset($car->name, $profits);
        }

        /** Dropoff Store Transaction **/
        $dropoffStoreTransactions = DB::table('transactions')
                                    ->join('dropoff_store_transactions', 'transactions.id', '=', 'dropoff_store_transactions.transaction_id')
                                    ->join('dropoff_stores', 'dropoff_store_transactions.dropoff_store_id', '=', 'dropoff_stores.id')
                                    ->get();
        $dropoffStores = DB::table('dropoff_stores')->orderBy('id', 'asc')->get();    
        
        $dataDropoffStores = [];
        foreach ($dropoffStores as $dropoffStore) 
        {
            $each_store = [];
            foreach ($dates as $date) 
            {
                $flag = 0;
                foreach($dropoffStoreTransactions as $dropoffStoreTransaction)
                {
                    if($dropoffStoreTransaction->dropoff_store_id == $dropoffStore->id && $dropoffStoreTransaction->date == $date)
                    {
                        array_push($each_store, $dropoffStoreTransaction->price);
                        $flag += 1;
                    }
                }
                if($flag == 0)
                {
                    array_push($each_store, 0);
                }
            }
            array_push($dataDropoffStores, $each_store);
        }

        /** Expense **/
        $car_lists = DB::table('cars')->orderBy('id', 'asc')->get();

        /** Absence **/
        
        
        return view('dashboard.index', compact('transactions', 'chartTransaction', 'date_transaction', 'dates', 'dropoffStores', 'dataDropoffStores', 'car_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
