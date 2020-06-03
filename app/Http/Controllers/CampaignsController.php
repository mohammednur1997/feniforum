<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaing;
use App\Category;
use App\EventName;
use App\EventImage;
use App\Donation;
use App\CompleteEvent;
use Image;
use File;


use Illuminate\Support\Facades\Input;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventName = EventName::where('db_status','Live')->get();
        return view('admin.campaing.eventName', compact('eventName'));
    }

    public function eventList($event_id){
      if ($event_id == 1) {
        return view('admin.campaing.eventYear', compact('event_id', 'eventName'));
      }else{
        $eventName = EventName::where('id', $event_id)->first();
        $event = Campaing::where('event_id', $event_id)->get();
        return view('admin.campaing.index', compact('event', 'eventName'));
      }
        
    }

    public function eventListByYear($year_id){
       $eventName = EventName::where('id', 1)->first();
        $event = CompleteEvent::where('eventYear_id', $year_id)->get();

        return view('admin.campaing.complete', compact('event', 'eventName'));
      }

      public function close($event_id){
            $campaing = Campaing::where('id', $event_id)->first();
             
            $completeEvent = new  CompleteEvent;
            $completeEvent->title = $campaing->title;
            $completeEvent->event_id = $campaing->id;     
            $completeEvent->eventName_id = $campaing->event_id;     
            $completeEvent->eventYear_id = $campaing->eventYear_id;
            $completeEvent->campCategeroy_id = $campaing->campCategeroy_id;
            $completeEvent->campaing_location = $campaing->campaing_location;
            $completeEvent->campaing_description = $campaing->campaing_description;
            $completeEvent->campaing_video = $campaing->campaing_video;
            $completeEvent->campaing_photogellary = $campaing->id;
            $completeEvent->goal_amount = $campaing->goal_amount;
            $completeEvent->campaing_start_date = $campaing->campaing_start_date;
            $completeEvent->campaing_end_date = $campaing->campaing_end_date;
            $completeEvent->end_type = $campaing->end_type;
            $completeEvent->add_to_feature = $campaing->add_to_feature;
            $completeEvent->charity_status = $campaing->charity_status;
            $completeEvent->save();

            if(!is_null($campaing)) {
              $campaing->delete();
            }

        session()->flash('message','Event Close Successfully');
        return redirect()->back();


      }

      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $category = Category::where('db_status','Live')->get();
        return view('admin.campaing.create', ['categorys'=>$category]);

       
    }

     public function permanent()
    {
         $category = Category::where('db_status','Live')->get();
        return view('admin.campaing.PermanentCampaing', ['categorys'=>$category]);

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
            'title' => 'required',
            'goal_amount' => 'required',
            'campaing_description' => 'required',
        ]);

       
      $campaing = new Campaing;
      $campaing->title = $request->title;
      $campaing->event_id = $request->event_id;
      $campaing->campCategeroy_id = $request->campCategeroy_id;
      $campaing->eventYear_id = $request->eventYear_id;
      $campaing->campaing_location = $request->campaing_location;
      $campaing->campaing_description = $request->campaing_description;
      $campaing->campaing_video = $request->video;
      $campaing->goal_amount = $request->goal_amount;
      $campaing->campaing_start_date = $request->campaing_start_date;
      $campaing->campaing_end_date = $request->campaing_end_date;
      $campaing->end_type = $request->end_type;
      $campaing->add_to_feature = $request->add_to_feature;
      $campaing->charity_status = 1;
      $campaing->save();

      /* if($request->hasFile('video')){
            $file = $request->file('video');
            $filename = time().$file->getClientOriginalName();
            $path = public_path('upload/eventVideo/');
            $file->move($path, $filename);
            $campaing->campaing_video = $filename;
            $campaing->save();
        }*/

      
      //this code for upload image
       if($request->image > 0)
       {  
          $i=0;
        foreach($request->image as $image) {
            $img = time().$i.'.'.$image->getClientOriginalExtension();   
            $location = public_path('upload/images/event/'.$img);
            Image::make($image)->save($location);

            //code for upload image in database.......
            $EventImage = new EventImage;
            $EventImage->campaing_id = $campaing->id;
            $EventImage->image = $img;
            $EventImage->save();
          $i++;
        }
       }

       /* $excep = Input::except('_token', 'image');
        if ($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(('upload/images/cause'), $image);
        }
        Campaing::create($excep + ['campaing_photo' => $image]);*/

         
        session()->flash('message','Event Created Successfully');
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
    public function edit($camp_id)
    {
        
        $value = Campaing::where('id', $camp_id)->first();
        return view('admin.campaing.edit', compact('value'));
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
            'title' => 'required',
            'goal_amount' => 'required',
            'campaing_description' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

      $campaing = Campaing::find($id);
      $campaing->title = $request->title;
      $campaing->event_id = $request->event_id;
      $campaing->campCategeroy_id = $request->campCategeroy_id;
      $campaing->eventYear_id = $request->eventYear_id;
      $campaing->campaing_location = $request->campaing_location;
      $campaing->campaing_description = $request->campaing_description;
      $campaing->campaing_video = $request->video;
      $campaing->goal_amount = $request->goal_amount;
      $campaing->campaing_start_date = $request->campaing_start_date;
      $campaing->campaing_end_date = $request->campaing_end_date;
      $campaing->end_type = $request->end_type;
      $campaing->add_to_feature = $request->add_to_feature;
      
      
      //this code for upload image
       if($request->image > 0)
       {  
         // find the Event image in database and delete
         $event_image = EventImage::where('campaing_id', $id)->get();
         if (!is_null($event_image)) {
           foreach ($event_image as $images) {
             if (File::exists('upload/images/event/'.$images->image)) 
                {
                 File::delete('upload/images/event/'.$images->image);
                }
                $images->delete();
           }
          }
 

          $i=0;
        foreach($request->image as $image) {
            $img = time().$i.'.'.$image->getClientOriginalExtension();   
            $location = public_path('upload/images/event/'.$img);
            Image::make($image)->save($location);

            //code for upload image in database.......
            $EventImage = new EventImage;
            $EventImage->campaing_id = $campaing->id;
            $EventImage->image = $img;
            $EventImage->save();
          $i++;
        }
       }

       $campaing->save();
        session()->flash('message','Campaing Update Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $id)
    {

          if ($event_id == 1) {
            $CompleteEvent = CompleteEvent::find($id);
            $campaing_id = $CompleteEvent->event_id;
          
            $donar = Donation::where('campaing_type', $campaing_id)->get();
            foreach ($donar as $val) {
               $val->delete();
            }
            $CompleteEvent->delete();
          }else{

             $donar = Donation::where('campaing_type', $id)->get();
              foreach ($donar as $val) {
                 $val->delete();
              }

             //
            $campaing = Campaing::find($id);
         if (!is_null($campaing)) {
              //delete image from server.....
             $event_image = EventImage::where('campaing_id', $id)->get();
         if (!is_null($event_image)) {
           foreach ($event_image as $images) {
             if (File::exists('upload/images/event/'.$images->image)) 
                {
                 File::delete('upload/images/event/'.$images->image);
                }
                $images->delete();
           }
          }
           $campaing->delete();
         }
          }

       

         session()->flash('message','Campaing Delete Successfully');
        return redirect()->back();

    }
    public function destroy2(){
       $donar = Donation::where('campaing_type', $id)->get();
              foreach ($donar as $val) {
                 $val->delete();
              }

             //
            $campaing = Campaing::find($id);
         if (!is_null($campaing)) {
              //delete image from server.....
             $event_image = EventImage::where('campaing_id', $id)->get();
         if (!is_null($event_image)) {
           foreach ($event_image as $images) {
             if (File::exists('upload/images/event/'.$images->image)) 
                {
                 File::delete('upload/images/event/'.$images->image);
                }
                $images->delete();
           }
          }
           $campaing->delete();
         }
          

      
         session()->flash('message','Campaing Delete Successfully');
        return redirect()->back();
    }
}
