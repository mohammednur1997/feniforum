<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
    	
    	'form_name','form_email','form_phone','form_subject','form_message','db_status'
    ];
}
