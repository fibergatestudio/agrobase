<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\AgroTable;
use App\GorohTable;
use App\Tables;

class TablesController extends Controller
{
    // Главная страница таблиц
    public function index_old(){

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


        return view('tables/index_old', compact('agro', 'regions', 'areas', 'user', 'f_region', 'f_area'));

    }

    public function index($table_id){

        //Текущий пользователь
        $user = auth()->user();

        //Общая инфа о таблице
        $table_info = DB::table('table_imports')->where('id', $table_id)->first();
        $table_name = $table_info->database_table_name;

        $table_head_columns = $this->getTableColumns($table_name);

        //*** ФИЛЬТРЫ ***//
        $table_rows = DB::table($table_name);
        $queries = [];

        // $columns = [
        //     'title', 'region', 'area', 'supervisor', 
        //     'landline_phone', 'mobile_phone', 'fax', 
        //     'concil_number', 'land_bank', 'egrpou', 
        //     'address', 'email_website'
        // ];

        foreach($table_head_columns as $column){
            if(request()->has($column)){
                $table_rows = $table_rows->where($column, request($column));
                $queries[$column] = request($column);
            }
        }

        if(request()->has('sort')){
            $table_rows = $table_rows->orderBy('id', request('sort'));
            $queries['sort'] = request('sort');
        }

        //Уникальные фильтры

        $table_columns_arr = DB::getSchemaBuilder()->getColumnListing($table_name);
        if(in_array('oblast', $table_columns_arr)){
            //dd("True");
            //Регионы
            $regions = DB::table($table_name)->select('oblast')->distinct()->get();
            //Области
            $areas = DB::table($table_name)->select('rayon')->whereNotNull('rayon')->distinct()->get();

        } else {
            //dd("False");
        }
        //dd($test);


        //Для дропдаунов
        if(request()->has('oblast')){
            $f_region = request('oblast');
        } else {
            $f_region = '';
        }
        if(request()->has('rayon')){
            $f_area = request('rayon');
        } else {
            $f_area = '';
        }

        //dd($queries);

        $table_rows = $table_rows->paginate(20)->appends($queries);
        //*** END ФИЛЬТРЫ ***//

        $table_heads_text = json_decode($table_info->head_names);
        //dd($table_heads_text);

        $table_columns_arr = DB::getSchemaBuilder()->getColumnListing($table_name);
        if(in_array('oblast', $table_columns_arr)){
            //dd("True");
            //Регионы
            $regions = DB::table($table_name)->select('oblast')->distinct()->get();
            //Области
            $areas = DB::table($table_name)->select('rayon')->whereNotNull('rayon')->distinct()->get();

            return view('tables/index', compact('user', 'table_info', 'table_head_columns', 'table_rows', 'table_id', 'regions', 'areas', 'f_region', 'f_area', 'table_heads_text'));

        } else {
            //dd("False");
            return view('tables/index_international', compact('user', 'table_info', 'table_head_columns', 'table_rows', 'table_id', 'f_region', 'f_area', 'table_heads_text'));

        }

        //return view('tables/index', compact('user', 'table_info', 'table_head_columns', 'table_rows', 'table_id', 'regions', 'areas', 'f_region', 'f_area', 'table_heads_text'));
    }

    // public function checkColumnExist($column_name){



    //     return true;
    // }

    public function all_tables(){

        $user = auth()->user();

        $tables_ua = DB::table('table_imports')->where('location', 'UA')->get();


        return view('tables/all_tables', compact('user', 'tables_ua') );
    }

    public function all_tables_international(){

        $user = auth()->user();

        $tables_en = DB::table('table_imports')->where('location', 'EN')->get();


        return view('tables/all_tables_international', compact('user', 'tables_en') );

    }

    public function goroh_table(){

        $goroh = new GorohTable;

        $goroh = $goroh->paginate(10);

        $user = auth()->user();

        return view('tables/goroh_table', compact('goroh', 'user') );
    }

    public function goroh_import(){

        return view('import/goroh_import' );
    }

    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);

        // OR

        return Schema::getColumnListing($table);

    }
}
