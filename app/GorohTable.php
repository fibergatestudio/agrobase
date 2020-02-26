<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GorohTable extends Model
{
    protected $table = "gorohtable";

    protected $fillable = [
        'title', 'region', 'area', 'supervisor', 'landline_phone', 'mobile_phone', 'fax', 'concil_number', 'land_bank', 'egrpou', 'address', 'email_website' 
    ];
}
