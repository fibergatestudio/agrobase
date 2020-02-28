<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGorohtableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gorohtable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('sender_egrpou')->nullable();
            $table->text('sender_name')->nullable();
            $table->text('sender_address')->nullable();
            $table->text('recipient_name')->nullable();
            $table->text('recipient_address')->nullable();
            $table->text('contract_holder')->nullable();
            $table->text('contract_address')->nullable();
            $table->text('declarant_egrpou')->nullable();
            $table->text('product_code')->nullable();
            $table->text('product_descr')->nullable();

            $table->text('trading_country')->nullable();
            $table->text('destination_country')->nullable();
            $table->text('delivery_conditions')->nullable();

            $table->text('delivery_place')->nullable();
            $table->text('rvf_usd')->nullable();
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
        Schema::dropIfExists('gorohtable');
    }
}
