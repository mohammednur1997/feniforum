<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use App\Blog;
use App\Member;
use Auth;
use Image;
use File;
use Illuminate\Support\Facades\Input;
use Actuallymab\LaravelComment\Commentable;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //status->1 = publish
         //status->2 = Unpublish
        $blog =  Blog::where('db_status','Live')->get();
        return view('admin.blog.index',['blog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $blogcat = BlogCategory::where('db_status','live')->get();
         return view('admin.blog.create', ['blogcetname'=>$blogcat]);
    }

    public function publish($id){
         $blog = Blog::find($id);
         $blog->status = 1;
         $blog->save();
          session()->flash('message','blog Publish Successfully');
        return redirect()->back();

     }
   
   public function unpublish($id){ 
         $blog = Blog::find($id);
         $blog->status = 2;
         $blog->save();
          session()->flash('message','blog Unpublish Successfully');
        return redirect()->back();
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
            'blog_title' => 'required',
            'blog_description' => 'required',
            'fet_image'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

        $blog = new Blog;
        $blog->blog_title = $request->blog_title;
        $blog->cat_id = $request->cat_id;
        $blog->blog_description = $request->blog_description;
        $blog->db_status = 'live';
        $blog->status = 2;

         if (Auth::check()) {
           $blog->auth_id = Auth::id();
        }
        $blog->save();


             if($request->fet_image > 0)
              {  
                $image = $request->fet_image;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/blog/'.$img);
                Image::make($image)->save($location);
                $blog->fet_image = $img;
                $blog->save();
              }


         /*
        $auth_id = Auth::guard('admin')->user()->id;
		$usertype = 'admin';

        $excep = Input::except('_token', 'fet_image');

          if ($request->hasFile('fet_image')){
            $fet_image = $request->fet_image->hashName();
            $request->fet_image->move(('upload/images/blog'), $fet_image);
        }
       Blog::create($excep + ['fet_image' => $fet_image, 'auth_id'=>$auth_id,'user_type'=>$usertype]);
        session()->flash('message','Blog Created Successfully');*/

       // return redirect()->back()->with('message', 'Cause Created Successfully');
        session()->flash('message','blog Create Successfully');
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
       $blog = blog::find($id);
       return view('admin.blog.edit', ['editblog'=>$blog]);
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
            'blog_title' => 'required',
            'blog_description' => 'required',
            'fet_image'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
             ]);

         $blog = Blog::find($id);   
         if (!is_null($blog)) {
            $blog->blog_title = $request->blog_title;
            $blog->cat_id = $request->cat_id;
            $blog->blog_description = $request->blog_description;
            $blog->db_status = 'live';
            $blog->save();


             if($request->fet_image > 0)
              {  
                if (File::exists('upload/images/blog/'. $blog->fet_image)) {
                    File::delete('upload/images/blog/'. $blog->fet_image);
                }

                $image = $request->fet_image;
                $img = time().'.'.$image->getClientOriginalExtension();   
                $location = public_path('upload/images/blog/'.$img);
                Image::make($image)->save($location);
                $blog->fet_image = $img;
                $blog->save();
              }
         }

        session()->flash('message','blog Update Successfully');
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
          $item = blog::find($id);
          if (!is_null($item)) {
             if (File::exists('upload/images/blog/'. $item->fet_image)) {
                    File::delete('upload/images/blog/'. $item->fet_image);
            }
          }
          $item->delete();

          session()->flash('message','blog Delete Successfully');
          return redirect()->back();
    }

    public function comment()
    {

      $userid = "10"; //static user id for testing
      $postid = "8"; //static post id for testing

      $user = Member::where('id','=',$userid)->first();
      $post = Blog::where('id','=',$postid)->first();


      $user->comment($post, 'Lorem ipsum ..', 3);
      session()->flash('message','blog Delete Successfully');
       // static comment for testing
    }

}
