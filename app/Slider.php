<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [

	'bold_text','mid_text','small_text','image', 'db_status'

    ];
}
