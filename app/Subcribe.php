<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcribe extends Model
{
  
   
    protected $fillable = [ 'email',	'ip_address','browser' ];
}
