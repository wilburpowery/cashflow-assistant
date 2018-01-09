<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->bigInteger('initial_balance');
            $table->bigInteger('income');
            $table->bigInteger('expense');
            $table->bigInteger('transfers');
            $table->bigInteger('card_payments');
            $table->bigInteger('earn_sp');
            $table->bigInteger('deposit_sp');
            $table->bigInteger('commission_sp');
            $table->bigInteger('refills');
            $table->bigInteger('commission_refills');
            $table->bigInteger('cash_box');
            $table->bigInteger('final_balance');
            $table->bigInteger('real_balance');
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desk_closes');
    }
}
