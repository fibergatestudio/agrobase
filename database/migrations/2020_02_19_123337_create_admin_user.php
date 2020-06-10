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
                'reg_code' => '322',
                'address' => 'address',
                'phone' => '380999999999',
                'website' => 'website.com',
                'contact_name' => 'Contact Name',
                'password' => Hash::make('qwerty'),
                'expiry_date' => '2060-05-20',
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
