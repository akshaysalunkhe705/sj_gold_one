<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaultTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vault_transaction', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->uuid('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments');

            $table->uuid('user_gold_on_emi_scheme_id');
            $table->foreign('user_gold_on_emi_scheme_id')->references('id')->on('user_gold_on_emi_scheme');

            $table->uuid('user_sip_scheme_id');
            $table->foreign('user_sip_scheme_id')->references('id')->on('user_sip_scheme');
            
            $table->float('weight', 9, 3);
            $table->string('gold_melting_type');
            $table->integer('gold_rate');
            $table->date('purchase_date');
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
        Schema::dropIfExists('vault_transaction');
    }
}
