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
            $table->text('title');
            $table->text('region');
            $table->text('area');
            $table->text('supervisor');
            $table->text('landline_phone');
            $table->text('mobile_phone');
            $table->text('fax');
            $table->text('concil_number');
            $table->text('land_bank');
            $table->text('egrpou');
            $table->longText('address');
            $table->longText('email_website');
            $table->timestamp('failed_at')->useCurrent();
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
