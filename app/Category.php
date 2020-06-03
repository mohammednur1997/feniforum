<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [

    	'category_name','description','category_parent','parent_id','status','db_status'
    ];
}
