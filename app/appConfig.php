<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appConfig extends Model
{
   

    protected $fillable = [
        'setting', 'value', 
    ];
}
