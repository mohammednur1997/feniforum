<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use Illuminate\Support\Facades\Input;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $category = BlogCategory::where('db_status','Live')->get();
        return view('admin.blog.category.index',  ['categorys'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category = BlogCategory::where('db_status','Live')->get();
        return view('admin.blog.category.create', ['categorys'=>$category]);
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

         $this->validate($request,[
            'name' => 'required',
        ]);

        $excep = Input::except('_token', 'image');
       
        BlogCategory::create($excep);
        session()->flash('message','Blog Category Created Successfully');
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
     * @return \Illuminate\Http\Ressssponse
     */
    public function edit($id)
    {
        $category = BlogCategory::where('id', $id)->first();
        return view('admin.blog.category.edit', ['editcat'=>$category]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $blog = BlogCategory::find($id);
          $blog->delete();
           session()->flash('message','Blog Category Delete Successfully');
        return redirect()->back();
    }
}
