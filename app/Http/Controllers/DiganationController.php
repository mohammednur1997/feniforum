<?php

namespace App\Http\Controllers;

use App\Diganation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class DiganationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $mtyp = Diganation::where('db_status','Live')->get();
        return view('admin.designation.index',  ['mtypes'=>$mtyp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.designation.create');
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
            'name' => 'required',
        ]);

        $excep = Input::except('_token');
       
        Diganation::create($excep);
        session()->flash('message','Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diganation  $diganation
     * @return \Illuminate\Http\Response
     */
    public function show(Diganation $diganation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diganation  $diganation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mtype = Diganation::find($id);
       return view('admin.designation.edit', ['editType'=>$mtype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diganation  $diganation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'name' => 'required',
        ]);


        $excep = Input::except('_token', '_method');
           
        Diganation::find($id)->update($excep);

        session()->flash('message',' Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diganation  $diganation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Diganation::find($id);

        $item->db_status = 'Deleted';

        $item->save();

        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
}
