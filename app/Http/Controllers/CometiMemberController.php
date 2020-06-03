<?php

namespace App\Http\Controllers;

use App\cometiMember;
use App\Committee;
use App\UserProfile;
use App\Diganation;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class CometiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $comtcategory = Committee::get();
         $Diganation = Diganation::where('db_status','Live')->get();
         $memberlist = UserProfile::where('status', 20)->paginate(15);
        return view('admin.cmtmember.index', ['cmttype'=>$memberlist,'Diganation'=>$Diganation,'memr'=>$memberlist]);

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comtcategory = Committee::where('db_status','Live')->get();
        $Diganation = Diganation::where('db_status','Live')->get();
        $memberlist = UserProfile::where('db_status','Live')->get();

        return view('admin.cmtmember.create', ['cmttype'=>$comtcategory,'Diganation'=>$Diganation,'memr'=>$memberlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//ALTER TABLE `cometi_members` ADD `from_year` VARCHAR(128) NULL AFTER `comite`, ADD `to_year` VARCHAR(128) NULL AFTER `from_year`;
        
        $this->validate($request,[
            'name' => 'required',
        ]);

        $excep = Input::except('_token', 'image', 'member' , 'designation');
		
		$member = json_encode($request->member);
		$designation = json_encode($request->designation);
       
        cometiMember::create($excep + ['member_id'=>$member, 'designation'=>$designation]);
        session()->flash('message','Committee Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cometiMember  $cometiMember
     * @return \Illuminate\Http\Response
     */
    public function show(cometiMember $cometiMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cometiMember  $cometiMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $comtcategory = Committee::where('db_status','Live')->get();
        $Diganation = Diganation::where('db_status','Live')->get();
        
        $memberlist = UserProfile::where('db_status','Live')->get();
		
		 $committeemember=cometiMember::find($id);

        return view('admin.cmtmember.edit', ['committeemember'=>$committeemember,'cmttype'=>$comtcategory,'Diganation'=>$Diganation,'memr'=>$memberlist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cometiMember  $cometiMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
        ]);


         $excep = Input::except('_token', 'image', 'member' , 'designation');
		
		$member = json_encode($request->member);
		$designation = json_encode($request->designation);
           
        cometiMember::find($id)->update($excep + ['member_id'=>$member, 'designation'=>$designation]);

        session()->flash('message',' Update Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cometiMember  $cometiMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = cometiMember::find($id);

        $item->db_status = 'Deleted';
        $item->save();
        session()->flash('message','Committee Delete Successfully');
        return redirect()->back();
           
    }
}
