<?php

namespace App\Imports;

use App\GorohTable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportGoroh implements ToModel , WithStartRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GorohTable([
            'sender_egrpou'           => isset($row[0]) ? $row[0] : null,
            'sender_name'             => isset($row[1]) ? $row[1] : null,
            'sender_address'          => isset($row[2]) ? $row[2] : null,
            'recipient_name'          => isset($row[3]) ? $row[3] : null,
            'recipient_address'       => isset($row[4]) ? $row[4] : null,
            'contract_holder'         => isset($row[5]) ? $row[5] : null,
            'contract_address'        => isset($row[6]) ? $row[6] : null,
            'declarant_egrpou'        => isset($row[7]) ? $row[7] : null,
            'product_code'            => isset($row[8]) ? $row[8] : null,
            'product_descr'           => isset($row[9]) ? $row[9] : null,
            'trading_country'         => isset($row[10]) ? $row[10] : null,
            'destination_country'     => isset($row[11]) ? $row[11] : null,
            'delivery_conditions'     => isset($row[11]) ? $row[11] : null,
            'delivery_place'          => isset($row[11]) ? $row[11] : null,
            'rvf_usd'                 => isset($row[11]) ? $row[11] : null,
        ]);

        
    }
    // public function sheets(): array
    // {
    //     return [
    //         // Select by sheet index
    //         0 => new pricelist_items(),
    //     ];
    // }

    public function startRow(): int
    {
        return 2;
    }
}
