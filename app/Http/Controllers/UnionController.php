<?php

namespace App\Http\Controllers;

use App\Union;
use App\Upozila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all = Union::where('db_status','Live')->get();
         $upozila = Upozila::where('db_status','Live')->get();
         return view('admin.union.index', ['union'=>$all,'upozila'=>$upozila]);
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
       
        Union::create($excep);
        session()->flash('message','Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function show(Union $union)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all = Union::find($id);
        $upozila = Upozila::where('db_status','Live')->get();
        return view('admin.union.edit', ['union'=>$all,'upozila'=>$upozila]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);


        $excep = Input::except('_token', '_method');
           
        Union::find($id)->update($excep);

        session()->flash('message',' Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $item = Union::find($id);
        $item->db_status = 'Deleted';
        $item->save();

        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
}
