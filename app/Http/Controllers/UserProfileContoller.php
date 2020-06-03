<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\User;
use App\Member;
use Session;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UserProfileContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mem = UserProfile::orderBy('id', 'desc')->where('db_status','Live')->paginate(15);
        return view ('admin.member.index',['member'=>$mem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.member.create');
    }

    public function search(Request $request){
          
           if ($request->search) {
            $search = Session::put('search', $request->search);
             $member = UserProfile::orWhere('full_name', 'like', '%'.$request->search.'%')
                 ->orWhere('member_id', 'like', '%'.$request->search.'%')
                 ->orWhere('mobile', 'like', '%'.$request->search.'%')
                 ->orWhere('mobile_work', 'like', '%'.$request->search.'%')
                 ->orWhere('father_name', 'like', '%'.$request->search.'%')
                 ->orWhere('mother_name', 'like', '%'.$request->search.'%')
                 ->orWhere('present_address', 'like', '%'.$request->search.'%')
                 ->orWhere('parmanent_address', 'like', '%'.$request->search.'%')
                 ->orWhere('blood_group', 'like', '%'.$request->search.'%')
                 ->orderBy('id', 'desc')
                 ->paginate(15);
          return view('admin.member.index', ['member'=>$member]);       
        }else{
            $search = Session::get('search');
            $member = UserProfile::orWhere('full_name', 'like', '%'.$search.'%')
                 ->orWhere('member_id', 'like', '%'.$search.'%')
                 ->orWhere('mobile', 'like', '%'.$search.'%')
                 ->orWhere('mobile_work', 'like', '%'.$search.'%')
                 ->orWhere('father_name', 'like', '%'.$search.'%')
                 ->orWhere('mother_name', 'like', '%'.$search.'%')
                 ->orWhere('present_address', 'like', '%'.$search.'%')
                 ->orWhere('parmanent_address', 'like', '%'.$search.'%')
                 ->orWhere('blood_group', 'like', '%'.$search.'%')
                 ->orderBy('id', 'desc')
                 ->paginate(15);
           return view('admin.member.index', ['member'=>$member]);      
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $this->validate($request,[
            'full_name' => 'required',
            'mobile' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'password' => 'required|',
            'email' => 'required|email|max:255|unique:members',
            'agree' => 'required',
            'applyer_photo'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

        $excep = Input::except('_token', 'applyer_photo');
        if ($request->hasFile('applyer_photo')){
            $applyer_photo = $request->applyer_photo->hashName();
            $request->applyer_photo->move(('upload/images/member'), $applyer_photo);
        }

        $userprofile = UserProfile::create($excep + ['applyer_photo' => $applyer_photo]);

        $member = new Member;
        $member->full_name = $request->full_name;
        $member->email = $request->email;
        $member->mobile = $request->mobile;
        $member->password = Hash::make($request->password);
        $member->user_type = 'member';
        $member->profile_id = $userprofile->id;
        $member->save();

        /*$member = Member::create([
                'full_name'=>$request->full_name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'mobile_work'=>$request->mobile_work,
                'password'=>Hash::make($request->password),
                'user_type'=>'member',
                'profile_id'=>$userprofile->id,
          ]);*/

        session()->flash('message','Member Created Successfully');
       return redirect()->back();
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
        $mem = UserProfile::find($id);
       return view('admin.member.edit',['member'=>$mem]);
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

		   $this->validate($request,[
            'full_name' => 'required',
            'mobile' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
			'applyer_photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
			'payment_document'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);
		
		 $excep = Input::except('_token', 'applyer_photo', 'applyer_sign', 'payment_document');
		 
		 $applyer_photo= "";
		 $payment_document= "";

        if ($request->hasFile('applyer_photo')){
           $userprofile = UserProfile::find($id);

             if (File::exists('upload/images/member/'.$userprofile->applyer_photo)) 
            {
             File::delete('upload/images/member/'.$userprofile->applyer_photo);
             }

            $applyer_photo = $request->applyer_photo->hashName();
            $request->applyer_photo->move(('upload/images/member'), $applyer_photo);
            $userprofile = UserProfile::find($id)->update($excep + ['applyer_photo' => $applyer_photo]);
        }else {
            $userprofile = UserProfile::find($id)->update($excep);
        }


        $member = Member::where('profile_id', $id)->first();
        $member_id = $member->id; 

        $memberup = Member::find($member_id);
        $memberup->email = $request->email;
        $memberup->password = Hash::make($request->password);
        $memberup->save();


		session()->flash('message','Member Update Successfully');
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

       //delete data from member table
           $member = Member::where('profile_id', $id)->first();
              if (!is_null($member)){
                  $member_id = $member->id;
                  $memberup = Member::find($member_id);
                  if (!is_null($memberup)) {
                      $memberup->delete();
                  }
                  //delete data form userprofile
                  $userprofile = UserProfile::find($id);

                  if (!is_null($userprofile)) {

                      if (File::exists('upload/images/member/'.$userprofile->applyer_photo))
                      {
                          File::delete('upload/images/member/'.$userprofile->applyer_photo);
                      }

                      if (File::exists('upload/images/payment_document/'.$userprofile->payment_document))
                      {
                          File::delete('upload/images/payment_document/'.$userprofile->payment_document);
                      }

                      $userprofile->delete();
                  }

              }else{
                  //delete data form userprofile
                  $userprofile = UserProfile::find($id);

                  if (!is_null($userprofile)) {

                      if (File::exists('upload/images/member/'.$userprofile->applyer_photo))
                      {
                          File::delete('upload/images/member/'.$userprofile->applyer_photo);
                      }

                      if (File::exists('upload/images/payment_document/'.$userprofile->payment_document))
                      {
                          File::delete('upload/images/payment_document/'.$userprofile->payment_document);
                      }

                      $userprofile->delete();
                  }
              }

        session()->flash('message','Member Delete Successfully');   
        return back();
    }
	
	 public function approv($id)
    {

      $member_id =  UserProfile::orderBy('member_id', 'desc')->first();
      $memberid = $member_id->member_id+1;

      $mem = UserProfile::find($id);
	  $mem->status = 20;
	  $mem->member_id = $memberid;
	  $mem->save();
	  
	   session()->flash('message','Member Approve Successfully');
       return redirect()->back();
    }
}
