<?php

namespace App\Http\Controllers\MemberAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration;
use App\Member;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/member/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         
        $this->middleware('member.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('member.auth.login');
    }

	 public function username()
    {
        return 'username';
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

     public function login(Request $request)
    {

       $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

       $user = Member::where('email', $request->email)->first();
       if (!$user) {
           session()->flash('message', 'Wrong Email');
            return back();
         }
      

        if (Auth::guard('member')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
           return redirect('/member/home')/*->intended(route('index'))*/;

        }else{
            session()->flash('message', 'Wrong Password');
            return back();
        }
    
     }
	 

     public function logout(Request $request)
     {
         Auth::guard('member')->logout();
        return redirect()->route('member.login');
     }


}
