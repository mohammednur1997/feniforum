<?php

namespace App;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
       use Commentable;

   protected $guarded = [];

    public function author() {
        return $this->belongsTo('App\Admin')->first();
    }
	
	public function category() {
		
        return $this->belongsTo('App\Blogcategory', 'cat_id');
    }

}
