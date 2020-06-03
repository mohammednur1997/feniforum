<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $slide =  Slider::where('db_status','Live')->get();

        return view('admin.slider.index', ['slide'=>$slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
         $item = new Slider;
        $this->validate($request,[
            'slider_image'=>'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);
        $item->bold_text = $request->bold_text;
        $item->mid_text = $request->mid_text;
        $item->small_text = $request->small_text;
        if ($request->hasFile('slider_image')){
            $item->image = $request->slider_image->hashName();
           $request->slider_image->move(('upload/images/slider'), $item->image);
        }
        $item->save();
        session()->flash('message','Slider Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){

         $item = Slider::find($request->sliderid);
        @unlink('upload/images/slider/'.$item->image);
        $item->delete();
        session()->flash('message','Data Deleted Successfully');
        return redirect()->back();
    }
}
