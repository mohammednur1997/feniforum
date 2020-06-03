<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [

    	'category',	'gallery_name',	'gallery_image',	'gallery_note',	'db_status'
    ];
}
