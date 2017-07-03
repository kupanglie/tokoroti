<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id');
            $table->integer('worker_id_1');
            $table->integer('worker_id_2');
            $table->dateTime('date');
            $table->integer('electricity_exp');
            $table->integer('gasoline_exp');
            $table->integer('eat_exp');
            $table->integer('police_exp');
            $table->integer('park_exp');
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
        Schema::dropIfExists('transactions');
    }
}
