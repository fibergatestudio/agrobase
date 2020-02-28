<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\AgroTable;
use App\GorohTable;

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

        //Правки номеров из базы
        foreach($agro as $agr){

            //Убираем лишние символы
            $agr->landline_phone = str_replace(array('-',';'), '', $agr->landline_phone);
            $agr->mobile_phone = str_replace(array('-',';'), '', $agr->mobile_phone);
            $agr->fax = str_replace(array('-',';', ' '), '', $agr->fax);
            //Разбиваем стак телефонов
            $agr->landline_phone = preg_split('/\s+/', $agr->landline_phone, NULL, PREG_SPLIT_NO_EMPTY);
            $agr->mobile_phone = preg_split('/\s+/', $agr->mobile_phone, NULL, PREG_SPLIT_NO_EMPTY);
            $agr->fax = preg_split('/\s+/', $agr->fax, NULL, PREG_SPLIT_NO_EMPTY);
            //unset($land_phone);
            //dd($agr->mobile_phone);
        }

        //Уникальные фильтры
        //Регионы
        $regions = AgroTable::select('region')->distinct()->get();
        //Области
        $areas = AgroTable::select('area')->whereNotNull('area')->distinct()->get();

        //Для дропдаунов
        if(request()->has('region')){
            $f_region = request('region');
        } else {
            $f_region = '';
        }
        if(request()->has('area')){
            $f_area = request('area');
        } else {
            $f_area = '';
        }

        //Текущий пользователь
        $user = auth()->user();


        return view('tables/index', compact('agro', 'regions', 'areas', 'user', 'f_region', 'f_area'));

    }

    public function all_tables(){

        $user = auth()->user();

        return view('tables/all_tables', compact('user') );
    }

    public function goroh_table(){

        $goroh = new GorohTable;

        $goroh = $goroh->paginate(10);

        $user = auth()->user();

        return view('tables/goroh_table', compact('goroh', 'user') );
    }
}
