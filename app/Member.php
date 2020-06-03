<?php

namespace App;
use Laravelista\Comments\Commenter;
use App\Notifications\MemberResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable, Commenter;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'profile_id', 'full_name', 'username', 'mobile', 'user_type', 'last_login', 'last_ip', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MemberResetPassword($token));
    }

     public function identities() {

       return $this->hasMany('App\SocialIdentity');

    }

}
