<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Excel;
use App\Imports\ImportAgrotest;

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
}
