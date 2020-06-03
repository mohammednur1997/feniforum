<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Committee;
use Illuminate\Support\Facades\Input;

class Committeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committee=Committee::where('db_status','Live')->get();
        return view('admin.committee.index',['committee'=>$committee]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.committee.create');
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
        'name'=>'required',

        ]);

         $excep = Input::except('_token');
         Committee::create($excep);
        session()->flash('message','Created Successfully');

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
    public function edit($id)
    {
        $committee=Committee::find($id);
        return view('admin.committee.edit',['committee'=>$committee]);
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
         $this->validate($request,[
            'name' => 'required',
        ]);


        $excep = Input::except('_token', '_method');
           
        Committee::find($id)->update($excep);

        session()->flash('message',' Update Successfully');
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
        $item = Committee::find($id);

        $item->db_status = 'Deleted';

        $item->save();

        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
}
