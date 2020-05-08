<?php

namespace App\Imports;

use DB;
use App\AgroTable;
use App\TableRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportRows implements ToModel , WithStartRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function  __construct($random_name,$headings_array)
    {
        $this->random_name= $random_name;
        $this->headings_array = $headings_array;
        //dd($report_id);
    }

    public function model(array $row)
    {
        //dd($this->report_id);

        //$this->random_name

        //dd($this->headings_array);

        $headings = $this->headings_array;
        $headings_count = count($headings);
        //dd(count($headings));

        $index = 0;

        $data = array();

        foreach($headings as $head){
            $data[$head] = isset($row[$index]) ? $row[$index] : null;
            $index++;

        }

        DB::table($this->random_name)->insert($data);


        // $new_row = new $this->random_name();
        // $new_row->rows = json_encode($row, JSON_UNESCAPED_UNICODE );
        // $new_row->parent_id = $this->parent_id;
        // $new_row->save();

        //dd($new_row);
        
    }

    public function startRow(): int
    {
        return 2;
    }
}
