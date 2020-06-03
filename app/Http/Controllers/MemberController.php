<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class MemberController extends Controller
{
    /**dfg
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showRegistrationForm()
    {
        return view('member.auth.register');
    }

      public function myRegister(Request $request)
      {

               $this->validate($request, [
                    'full_name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:members',
                    'password' => 'required|min:6|confirmed',
                    'photo'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
                ]);

               $member = new Member;
               $member->full_name = $request->full_name;
               $member->email = $request->email;
               $member->password = Hash::make($request->password);
               $member->save();

               //Upload donar photo in server and database
               if($request->photo)
               {  
                $image = $request->photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/user/'.$img);
                Image::make($image)->save($location);
                $member->member_image = $img;
                $member->save();
              }

           

         session()->flash('message', 'User Create Successfull, Try to Login Now'); 
          return redirect()->back();

      }

      public function passwordForm()
      {
        return view('member.changePassword');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
       
    }
}
