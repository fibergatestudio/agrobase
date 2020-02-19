<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAgrotestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agrotest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('region')->nullable();
            $table->text('area')->nullable();
            $table->text('supervisor')->nullable();
            $table->text('landline_phone')->nullable();
            $table->text('mobile_phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('concil_number')->nullable();
            $table->text('land_bank')->nullable();
            $table->text('egrpou')->nullable();
            $table->longText('address')->nullable();
            $table->longText('email_website')->nullable();
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
        Schema::dropIfExists('agrotest');
    }
}
