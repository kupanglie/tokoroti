<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreadTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bread_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('item_id');
            $table->integer('price');
            $table->integer('bring_old_qty');
            $table->integer('bring_new_qty');
            $table->integer('remain_old_qty')->nullable();
            $table->integer('remain_new_qty')->nullable();
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
        Schema::dropIfExists('bread_transactions');
    }
}
