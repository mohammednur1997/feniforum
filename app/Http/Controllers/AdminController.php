<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMessage;
use Auth;
use App\Admin;
use App\Contact;
use Image;
use File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		 $page = Input::get('page');
         return view('admin.useful_page.index', [ 'page' => $page ]);
    }

    public function messageSend(Request $request)
    {
         $to_name = $request->form_name;
         $to_subject = $request->form_subject;
         $to_body = $request->form_message;
         $to_email = $request->form_email;
    

        $data = array(
            'subject'   => $to_subject,
            'name'      =>  $to_name,
            'email'      =>  $to_email,
            'message'   =>   $to_body
        );


     Mail::to($to_email)->send(new sendMessage($data, $to_email, $to_subject));

         
       /* $data = array('name' => $to_name, 'body' => $to_body);
      Mail::send(['emails'=>'reset_set'], $data, function ($message) use ($to_name, $to_email, $to_subject) {
        $message->to($to_email, $to_name)
                ->subject($to_subject);
        $message->from("programmingtest1997@gmail.com", "Ksa_FeniForm"); 

       });*/

         session()->flash('message', 'Mail Send Successfully'); 
          return redirect()->back();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function createUser(){
         $admin = Admin::get();
        return view('admin.auth.createUser', compact('admin'));
    }
    public function setting(){
        return view('admin.auth.accountSetting');
    }

    public function changePassword()
    {
         return view('admin.auth.changePassword');
    }

    public function changePasswordStore(Request $request)
    {
           $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                ]);

            $admin = Admin::find($request->id); 
            $admin->password = Hash::make($request->password);
            $admin->save();

          session()->flash('message', 'Your Password Change Successfully'); 
          return redirect()->back();

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response  
     */ 
    public function store(Request $request)
    {
        $this->validate($request, [
                    'admin_name' => 'required|max:255|unique:admins',
                    'email' => 'required|email|max:255|unique:admins',
                    'admin_type' => 'required',
                    'password' => 'required|min:6|confirmed',
                    'photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
                ]);

          $admin = new Admin;
          $admin->admin_name = $request->admin_name;
          $admin->admin_type = $request->admin_type;
          $admin->email = $request->email;
          $admin->remember_token = $request->_token;
          $admin->password = Hash::make($request->password);
          $admin->save();

           if($request->photo > 0)
              {  
                if (File::exists('upload/images/user/'. $admin->admin_image)) {
                    File::delete('upload/images/user/'. $admin->admin_image);
                }

                $image = $request->photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/user/'.$img);
                Image::make($image)->save($location);
                $admin->admin_image = $img;
                $admin->save();
              }

          session()->flash('message', 'User Create Successfully'); 
          return redirect()->back();

    }


    public function accountStore(Request $request)
    {
         $this->validate($request, [
                    'admin_name' => 'required|max:255|unique:admins',
                    'email' => 'required|email|max:255|unique:admins',
                    'photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
                ]);


          $admin = Admin::find($request->id);
          $admin->admin_name = $request->admin_name;
          $admin->email = $request->email;
          $admin->save();

           if($request->photo > 0)
              {  
                if (File::exists('upload/images/user/'. $admin->admin_image)) {
                    File::delete('upload/images/user/'. $admin->admin_image);
                }

                $image = $request->photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/user/'.$img);
                Image::make($image)->save($location);
                $admin->admin_image = $img;
                $admin->save();
              }

          session()->flash('message', 'profile Update Successfully'); 
          return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inbox()  
    {
          $seen = Contact::where('seen', 1)->get();
          $unseen = Contact::where('seen', 2)->get();
         return view('admin.auth.inbox', compact('seen', 'unseen'));
    }

    public function seen($id)
    {
       $seen = Contact::find($id);
        if(!is_null($seen))
          {  
            $seen->seen = 1;
            $seen->save();
          }

          session()->flash('message', 'You seen this messgae'); 
          return redirect()->back();
    }

     public function unseen($id)
    {
       $unseen = Contact::find($id);
        if(!is_null($unseen))
          {  
            $unseen->seen = 2;
            $unseen->save();
          }

          session()->flash('message', 'You Unseen this messgae'); 
          return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                    'admin_name' => 'max:255',
                    'email' => 'email|max:255',
                    'photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
                    'password' => 'confirmed',
                ]);


          $admin = Admin::find($id);
          $admin->admin_name = $request->admin_name;
          $admin->email = $request->email;
          $admin->password = Hash::make($request->password);
          $admin->save();

           if($request->photo > 0)
              {  
                if (File::exists('upload/images/user/'. $admin->admin_image)) {
                    File::delete('upload/images/user/'. $admin->admin_image);
                }

                $image = $request->photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/user/'.$img);
                Image::make($image)->save($location);
                $admin->admin_image = $img;
                $admin->save();
              }

          session()->flash('message', 'User Update Successfully'); 
          return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $admin = Admin::find($id);
        if(!is_null($admin))
          {  
                if (File::exists('upload/images/user/'. $admin->admin_image)) {
                    File::delete('upload/images/user/'. $admin->admin_image);
                }

                $admin->delete();
              }

          session()->flash('message', 'User Delete Successfully'); 
          return redirect()->back();

    }
    public function destroymsg($id)
    {
      $Contact = Contact::find($id);
      if (!is_null($Contact)) {
          $Contact->delete();
      }
       session()->flash('message', 'Message Delete Successfully'); 
          return redirect()->back();
    }
}
