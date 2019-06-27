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
            $table->integer('user_id')->index();
            $table->integer('training_id')->index();
            $table->string('merchant_secret');
            $table->string('transaction_token');
            $table->string('transaction_uid');
            $table->string('transaction_confirmation_code');
            $table->string('transaction_provider_name');
            $table->boolean('status')->nullable();
            $table->string('transaction_details');
            $table->string('transaction_amount');
            $table->string('transaction_receiver_currency');
            $table->string('transaction_status');
            $table->string('transaction_type');
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
