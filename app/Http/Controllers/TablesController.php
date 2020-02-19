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


        $agro = new AgroTable;
        $queries = [];


        $columns = [
            'title', 'region', 'area', 'supervisor', 'landline_phone', 'mobile_phone', 'fax', 'concil_number', 'land_bank', 'egrpou', 'address', 'email_website'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $agro = $agro->where($column, request($column));
                $queries[$column] = request($column);
            }
        }

        if(request()->has('sort')){
            $agro = $agro->orderBy('title', request('sort'));
            $queries['sort'] = request('sort');
        }

        $agro = $agro->paginate(5)->appends($queries);

        return view('tables/index', compact('agro'));


        //return Datatables::of(User::query())->make(true);

        // $users = DB::table('users')->paginate(10);
        // $agro = DB::table('agrotest')->paginate(5);


        // return view('tables/index',[
        //     'users' => $users,
        //     'agro' => $agro
        // ]);
    }
}
