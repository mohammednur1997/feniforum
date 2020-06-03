<?php

namespace App\Http\Controllers;

use App\SocialiCon;
use Illuminate\Http\Request;

class SocialiConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sicon =  SocialiCon::where('db_status','Live')->get();

        return view('admin.social_icon.index', ['sicon'=>$sicon]);
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

        $item = new SocialiCon ;
        $this->validate($request,[
            'social_icon'=>'required|unique:sociali_cons,icon',
            'social_url'=>'required'
        ]);
        $item->icon = 'fa '.$request->social_icon;
        $item->link = $request->social_url;
        $item->color = $request->color;
        $item->save();
        session()->flash('message','Social item Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialiCon  $socialiCon
     * @return \Illuminate\Http\Response
     */
    public function show(SocialiCon $socialiCon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialiCon  $socialiCon
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialiCon $socialiCon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialiCon  $socialiCon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialiCon $socialiCon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialiCon  $socialiCon
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialiCon $socialiCon)
    {
        //
    }

     public function delete(Request $request){

         $item = SocialiCon::find($request->socialid);
       // @unlink('upload/images/slider/'.$item->image);
        $item->delete();
        session()->flash('message','Data Deleted Successfully');
        return redirect()->back();
    }
}
