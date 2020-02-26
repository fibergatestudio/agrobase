<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $demo_values = [
            [
                'name' => 'admin',
                'email'=> 'admin@mail.com',
                'password' => Hash::make('qwerty'),
                'status' => 'confirmed',
                'role' => 'admin'
            ]
        ];

        DB::table('users')->insert($demo_values);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('name', '=', 'admin')->delete();
    }
}
