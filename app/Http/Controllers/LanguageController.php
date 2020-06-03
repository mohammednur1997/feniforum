<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LanguageWord;
use App\Language;
use DB;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('admin.language.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      DB::table('languages')->where('db_field', $id)->update(array('db_status' => 'Deleted'));

        session()->flash('message','Delete Successfully');
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
       return view('admin.language.index', ['edit_profile'=>$id]);
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

        foreach($request->phrase as  $phrase){
            $language = new LanguageWord;
            $language->bangla = $phrase;
            $language->save();
          }
           
		     /*
			$language   =   $id;
            $total_phrase   =   $request->input('total_phrase');

            for($i = 1 ; $i < $total_phrase ; $i++)
            {
  $result =  LanguageWord::where('id', $i)->update([$id => $request->input('phrase').$i]);
       
            }*/

           /* $language   =   $id;
            $total_phrase   =   $request->input('total_phrase');
             for ($i=1; $i < $total_phrase; $i++) {

                DB::table('language_words')
                    ->where('id', $i)
                    ->update([
                        $language => $request->phrase[$i]
         
                   ]);

               }
 
         */

			
	
		session()->flash('message','Update Successfully');
        return redirect()->back();
		
		//return $word;
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
		DB::table('languages')->where('db_field', $id)->update(array('db_status' => 'Deleted'));
	
        session()->flash('message','Delete Successfully');
        return redirect()->back();
    }

    
}
