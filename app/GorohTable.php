<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GorohTable extends Model
{
    protected $table = "gorohtable";

    protected $fillable = [
        'sender_egrpou', 'sender_name', 'sender_address', 'recipient_name', 'recipient_address', 
        'contract_holder', 'contract_address', 'declarant_egrpou', 'product_code', 'product_descr', 
        'trading_country', 'destination_country', 'delivery_conditions', 'delivery_place', 'rvf_usd'
    ];
}
