<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWecashupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wecashups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('merchant_secret');
            $table->string('transaction_token');
            $table->string('transaction_uid');
            $table->string('transaction_confirmation_code');
            $table->string('transaction_provider_name');
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
        Schema::dropIfExists('wecashups');
    }
}
