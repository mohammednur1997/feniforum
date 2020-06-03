<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all = State::where('db_status','Live')->get();
         return view('admin.state.index', ['state'=>$all]);
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

        
           $this->validate($request,[
            'name' => 'required',
        ]);

        $excep = Input::except('_token');
       
        State::create($excep);
        session()->flash('message','Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

        return redirect()->back();

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $all = State::find($id);
        return view('admin.state.edit', ['state'=>$all]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $this->validate($request,[
            'name' => 'required',
        ]);


        $excep = Input::except('_token', '_method');
           
        State::find($id)->update($excep);

        session()->flash('message',' Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = State::find($id);
        $item->db_status = 'Deleted';
        $item->save();

        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
}
