<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AdminController extends Controller
{
    public function users_index(){

        $users = DB::table('users')->paginate(10);

        return view('admin.users',[
            'users' => $users,
        ]);
    }
}
