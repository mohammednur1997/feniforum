<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaing extends Model
{
    


   protected $fillable = [
        'title','campaing_category','campaing_photo','campaing_description','campaing_video','campaing_photogellary',
    'campaing_start_date','campaing_end_date','duration','goal_amount', 'charity_status', 'end_type','add_to_feature','campaing_location','type', 'db_status'
    ];

    public function evetnIamge()
    {
    	return $this->hasMany('App\EventImage');
    }
    
   
    
}
