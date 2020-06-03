<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemberCategory;
use Illuminate\Support\Facades\Input;

class MemberTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mtyp = MemberCategory::where('db_status','Live')->get();
        return view('admin.mtype.index',  ['mtypes'=>$mtyp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.mtype.create');
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
       
        MemberCategory::create($excep);
        session()->flash('message','Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

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
        

       // $mtype = Category::where('db_status','Live')->get();

       $mtype = MemberCategory::find($id);
       return view('admin.mtype.edit', ['editType'=>$mtype]);
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
           
        MemberCategory::find($id)->update($excep);

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
        //
        $item = MemberCategory::find($id);

        $item->db_status = 'Deleted';

        $item->save();

        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }
}
