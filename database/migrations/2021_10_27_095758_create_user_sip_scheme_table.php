<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSipSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sip_scheme', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('sip_type', ['By Weight', 'By Amount']);
            $table->float('amount', 8, 2)->nullable(); // IF `sip_type` is BY AMOUNT
            $table->string('gold_melting_type')->nullable(); // IF `sip_type` is BY Weight
            $table->float('gold_weigth', 8, 3)->nullable(); // IF `sip_type` is BY Weight
            $table->enum('period', ['Daily', 'Weekly', 'Bi-Weekly', 'Monthly', 'Bi-Monthly', 'Quarterly', 'Half-Yearly', 'Yeary'])->nullable();
            $table->integer('cycle')->nullable();
            $table->enum('emi_on_date', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20])->nullable(); //IF `period` is MONTHLY, Bi-Monthly, Quarterly, Half-Yearly
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
        Schema::dropIfExists('user_sip_scheme');
    }
}
