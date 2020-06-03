<?php

namespace App\Http\Controllers\MemberAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Notifications\message;
use Illuminate\Http\Request;
use App\Member;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('member.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('member.auth.passwords.email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('members');
    }

    public function sendResetLinkEmail(Request $request)
    {
      /*dd($request);*/
     $member = Member::where("email", $request->email)->first();
     $member_token = $member->remember_token; 

     if (!is_null($member)) {
             $member->notify(new message($member_token));

        session()->flash('message', 'A new Reset Password link email sent to your mailbox..');
           return redirect()->route('member.password.request');
         }else{
         session()->flash('message', 'We Do not find Your Email, Please register First');
          return redirect()->route('member.password.request');
       }
    }

    
}
