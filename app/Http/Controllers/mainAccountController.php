<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Years;
use App\UserProfile;
use App\EventYear;
use App\CompleteEvent;
use App\Donation;
use App\EventExpense;
use App\MainAccount;
use Session;


class mainAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function account()
    {
        $memberMoney = UserProfile::sum('amount');
        $donarMoney = Donation::sum('amount');

         $MainAccount = MainAccount::find(1);
       if (!is_null($MainAccount)) {
          $MainAccount->member_collection = $memberMoney;
          $MainAccount->event_connection =  $donarMoney;
          $MainAccount->save();
        }
        
        $Money  = $MainAccount->member_collection + $MainAccount->event_extra;
        $Money = $Money - $MainAccount->need;

        return view('admin.account.mainAccount', compact('Money'));
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
    public function year()
    {
        return view('admin.account.year');
    }

    public function campaingYear()
    {
      return view('admin.account.campaingYear');
    }

    public function eventcollection($year_id)
    {
      $completeEvent = CompleteEvent::where('eventYear_id', $year_id)->get();
      return view('admin.account.campainglist', compact('completeEvent'));
    }

    public function eventDetails($event_id)
    {
   $total_Donar = Donation::Where('campaing_type', $event_id)->count();

   $Donation_amount = Donation::Where('campaing_type', $event_id)->sum("amount");

   $Donation = Donation::Where('campaing_type', $event_id)->get();

   $ExpenseAmount = EventExpense::Where('event_id', $event_id)->sum("expense");

   $EventExpense = EventExpense::Where('event_id', $event_id)->get();

   return view('admin.account.eventDetails', compact('Donation', 'EventExpense', 'total_Donar', 'Donation_amount', 'ExpenseAmount', "event_id"));
    }

    public function money($year_id)
    {
        $years = EventYear::find($year_id);
        $yearsName = $years->year_name;
   $CollectionMoney = UserProfile::Where('join_date', 'like', '%'.$yearsName.'%')->sum("amount");
   $CollectionMember = UserProfile::Where('join_date', 'like', '%'.$yearsName.'%')->count();
   $Members = UserProfile::Where('join_date', 'like', '%'.$yearsName.'%')->get();
   return view('admin.account.index', compact('Members', 'CollectionMember', "CollectionMoney"));

    }

    public function addoney(Request $request)
    {
      $input =1; 
      $MainAccount = MainAccount::find(1);
      if (!is_null($MainAccount)) {
          $MainAccount->event_extra = $request->extra+$MainAccount->event_extra;
          $MainAccount->save();
           $input++;
      }

       session()->flash('message',' Extra money add main account Successfully');

       $event_id = $request->event_id;
       $eventExpense = EventExpense::where('event_id', $event_id)->get();
      return view('admin.campaing.expenseList', compact("event_id", "eventExpense", 'input'));

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
    public function need(Request $request)
    {
        $donation = new Donation;
        $donation->name = 'Main Account';
        $donation->amount = abs($request->extra);
        $donation->status = 20;
        $donation->campaing_type = $request->event_id;
        $donation->save();
        
        $input = 1;
        $MainAccount = MainAccount::find(1);
      if (!is_null($MainAccount)) {
        if (!is_null($MainAccount->need)) {
           $MainAccount->need = $MainAccount->need + abs($request->extra);
           $MainAccount->save();
          
        }else{
             $MainAccount->need = abs($request->extra);
           $MainAccount->save();
           
        }
      }

        session()->flash('message','This due money add from mainAccount');
       $event_id = $request->event_id;
       $eventExpense = EventExpense::where('event_id', $event_id)->get();
      return view('admin.campaing.expenseList', compact("event_id", "eventExpense", 'input'));


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
        //
    }
}
