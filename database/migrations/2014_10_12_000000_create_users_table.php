<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email_address')->unique();
            $table->string('password');
            $table->integer('primary_phone_number')->unique();
            $table->integer('secondary_phone_number');
            $table->string('state');
            $table->string('city');
            $table->string('area');
            $table->string('address');
            $table->integer('pincode');
            $table->string('adharcard_number');
            $table->string('pancard_number');
            $table->text('pancard_photo');
            $table->text('aadharcard_photo');
            $table->text('passport_photo');
            $table->json('gold_in_vault'); //[ {"melting_id":"weight"}, {"melting_id":"weight"}]
            $table->boolean('prime_user')->default(false);
            $table->boolean('blacklist')->default(false);
            $table->boolean('primary_number_verified')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->ipAddress('ip_address');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
