<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\AgroTable;

class TablesController extends Controller
{
    // Главная страница таблиц
    public function index(){

        //return Datatables::of(User::query())->make(true);

        $users = DB::table('users')->paginate(10);
        $agro = DB::table('agrotest')->paginate(5);


        return view('tables/index',[
            'users' => $users,
            'agro' => $agro
        ]);
    }
}
