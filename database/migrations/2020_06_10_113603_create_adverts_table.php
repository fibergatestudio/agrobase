<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creator_id')->nullable();
            $table->string('short_text')->nullable();
            $table->string('company')->nullable();
            $table->string('trading_item')->nullable();
            $table->string('sale_place')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->default('unconfirmed');
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
        Schema::dropIfExists('adverts');
    }
}
