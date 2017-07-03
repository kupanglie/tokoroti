<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnackTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snack_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('item_id');
            $table->integer('price');
            $table->integer('bring_qty');
            $table->integer('remain_qty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snack_transactions');
    }
}
