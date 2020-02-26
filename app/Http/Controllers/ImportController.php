<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Excel;
use File;
use App\Imports\ImportAgrotest;
use App\Imports\ImportGoroh;

class ImportController extends Controller
{
    public function index(){

        return view('import.index');
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $import = Excel::import(new ImportAgrotest, $path);

        return back()->with('success', 'Данные успешно импортированы!');
    }

    function import_directory()
    {

        $files = File::allFiles(storage_path('import')); 


        foreach($files as $file){
            $filename = $file->getFileName();
            if($filename = "test_imp.xlsx"){
                //$import = Excel::import(new ImportAgrotest, storage_path('import/' . $filename));
            } else if($filename == "goroh.xlsx"){
                $import = Excel::import(new ImportGoroh, storage_path('import/' . $filename));
            }
        }

        //$import = Excel::import(new ImportAgrotest, storage_path('import/test_imp.xlsx'));

        return redirect('/tables')->with('success', 'Данные успешно импортированы!');
    }
}
