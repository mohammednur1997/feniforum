<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use App\Blog;
use App\Member;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
class MemberPanel extends Controller
{
     public function blogAdd()
    {

        $blogcat = BlogCategory::where('db_status','live')->get();
         return view('member.blog.create', ['blogcetname'=>$blogcat]);
    }
	
	public function blogStore(Request $request)
    {
        //

          $this->validate($request,[
            'blog_title' => 'required',
            'blog_description' => 'required',
            'fet_image'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

        $auth_id = Auth::guard('member')->user()->id;
        $usertype = 'member';
        $status = 2;


        $excep = Input::except('_token', 'fet_image');

          if ($request->hasFile('fet_image')){
            $fet_image = $request->fet_image->hashName();
            $request->fet_image->move(('upload/images/blog'), $fet_image);
        }
        Blog::create($excep + ['fet_image' => $fet_image, 'auth_id'=>$auth_id,'user_type'=>$usertype, 'status'=>$status]);

        session()->flash('message','Blog Created Successfully');
        return redirect()->back();
    }

    public function userchangePassword(Request $request){

          $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                ]);

          $member = Member::find($request->id);
          $member->password = Hash::make($request->password);
          $member->save();

          session()->flash('message', 'Your Password Change Successfully'); 
          return redirect()->back();
      }

      public function account()
      {
         return view('member.profile');
      }

      public function update(Request $request)
      {

             $this->validate($request, [
                    'full_name' => 'required|max:255|unique:members',
                    'email' => 'required|email|max:255|unique:members',
                    'photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
                ]);


          $member = Member::find($request->id);
          $member->full_name = $request->full_name;
          $member->email = $request->email;
          $member->save();

           if($request->photo > 0)
              {  
                if (File::exists('upload/images/user/'. $member->member_image)) {
                    File::delete('upload/images/user/'. $member->member_image);
                }

                $image = $request->photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/user/'.$img);
                Image::make($image)->save($location);
                $member->member_image = $img;
                $member->save();
              }

          session()->flash('message', 'profile Update Successfully'); 
          return redirect()->back();
      }
   
}
