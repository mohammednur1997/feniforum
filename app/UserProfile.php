<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{


	// protected $table = 'user_profiles';
    
		protected $fillable = [


		'user_id', 'full_name','member_id','mobile', 'mobile_work', 'father_name', 'upozila_id', 'union_id', 'state_id', 'mother_name','present_address','parmanent_address','email','dob','blood_group','occapation','marital_status', 'db_status', 'status','payment_status','commte','member_position',
		'org_relation','org_name','applyer_sign','applyer_photo','referane_name','payment_document','referane_id','join_date','member_type',

		];


		public function Union() {
			return $this->hasOne(Union::class, 'id', 'union_id');
		}
		
		public function Upozila() {
			return $this->hasOne(Upozila::class, 'id', 'upozila_id');
		}

		public function State() {
			return $this->hasOne(State::class, 'id', 'state_id');
		}

	
	/*	public  function commte() {
			return $this->belongsTo(Committee::class, 'commte');
		}*/

}
