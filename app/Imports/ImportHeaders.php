<?php

namespace App\Imports;

use App\AgroTable;
use App\TableHeads;
use App\Tables;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithLimit;

class ImportHeaders implements ToModel , WithStartRow, WithLimit
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct($random_name)
    {
        $this->random_name= $random_name;
        //$this->headingRow = $headingRow;
    }


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 1;
    }

    /**
     * @return int
     */
    public function limit(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        //dd($this->random_name);
        //dd(json_encode($row, JSON_UNESCAPED_UNICODE ));

        DB::table('table_imports')->where('database_table_name', $this->random_name)->update([
            'head_names' => json_encode($row, JSON_UNESCAPED_UNICODE ),
        ]);

        // $new_headers = new TableHeads();
        // $new_headers->columns = json_encode($row, JSON_UNESCAPED_UNICODE );
        // $new_headers->save();

        // return new TableHeads([
        //     'columns' => json_encode($row, JSON_UNESCAPED_UNICODE ), //isset($row[0]) ? $row[0] : null,
        // ]);
    }
}
