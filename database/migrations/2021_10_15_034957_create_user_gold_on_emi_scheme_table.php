<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGoldOnEmiSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_gold_on_emi_scheme', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->uuid('scheme_id');
            $table->foreign('scheme_id')->references('id')->on('gold_on_emi_scheme');
            $table->string('scheme_name');
            $table->enum('period', ['Daily', 'Weekly', 'Bi-Weekly', 'Monthly', 'Bi-Monthly', 'Quarterly', 'Half-Yearly', 'Yeary']);
            $table->integer('cycle');
            $table->string('gold_melting_type')->nullable();
            $table->float('gold_rate', 8, 4);
            $table->enum('emi_on_date', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_gold_on_emi_scheme');
    }
}
