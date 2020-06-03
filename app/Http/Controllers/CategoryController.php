<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::where('db_status','Live')->get();
        return view('admin.category.index',  ['categorys'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       // $category = Category::all();
        $category = Category::where('db_status','Live')->get();
       
        return view('admin.category.create', ['categorys'=>$category]);
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
            'category_name' => 'required',
        ]);

         $Category = new Category;
         $Category->category_name = $request->category_name;
         $Category->description = $request->description;
         $Category->save();


        /*$excep = Input::except('_token', 'image');
        Category::create($excep);*/


        session()->flash('message','Category Created Successfully');
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
        session()->flash('message','Category Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $category = Category::where('db_status','Live')->get();

       $cat = Category::find($id);
       return view('admin.category.edit', ['editcat'=>$cat, 'categorys'=>$category]);
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
            'category_name' => 'required',
        ]);

        $Category = Category::find($id);
        $Category->category_name = $request->category_name;
         $Category->description = $request->description;
         $Category->save();

        session()->flash('message','Category Update Successfully');
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
        
        $item = Category::find($id);

        $item->db_status = 'Deleted';

        $item->save();

        session()->flash('message','Category Delete Successfully');
        return redirect()->back();
           
       // Category::find($id)->update($excep);
    }
}
