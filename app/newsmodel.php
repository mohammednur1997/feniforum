<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsmodel extends Model
{
    //

    protected $fillable = [

    	'title', 'news_image', 'auth_id', 'description', 'db_status'	
    ];
}
