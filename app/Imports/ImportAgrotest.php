<?php

namespace App\Imports;

use App\AgroTable;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAgrotest implements ToModel
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AgroTable([
            'title'             => isset($row[0]) ? $row[0] : null,
            'region'            => isset($row[1]) ? $row[1] : null,
            'area'              => isset($row[2]) ? $row[2] : null,
            'supervisor'        => isset($row[3]) ? $row[3] : null,
            'landline_phone'    => isset($row[4]) ? $row[4] : null,
            'mobile_phone'      => isset($row[5]) ? $row[5] : null,
            'fax'               => isset($row[6]) ? $row[6] : null,
            'concil_number'     => isset($row[7]) ? $row[7] : null,
            'land_bank'         => isset($row[8]) ? $row[8] : null,
            'egrpou'            => isset($row[9]) ? $row[9] : null,
            'address'           => isset($row[10]) ? $row[10] : null,
            'email_website'     => isset($row[11]) ? $row[11] : null,
        ]);

        
    }

    public function headingRow(): int
    {
        return 0;
    }
}
