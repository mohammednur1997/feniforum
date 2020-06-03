<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompleteEvent extends Model
{
    //

    public function evetnIamge()
    {
    	return $this->hasMany('App\EventImage', 'campaing_id', 'campaing_photogellary');
    }
}
