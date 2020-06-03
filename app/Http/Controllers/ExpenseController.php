<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventExpense;
use App\Campaing;
use App\Donation;
use PDF;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_id)
    {
         $input = 1;
        $eventExpense = EventExpense::where('event_id', $event_id)->get();
                                   
      return view('admin.campaing.expenseList', compact("event_id", "eventExpense", 'input'));
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
        // take data from Campaing table
        $campaing = Campaing::find($request->event_id);
        // take data from Donation table
       /* $donation = Donation::where('campaing_type', $id)->get();*/

        $eventExpense = new EventExpense;
        $eventExpense->event_id = $campaing->id;
        $eventExpense->eventName_id = $campaing->event_id;
        $eventExpense->eventYear_id = $campaing->eventYear_id;
        $eventExpense->campaing_photo = $campaing->id;
        $eventExpense->donar_name = $campaing->id;
        $eventExpense->goal_amount = $campaing->goal_amount;
        $eventExpense->amount = $campaing->id;
        $eventExpense->expense_details = $request->expense_details;
        $eventExpense->expense = $request->expense;
        $eventExpense->save();

        session()->flash('message',' Expense Update Successfully');
        return redirect()->back();

    }

      /**
   * generate Invoice
   * 
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function generateInvoice($event_id)
  {
     $eventName = Campaing::where('id', $event_id)->first();
     $eventExpense = EventExpense::where('event_id', $event_id)->get();
     $eventExpenseTotal = EventExpense::where('event_id', $event_id)->sum('expense');
      $donation = Donation::where("campaing_type", $event_id)->get();
      $donationTotal = Donation::where("campaing_type", $event_id)->sum('amount');
    $pdf = PDF::loadView('admin.campaing.invoice', compact('eventExpense','eventExpenseTotal', 'donation', 'donationTotal', 'eventName'));
    
    return $pdf->stream('invoice.pdf');
    //return $pdf->download('invoice.pdf');
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
        $EventExpense = EventExpense::find($id);
        if (!is_null($EventExpense)) {
            $EventExpense->delete();
        }
         session()->flash('message',' Expense Delete Successfully');
        return redirect()->back();

    }
}
