<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
 protected $fillable = ['camp_id','donation_type','amount','donation_holder','donation_mobile',	'donation_email',
 'donation_location','payment_type','donation_photo','donation_slip','status','db_status']; 

}
