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
            'title', 'region', 'area', 'supervisor', 
            'landline_phone', 'mobile_phone', 'fax', 
            'concil_number', 'land_bank', 'egrpou', 
            'address', 'email_website'
        ];

        foreach($columns as $column){
            if(request()->has($column)){
                $agro = $agro->where($column, request($column));
                $queries[$column] = request($column);
            }
        }

        if(request()->has('sort')){
            $agro = $agro->orderBy('id', request('sort'));
            $queries['sort'] = request('sort');
        }

        $agro = $agro->paginate(10)->appends($queries);

        //Уникальные фильтры
        //Регионы
        $regions = AgroTable::select('region')->distinct()->get();
        //Области
        $areas = AgroTable::select('area')->distinct()->get();
        //dd($regions);

        //Текущий пользователь
        $user = auth()->user();


        return view('tables/index', compact('agro', 'regions', 'areas', 'user'));

    }
}
