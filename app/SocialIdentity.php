<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialIdentity extends Model
{
     protected $fillable = ['user_id', 'provider_name', 'provider_id'];

    public function member() {
        return $this->belongsTo('App\Member');
    }
}
