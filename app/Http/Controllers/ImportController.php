<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Excel;
use File;
use App\Imports\ImportAgrotest;
use App\Imports\ImportGoroh;
use App\Imports\ImportHeaders;
use App\Imports\ImportRows;
use App\Tables;
use App\TableHeads;
use Illuminate\Support\Str;

//Создание таблиц
use Illuminate\Support\Facades\Schema;

use Maatwebsite\Excel\HeadingRowImport;


class ImportController extends Controller
{
    public function index(){

        $test_headers = DB::table('table_imports')->get();

        return view('import.index', compact('test_headers'));
    }

    function import(Request $request){

        $random_name = Str::random(12);

        //Создаем Главную таблицу
        $new_table = new Tables();
        $new_table->save();

        try {

            $this->validate($request, [
                'select_file'  => 'required|mimes:xls,xlsx'
            ]);

            //dd($path);
            $filename = $request->file('select_file')->getClientOriginalName();

            $filename = str_replace(array('.xlsx','.xls'), '', $filename);
            //dd($filename);


            $headings = (new HeadingRowImport)->toArray($request->file('select_file'));
            $headings_array = array_filter($headings[0][0]);
            //dd($headings_array);

            Schema::create($random_name, function($table) use ($headings_array)
            {
                $table->increments('id');
                foreach($headings_array as $heading){
                    $table->text($heading)->nullable();
                }
            });

            $import_rows = Excel::import(new ImportRows($random_name,$headings_array), $request->file('select_file'));

            $last_table = DB::table('table_imports')->where('id', $new_table->id)->update([
                'table_name' => $filename,
                'database_table_name' => $random_name,
                'location' => 'UA',
            ]);

            $import_heads = Excel::import(new ImportHeaders($random_name), $request->file('select_file'));
            
            return back()->with('success', 'Данные успешно импортированы!');

        } catch (\Exception $e) {
            //report($e);

            DB::table('table_imports')->where('id', $new_table->id)->delete();

            Schema::dropIfExists($random_name);
    
            //return false;
            
            return back()->with('success', 'Ошибка!');
        }


    }

    public function index_international(){

        //$test_headers = DB::table('table_imports')->get();

        return view('import.index_international');
    }

    function import_international(Request $request){

        $random_name = Str::random(12);

        //Создаем Главную таблицу
        $new_table = new Tables();
        $new_table->save();

        try {

            $this->validate($request, [
                'select_file'  => 'required|mimes:xls,xlsx'
            ]);

            //dd($path);
            $filename = $request->file('select_file')->getClientOriginalName();

            $filename = str_replace(array('.xlsx','.xls'), '', $filename);
            //dd($filename);


            $headings = (new HeadingRowImport)->toArray($request->file('select_file'));
            $headings_array = array_filter($headings[0][0]);
            //dd($headings_array);

            Schema::create($random_name, function($table) use ($headings_array)
            {
                $table->increments('id');
                foreach($headings_array as $heading){
                    $table->text($heading)->nullable();
                }
            });

            $import_rows = Excel::import(new ImportRows($random_name,$headings_array), $request->file('select_file'));

            $last_table = DB::table('table_imports')->where('id', $new_table->id)->update([
                'table_name' => $filename,
                'database_table_name' => $random_name,
                'location' => 'EN',
            ]);

            $import_heads = Excel::import(new ImportHeaders($random_name), $request->file('select_file'));
            
            return back()->with('success', 'Данные успешно импортированы!');

        } catch (\Exception $e) {
            //report($e);

            DB::table('table_imports')->where('id', $new_table->id)->delete();

            Schema::dropIfExists($random_name);
    
            //return false;
            
            return back()->with('success', 'Ошибка!');
        }


    }

    // function import(Request $request)
    // {
    //     $this->validate($request, [
    //         'select_file'  => 'required|mimes:xls,xlsx'
    //     ]);

    //     $path = $request->file('select_file')->getRealPath();

    //     $import = Excel::import(new ImportAgrotest, $path);

    //     return back()->with('success', 'Данные успешно импортированы!');
    // }

    function import_goroh(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $import = Excel::import(new ImportGoroh, $path);

        return back()->with('success', 'Данные успешно импортированы!');
    }

    function import_directory()
    {
        $files = File::allFiles(storage_path('import')); 

        foreach($files as $file){
            $filename = $file->getFileName();
            if($filename = "test_imp.xlsx"){

                DB::table('agrotest')->truncate();
                $import = Excel::import(new ImportAgrotest, storage_path('import/' . $filename));
            } 
            if($filename == "goroh.xlsx"){

                dd($filename);
                DB::table('gorohtable')->truncate();
                $import = Excel::import(new ImportGoroh, storage_path('import/' . $filename));
            }
        }
        return redirect('/kharkiv')->with('success', 'Данные успешно импортированы!');
    }
}
