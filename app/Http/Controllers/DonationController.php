<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\EventName;
use App\Campaing;
use App\CompleteEvent;
use Image;
use File;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventList()
    {
         return view('admin.donation.eventList');
    }

    public function alldonation()
    {
        $donat = Donation::get();
         return view('admin.donation.index', ['donat'=>$donat]);
    }

    public function index($id)
    {
         $donat = Donation::where('campaing_type', $id)->get();
         return view('admin.donation.index', ['donat'=>$donat]);
    }

    public function event($event_id)
    {

        if ($event_id == 1) {
           $event = CompleteEvent::get();
         return view('admin.donation.event', ['event'=>$event, 'event_id'=>$event_id]);
        }else{
          $event = Campaing::where('event_id', $event_id)->get();
         return view('admin.donation.event', ['event'=>$event], ['event_id'=>$event_id]);
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
          $donat = Donation::where('id', $id)->first();
         return view('admin.donation.edit', ['value'=>$donat]);

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
         $this->validate($request,[
            'amount' => 'required',
            'donation_holder' => 'required',
            'donation_mobile' => 'required',
            'agree' => 'required',
            'donation_photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'document'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);


          $donation = Donation::find($id);
          $donation->name = $request->name;
          $donation->amount = $request->amount;
          $donation->donation_holder = $request->donation_holder;
          $donation->donation_mobile = $request->donation_mobile;
          $donation->donation_email = $request->donation_email;
          $donation->donation_location = $request->donation_location;
          $donation->campaing_type = $request->donation_type;
          $donation->save();

             //Upload donar photo in server and database
               if($request->donation_photo > 0)
               {  
                $donar_picture = $donation->donation_photo;
                  if (!is_null($donar_picture)) {
                     if (File::exists('upload/images/donar/'. $donar_picture)) {
                         File::delete('upload/images/donar/'. $donar_picture);
                     }
                  }

                $image = $request->donation_photo;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/donar/'.$img);
                Image::make($image)->save($location);
                $donation->donation_photo = $img;
                $donation->save();
              }

          //Upload donar document photo in server and database
           if($request->document > 0)
           {  
                  $donation_document = $donation->donation_slip;
                  if (!is_null($donation_document)) {
                     if (File::exists('upload/images/payment_document/'. $donation_document)) {
                         File::delete('upload/images/payment_document/'. $donation_document);
                     }
                  }

            $image = $request->document;
            $img = time().'.'.$image->getClientOriginalExtension();   
            $location = public_path('upload/images/payment_document/'.$img);
            Image::make($image)->save($location);
            $donation->donation_slip = $img;
            $donation->save();
           }
         
        session()->flash('message', 'Donation Update Successfull'); 
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
        $donar = Donation::find($id);
        $donar->delete();
         session()->flash('message','Donar Delete Successfully');
       return redirect()->back();

    }

    public function eventDelete($id){

         $donar = Donation::where('campaing_type', $id)->get();
          foreach ($donar as $val) {
             $val->delete();
          }

         $campaing = Campaing::find($id);
         $campaing->delete();

       session()->flash('message','Event Delete Successfully');
       return redirect()->back();

    }

	
	 public function approv($id)
     {
      $mem = Donation::find($id);
	  $mem->status = 20;
	  $mem->save();
	  
	   session()->flash('message','Donar Approve Successfully');
       return redirect()->back();
     }
}
