<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Upozila;

class Union extends Model
{
   protected $fillable = ['upozila_id' , 'name','note'];
   
 
	
	 public function upozilaName()
    {
        return $this->hasOne(Upozila::class, 'id', 'upozila_id');
    }

	
}
