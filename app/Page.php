<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $fillable = [ 'name',	'page_url',	'page_details',	'db_status'];
}
