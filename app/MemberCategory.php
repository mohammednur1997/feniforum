<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    protected $fillable = [
	'name', 'note'
	];
}
