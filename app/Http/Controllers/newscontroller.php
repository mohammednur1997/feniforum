<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newsmodel;
use Auth;
use Illuminate\Support\Facades\Input;
class newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news =  newsmodel::where('db_status','Live')->get();
        return view('admin.news.index', ['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        return view('admin.news.create');   

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
            'title' => 'required',
            'description' => 'required',
            'news_image'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

        $auth_id = Auth::user()->id;

        $excep = Input::except('_token', 'news_image');

      //  $title = $request->title;
       
        if ($request->hasFile('news_image')){
            $news_image = $request->news_image->hashName();
            $request->news_image->move(('upload/images/news'), $news_image);
        }

        newsmodel::create($excep + ['news_image' => $news_image, 'auth_id'=>$auth_id]);

       
        session()->flash('message','Created Successfully');

       // return redirect()->back()->with('message', 'Cause Created Successfully');

        return redirect()->route('news.index');
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
        //  $news = newsmodel::where('db_status','Live')->get();

       $news = newsmodel::find($id);
       return view('admin.news.edit', ['editnews'=>$news]);
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
            'title' => 'required',
             'description' => 'required',
        ]);


        $excep = Input::except('_token', '_method');
           
        newsmodel::find($id)->update($excep);

        session()->flash('message','News Update Successfully');
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
         $item = newsmodel::find($id);

        $item->db_status = 'Deleted';

        $item->save();

        session()->flash('message','News Delete Successfully');
        return redirect()->back();
           
    }
}
