<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldOnEmiSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold_on_emi_scheme', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('scheme_name')->nullable();
            $table->integer('initial_amount_percent')->nullable();
            $table->integer('interest_rate')->nullable();
            $table->enum('period', ['Daily', 'Weekly', 'Bi-Weekly', 'Monthly', 'Bi-Monthly', 'Quarterly', 'Half-Yearly', 'Yeary'])->nullable();
            $table->integer('cycle')->nullable();
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
        Schema::dropIfExists('gold_on_emi_scheme');
    }
}
