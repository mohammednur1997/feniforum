<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\committeeMemberList;
use App\Years;
use App\State;
use App\Committee;
use App\Protinidi;
use App\CentralProtinidi;

class CommitteeMemberListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committeeMemberLists = committeeMemberList::orderBy('priority', 'desc')->get();
        return view('frontsite.member_list_style_3', compact('committeeMemberLists'));
    }

    public function committeeListPage()
    {
        return view('admin.cmtmember.committeeMemberListPage');
    }

    public function committeeList($commitee_id)
    {
        if ($commitee_id==4) {
          $cmttype = Committee::get();
       return view('admin.cmtmember.commiteeYear', compact('cmttype', 'commitee_id'));
        }else{
          $cmttype = Committee::get();
       return view('admin.cmtmember.commiteeYear', compact('cmttype', 'commitee_id'));
        }
        
    }

     public function committeeMemberByYear($commitee_id, $year_id)
    {

        if ($commitee_id==4) {
           $commiteeName = Committee::where('id', $commitee_id)->first();
          $cmttype = Committee::get();
          $committeeMemberLists = committeeMemberList::orderBy('priority', 'asc')
                                    ->where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                      ])->get();
       return view('admin.cmtmember.PradesikCommiteeList', compact('committeeMemberLists', 'commiteeName'));
        }else{
          $commiteeName = Committee::where('id', $commitee_id)->first();
          $cmttype = Committee::get();
          $committeeMemberLists = committeeMemberList::orderBy('priority', 'asc')
                                ->where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                      ])->get();
       return view('admin.cmtmember.committeeMemberList', compact('committeeMemberLists', 'cmttype', 'commitee_id', 'commiteeName'));
        }
        
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function ShowYear($commitee_id)
      {
        // get last id
        $get_lastYearName = Years::get()->last()->name;
        $get_lastYearId = Years::get()->last()->id;
       if ($commitee_id == 3) {
       $first_member = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $get_lastYearId],
                                        ['priority',  1],
                                      ])->first();
                                   

 
       $second_member = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $get_lastYearId],
                                        ['priority',  2],
                                      ])->first();      

       $committeeMemberLists = committeeMemberList::orderBy('priority', 'asc')
                              ->where([
                              ['committe_type', $commitee_id],
                              ['committe_year',  $get_lastYearId],
                              ])->skip(2)
                             ->take(50)
                             ->get();


          $committees = Committee::where('id', $commitee_id)->first();

        return view('frontsite.member_list_style_4', compact('committeeMemberLists', 'first_member', 'second_member', 'committees', 'get_lastYearName'));

      }elseif ($commitee_id == 4) {

        $committees = Committee::where('id', $commitee_id)->first();
        $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $get_lastYearId],
                                      ])->get();
       return view('frontsite.member_list_style_5', compact( 'committees', 'committeeMemberLists', 'get_lastYearName'));
       
      }elseif ($commitee_id == 5){

        $committees = Committee::where('id', $commitee_id)->first();
        $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $get_lastYearId],
                                      ])->get();
        return view('frontsite.uddukktaCommitee', compact('committeeMemberLists', 'committees', 'get_lastYearName'));

      }elseif ($commitee_id == 7){
         $committees = Committee::where('id', $commitee_id)->first();
        $protinidi = CentralProtinidi::orderBy('id', "desc")->get();
        return view('frontsite.protinidi', compact('protinidi', 'committees'));

      }else{
        
        $committees = Committee::where('id', $commitee_id)->first();
        $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $get_lastYearId],
                                      ])->get();
        return view('frontsite.member_list_style_3', compact('committeeMemberLists', 'committees', 'get_lastYearName'));
        }
        
     }




    public function CommiteeMembersListYears($commitee_id, $year_id=2 )
    {
       $get_lastYearName = Years::where('id', $year_id)->first();
       $get_lastYearName = $get_lastYearName->name;
      if ($commitee_id == 3) {
        $first_member = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                        ['priority',  1],
                                      ])->first();

       $second_member = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                        ['priority',  2],
                                      ])->first();       

       $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                      ])->skip(2)
                                        ->take(50)
                                        ->get();

          $committees = Committee::where('id', $commitee_id)->first();

        return view('frontsite.member_list_style_4', compact('committeeMemberLists', 'first_member', 'second_member', 'committees', 'get_lastYearName'));

      }elseif ($commitee_id == 4) {
        $committees = Committee::where('id', $commitee_id)->first();
       return view('frontsite.member_list_style_5', compact( 'committees'));
       
      }elseif ($commitee_id == 5){
          $committees = Committee::where('id', $commitee_id)->first();
        $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                      ])->get();
                                   

        return view('frontsite.uddukktaCommitee', compact('committeeMemberLists', 'committees', 'get_lastYearName'));

      }else{
         $committees = Committee::where('id', $commitee_id)->first();
        $committeeMemberLists = committeeMemberList::where([
                                        ['committe_type', $commitee_id],
                                        ['committe_year',  $year_id],
                                      ])->get();
        return view('frontsite.member_list_style_3', compact('committeeMemberLists', 'committees', 'get_lastYearName'));
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
       
        $this->validate($request, [
           'name'=> 'required',
           'member_id'=> 'required',
           'position_name'=> 'required',
           'mobile'=> 'required',
           'father_name'=> 'required',
           'mother_name'=> 'required',
           'parmanent_address'=> 'required',
           'present_address'=> 'required',
           'blood_group'=> 'required',
           'occapation'=> 'required',
           'marital_status'=> 'required',
           'applyer_photo'=> 'required',
           'committe_name'=> 'required',
           'committe_year'=> 'required',
           'committe_type'=> 'required',
           'priority'=> 'required',
           'join_date'=> 'required'
        ],[
          'dob.required' => 'Date of birth is Required'
        ]);

      /* $memmer_has = committeeMemberList::where('member_id', $request->member_id)
                                       ->first();
         if (!is_null($memmer_has)) {
            session()->flash('error','This Member Already Add in your Committee');
              return back();
         }else{*/


        //add data in committeememberList
        $committeeMemberList = new committeeMemberList;

        $committeeMemberList->name = $request->name;
        $committeeMemberList->member_id = $request->member_id; 
        $committeeMemberList->position_name = $request->position_name;
        $committeeMemberList->mobile = $request->mobile;
        $committeeMemberList->father_name = $request->father_name;
        $committeeMemberList->mother_name = $request->mother_name;
        $committeeMemberList->parmanent_address = $request->parmanent_address;
        $committeeMemberList->present_address = $request->present_address;
        $committeeMemberList->blood_group = $request->blood_group;
        $committeeMemberList->occapation = $request->occapation;
        $committeeMemberList->marital_status = $request->marital_status;
        $committeeMemberList->applyer_photo = $request->applyer_photo;
        $committeeMemberList->committe_name = $request->committe_name;
        $committeeMemberList->committe_year = $request->committe_year;
        $committeeMemberList->committe_type = $request->committe_type;
        $committeeMemberList->priority = $request->priority;
        $committeeMemberList->join_date = $request->join_date;
        $committeeMemberList->save();

        session()->flash('success','This Member Add Your Committee');
        return back();
        

    }

    public function Pradeshstore(Request $request)
    {
       
       $this->validate($request, [
           'name'=> 'required',
           'member_id'=> 'required',
           'position_name'=> 'required',
           'mobile'=> 'required',
           'father_name'=> 'required',
           'mother_name'=> 'required',
           'parmanent_address'=> 'required',
           'present_address'=> 'required',
           'blood_group'=> 'required',
           'occapation'=> 'required',
           'marital_status'=> 'required',
           'applyer_photo'=> 'required',
           'committe_name'=> 'required',
           'committe_year'=> 'required',
           'committe_type'=> 'required', 
           'State_id'=> 'required', 
           'priority'=> 'required',
           'join_date'=> 'required'
        ],[
          'dob.required' => 'Date of birth is Required'
        ]);

      /* $memmer_has = committeeMemberList::where('member_id', $request->member_id)
                                       ->first();
         if (!is_null($memmer_has)) {
            session()->flash('error','This Member Already Add in your Committee');
              return back();
         }else{*/


        //add data in committeememberList
        $committeeMemberList = new committeeMemberList;

        $committeeMemberList->name = $request->name;
        $committeeMemberList->member_id = $request->member_id; 
        $committeeMemberList->position_name = $request->position_name;
        $committeeMemberList->mobile = $request->mobile;
        $committeeMemberList->father_name = $request->father_name;
        $committeeMemberList->mother_name = $request->mother_name;
        $committeeMemberList->parmanent_address = $request->parmanent_address;
        $committeeMemberList->present_address = $request->present_address;
        $committeeMemberList->blood_group = $request->blood_group;
        $committeeMemberList->occapation = $request->occapation;
        $committeeMemberList->marital_status = $request->marital_status;
        $committeeMemberList->applyer_photo = $request->applyer_photo;
        $committeeMemberList->committe_name = $request->committe_name;
        $committeeMemberList->committe_year = $request->committe_year;
        $committeeMemberList->committe_type = $request->committe_type;
        $committeeMemberList->State_id = $request->State_id;
        $committeeMemberList->priority = $request->priority;
        $committeeMemberList->join_date = $request->join_date;
        $committeeMemberList->save();


        session()->flash('success','This Member Add Your Committee');
        return back();
   
    }

     public function pradesikCommitee($state_id){


      $get_lastYearName = Years::get()->last()->name;
      $get_lastYearId = Years::get()->last()->id;
      $state_name = State::where('id', $state_id)->first();

      $first_member = committeeMemberList::where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $get_lastYearId],
                                        ['priority',  1],
                                      ])->first();

       $second_member = committeeMemberList::where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $get_lastYearId],
                                        ['priority',  2],
                                      ])->first();       

       $committeeMemberLists = committeeMemberList::where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $get_lastYearId],
                                      ])->skip(2)
                                       ->take(50)
                                       ->get();
       $committees = Committee::where('id', 4)->first();

        return view('frontsite.pradesikCommitee', compact('committeeMemberLists', 'first_member', 'second_member', 'committees', 'get_lastYearName', 'state_name'));

     }


     // Pradesik Commitee With Year ....
      public function pradesikCommiteeYear($state_id, $year_id){
        $get_lastYearName =Years::where('id', $year_id)->first();
        $get_lastYearName =$get_lastYearName->name;
        $state_name = State::where('id', $state_id)->first();

        $first_member = committeeMemberList::where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $year_id],
                                        ['priority',  1],
                                      ])->first();


       $second_member = committeeMemberList::where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $year_id],
                                        ['priority',  2],
                                      ])->first();       

       $committeeMemberLists = committeeMemberList:: where([
                                        ['state_id', $state_id],
                                        ['committe_year',  $year_id],
                                      ])->skip(2)
                                       ->take(50)
                                       ->get();

          $committees = Committee::where('id', 4)->first();

        return view('frontsite.pradesikCommitee', compact('committeeMemberLists', 'first_member', 'second_member', 'committees', 'get_lastYearName', 'state_name'));

     }

    /**
     * Display the specified resource.
     *
     * @param  \App\committeeMemberList  $committeeMemberList
     * @return \Illuminate\Http\Response
     */
    public function show(committeeMemberList $committeeMemberList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\committeeMemberList  $committeeMemberList
     * @return \Illuminate\Http\Response
     */
    public function edit(committeeMemberList $committeeMemberList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\committeeMemberList  $committeeMemberList
     * @return \Illuminate\Http\Response
     */
    public function praupdate(Request $request, $id)
    {
      
       $this->validate($request, [
           'name'=> 'required',
           'position_name'=> 'required',
           'mobile'=> 'required',
           'present_address'=> 'required',
           'committe_name'=> 'required',
           'committe_year'=> 'required',
           'committe_type'=> 'required',
           'state_id'=> 'required',
           'priority'=> 'required'
        ]);

        //
        $committeeMemberList = committeeMemberList::find($id);
        if (!is_null($committeeMemberList)) {
           $committeeMemberList->name = $request->name;
           $committeeMemberList->position_name = $request->position_name;
           $committeeMemberList->mobile = $request->mobile;
           $committeeMemberList->present_address = $request->present_address;
           $committeeMemberList->committe_name = $request->committe_name;
           $committeeMemberList->committe_year = $request->committe_year;
           $committeeMemberList->committe_type = $request->committe_type;
            $committeeMemberList->state_id = $request->state_id;
           $committeeMemberList->priority = $request->priority;
           $committeeMemberList->save();
           session()->flash('success', 'Commitee Member Update SuccessFully');
           return back();

        }


    }

      public function update(Request $request, $id)
    {
      
       $this->validate($request, [
           'name'=> 'required',
           'position_name'=> 'required',
           'mobile'=> 'required',
           'present_address'=> 'required',
           'committe_name'=> 'required',
           'committe_year'=> 'required',
           'committe_type'=> 'required',
           'priority'=> 'required'
        ]);

        //
        $committeeMemberList = committeeMemberList::find($id);
        if (!is_null($committeeMemberList)) {
           $committeeMemberList->name = $request->name;
           $committeeMemberList->position_name = $request->position_name;
           $committeeMemberList->mobile = $request->mobile;
           $committeeMemberList->present_address = $request->present_address;
           $committeeMemberList->committe_name = $request->committe_name;
           $committeeMemberList->committe_year = $request->committe_year;
           $committeeMemberList->committe_type = $request->committe_type;
            $committeeMemberList->state_id = $request->state_id;
           $committeeMemberList->priority = $request->priority;
           $committeeMemberList->save();
           session()->flash('success', 'Commitee Member Update SuccessFully');
           return back();

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\committeeMemberList  $committeeMemberList
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $committeeMemberList = committeeMemberList::find($id);
        if (!is_null($committeeMemberList)) {
           $committeeMemberList->delete();
           return back();
        }

    }

}
