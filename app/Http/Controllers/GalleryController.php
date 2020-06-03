<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;
use Illuminate\Support\Facades\Input;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery =  Gallery::where('db_status','Live')->get();
         return view('admin.gallery.index', ['gallery'=>$gallery]);
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

         $this->validate($request,[
            'gallery_image'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

         $gallery = new Gallery;
         $gallery->gallery_note = $request->gallery_note;
         

         if ($request->gallery_image > 0) {
                $image = $request->gallery_image;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/gallery/'.$img);
                Image::make($image)->save($location);
                $gallery->gallery_image = $img;
                $gallery->save();
          }
          $gallery->save();




         /* $auth_id = Auth::guard('admin')->user()->id;
          $excep = Input::except('_token', 'gallery_image');

          if ($request->hasFile('gallery_image')){
            $gallery_image = $request->gallery_image->hashName();
            $request->gallery_image->move(('upload/images/gallery'), $gallery_image);
        }
        Gallery::create($excep + ['gallery_image' => $gallery_image]);*/


        session()->flash('message','Gallery Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Gallery::find($id);
        @unlink('upload/images/gallery/'.$item->gallery_image);
        $item->delete();
        session()->flash('message','Gallery Deleted Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        dd($gallery);
    }
}
