<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use App\Protinidi;
use App\Upozila;
use App\CentralProtinidi;

class ProtinidiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $all = Protinidi::orderBy('id', 'desc')->get();
         return view('admin.protinidi.index', ['protinidi'=>$all]);

    }

     public function cindex()
    {
        
         $all = CentralProtinidi::orderBy('priority', "desc")->get();
         return view('admin.central_protinidi.index', ['CentralProtinidi'=>$all]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function protinidiUpozila($upozila_id)
    {
        //
        $upozila = Upozila::where('id', $upozila_id)->first();
        $protinidi = Protinidi::orderBy('priority', "desc")->where('upozila_id', $upozila_id)->get();
        return view('frontsite.Upozilaprotinidi', compact('protinidi', 'upozila'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $protinidi = new Protinidi;
      $protinidi->name = $request->name;
      $protinidi->position = $request->position;
      $protinidi->blood_group = $request->blood_group;
      $protinidi->address = $request->address;
      $protinidi->upozila_id = $request->upozila_id;
      $protinidi->union_id = $request->union_id;
      $protinidi->mobile = $request->mobile;
      $protinidi->priority = $request->priority;

         //insert image in server
         $image = $request->file('image');
         $img = time().'.'. $image->getClientOriginalExtension();
         $location = public_path('upload/images/protinidi/'.$img);
         Image::make($image)->save($location);
         $protinidi->image = $img; 
     
        $protinidi->save();
        session()->flash('message','Member Add SuccessFully');
        return back();
    }

    public function cstore(Request $request)
    {
      $protinidi = new CentralProtinidi;
      $protinidi->name = $request->name;
       $protinidi->area_name = $request->area_name;
      $protinidi->position = $request->position;
      $protinidi->blood_group = $request->blood_group;
      $protinidi->address = $request->address;
      $protinidi->mobile = $request->mobile;
      $protinidi->priority = $request->priority;

         //insert image in server
         $image = $request->file('image');
         $img = time().'.'. $image->getClientOriginalExtension();
         $location = public_path('upload/images/protinidi/'.$img);
         Image::make($image)->save($location);
         $protinidi->image = $img; 
     
        $protinidi->save();
        session()->flash('message','Member Add SuccessFully');
        return back();
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

       if ($request->upozila_id == 0) {
          session()->flash('message','Enter Your Upozila');
        return back();
      }
      if ($request->union_id == 0){
           session()->flash('message','Enter Your Union');
        return back();
      }

      $protinidi =Protinidi::find($id);

      $protinidi->name = $request->name;
      $protinidi->position = $request->position;
      $protinidi->blood_group = $request->blood_group;
      $protinidi->address = $request->address;
     
      $protinidi->upozila_id = $request->upozila_id;
      $protinidi->union_id = $request->union_id;

      $protinidi->mobile = $request->mobile;
      $protinidi->priority = $request->priority;

         //insert image in server
       if ($request->image > 0) {
        if (File::exists('upload/images/protinidi/'.  $protinidi->image)) 
        {
         File::delete('upload/images/protinidi/'.  $protinidi->image);
        }
         $image = $request->file('image');
         $img = time().'.'. $image->getClientOriginalExtension();
         $location = public_path('upload/images/protinidi/'.$img);
         Image::make($image)->save($location);
         $protinidi->image = $img; 
        }

        $protinidi->save();
        session()->flash('message','Your Data update SuccessFully');
        return back();
    }
 

    public function cupdate(Request $request, $id)
    {


      $protinidi =CentralProtinidi::find($id);

      $protinidi->name = $request->name;
       $protinidi->area_name = $request->area_name;
      $protinidi->position = $request->position;
      $protinidi->blood_group = $request->blood_group;
      $protinidi->address = $request->address;
      $protinidi->mobile = $request->mobile;
      $protinidi->priority = $request->priority;

         //insert image in server
       if ($request->image > 0) {
        if (File::exists('upload/images/protinidi/'.  $protinidi->image)) 
        {
         File::delete('upload/images/protinidi/'.  $protinidi->image);
        }
         $image = $request->file('image');
         $img = time().'.'. $image->getClientOriginalExtension();
         $location = public_path('upload/images/protinidi/'.$img);
         Image::make($image)->save($location);
         $protinidi->image = $img; 
        }

        $protinidi->save();
        session()->flash('message','Your Data update SuccessFully');
        return back();
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
         $protinidi = Protinidi::find($id);
       if (!is_null($protinidi)) {
          //delete all image
          if (File::exists('upload/images/protinidi/'.$protinidi->image)) 
          {
           File::delete('upload/images/protinidi/'.$protinidi->image);
          }
         $protinidi->delete();
       }

        session()->flash('message','Data Delete SuccessFully');
        return back();
    }

     public function cdestroy($id)
    {
        //
         $protinidi = CentralProtinidi::find($id);
       if (!is_null($protinidi)) {
          //delete all image
          if (File::exists('upload/images/protinidi/'.$protinidi->image)) 
          {
           File::delete('upload/images/protinidi/'.$protinidi->image);
          }
         $protinidi->delete();
       }

        session()->flash('message','Data Delete SuccessFully');
        return back();
    }
}
