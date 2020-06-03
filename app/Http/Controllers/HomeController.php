<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newsmodel;
use App\Blog;
use App\Campaing;
use App\Contact;
use App\Subcribe;
use App\User;
use App\Member;
use App\UserProfile;
use App\Gallery;
use App\Page;
use App\Union;
use App\Donation;
use App\MemberCategory;
use App\Committee;
use App\cometiMember;
use App\committeeMemberList;
use App\EventName;
use App\Category;
use App\CompleteEvent;
use Image;
use File;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function about()
    {
        return view('frontsite.about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	function set_language($lang)
    {
	  Session::put('language', $lang);
	  return redirect()->back();
    }
	
    
    public function GetUnion()
    {

    $cid = $_GET['cid'];
	
    $union =  Union::where('db_status','Live')->where('upozila_id',$cid)->orderBy('id','DESC')->get();
    
     return view('country.union', ['cid'=>$cid]);

    }
	
	 public function ducsubmit()
    {
        return view('frontsite.payment_duc');
    }
	
	public function login()
    {
      
        return view('frontsite.user_login');
    }

    public function category($cat_id){
        $categoryName = Category::where('id', $cat_id)->first();
        $categoryName = $categoryName->category_name;
        
        $charity = Campaing::where('campCategeroy_id', $cat_id)
                                 ->paginate(10);

     return view('frontsite.charity_list', ['charity'=>$charity, 'carityType'=>$categoryName]);                          
      }
	
	public function ducstore(Request $request){
		
		$this->validate($request,[
		'member_id' => 'required',
		'payment_document'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
		]);
		
		$payment_document ='';
	
		if ($request->hasFile('payment_document')){
            $payment_document = $request->payment_document->hashName();
            $request->payment_document->move(('upload/images/payment_document'), $payment_document);
			
		  UserProfile::where('member_id',$request->member_id)->update(['payment_document' => $payment_document]);

		  Session::flash('message', 'Payment Document submitted Successful'); 
        }

		return redirect()->back();
     
	}
	  
    public function index()
    {

    $news =  newsmodel::where('db_status','Live')->orderBy('id','DESC')->take('3')->get();
        return view('home', ['news'=>$news]);
    }
	
	 public function donation()
    {
      
      return view('frontsite.donation');
    }


    public function SearchMember(Request $request)
    {   
         
        if ($request->search) {
            $search = Session::put('search', $request->search);
             $member = UserProfile::orWhere('full_name', 'like', '%'.$request->search.'%')
                 ->orWhere('member_id', 'like', '%'.$request->search.'%')
                 ->orWhere('mobile', 'like', '%'.$request->search.'%')
                 ->orWhere('mobile_work', 'like', '%'.$request->search.'%')
                 ->orWhere('father_name', 'like', '%'.$request->search.'%')
                 ->orWhere('mother_name', 'like', '%'.$request->search.'%')
                 ->orWhere('present_address', 'like', '%'.$request->search.'%')
                 ->orWhere('parmanent_address', 'like', '%'.$request->search.'%')
                 ->orWhere('blood_group', 'like', '%'.$request->search.'%')
                 ->orderBy('id', 'desc')
                 ->paginate(15);
         return view('frontsite.ganarale_member', ['member'=>$member]);
        }else{
            $search = Session::get('search');
            $member = UserProfile::orWhere('full_name', 'like', '%'.$search.'%')
                 ->orWhere('member_id', 'like', '%'.$search.'%')
                 ->orWhere('mobile', 'like', '%'.$search.'%')
                 ->orWhere('mobile_work', 'like', '%'.$search.'%')
                 ->orWhere('father_name', 'like', '%'.$search.'%')
                 ->orWhere('mother_name', 'like', '%'.$search.'%')
                 ->orWhere('present_address', 'like', '%'.$search.'%')
                 ->orWhere('parmanent_address', 'like', '%'.$search.'%')
                 ->orWhere('blood_group', 'like', '%'.$search.'%')
                 ->orderBy('id', 'desc')
                 ->paginate(15);
         return view('frontsite.ganarale_member', ['member'=>$member]);
        }

    }
        

	  public function donationStore(Request $request)
      {
		  $this->validate($request,[
            'amount' => 'required',
            'donation_holder' => 'required',
            'donation_mobile' => 'required',
            'agree' => 'required',
            'donation_photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
			'document'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

          $donation = new Donation;
          $donation->name = $request->name;
          $donation->amount = $request->amount;
          $donation->donation_holder = $request->donation_holder;
          $donation->donation_mobile = $request->donation_mobile;
          $donation->donation_email = $request->donation_email;
          $donation->donation_location = $request->donation_location;
          $donation->campaing_type = $request->donation_type;
          $donation->payment_type = $request->payment_gateway;

          if ($request->payment_gateway == "bkash") {
             $donation->payment_txid = 'bkash-'.$request->payment_txid;
          }elseif ($request->payment_gateway == "bank_transfer") {
              $donation->payment_txid = 'bank-'.$request->payment_txid;
          }
          
              
          if ($request->donation_type) {
             $campaing = Campaing::where('id', $request->donation_type)->first();
             $event_id = $campaing->event_id;
             $donation->camp_id = $event_id;
          }
          $donation->save();
         //Upload donar photo in server and database
           if($request->donation_photo > 0)
           {  
            $image = $request->donation_photo;
            $img = time().'.'.$image->getClientOriginalExtension();   
            $location = public_path('upload/images/donar/'.$img);
            Image::make($image)->save($location);
            $donation->donation_photo = $img;
            $donation->save();
          }

          //Upload donar document photo in server and database
           if($request->document > 0)
           {  
            $image = $request->document;
            $img = time().'.'.$image->getClientOriginalExtension();   
            $location = public_path('upload/images/payment_document/'.$img);
            Image::make($image)->save($location);
            $donation->donation_slip = $img;
            $donation->save();
          }
		 
      
		/* $excep = Input::except('_token', 'donation_photo');
        if ($request->hasFile('donation_photo')){
            $donation_photo = $request->donation_photo->hashName();
            $request->donation_photo->move(('upload/images/donar'), $donation_photo);
			 Donation::create($excep + ['donation_photo' => $donation_photo]);
        }else {
			 Donation::create($excep);
		}*/
       
		
        Session::flash('message', 'Donation Add Successfull'); 
      return redirect()->back();

	}



     public function member_add_front()
    {
        //$news =  newsmodel::where('db_status','Live')->orderBy('id','DESC')->take('3')->get();
        return view('frontsite.member_add');
    }
	
	

      public function Memberstore(Request $request)
      {

             $this->validate($request,[
            'full_name' => 'required',
            'mobile' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'password' => 'required|',
            'email' => 'required|email|max:255|unique:members',
            'agree' => 'required',
			'applyer_photo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
			'payment_document'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);
		
		 $excep = Input::except('_token', 'applyer_photo', 'payment_document');
		 
		 $applyer_photo= "";
		 $payment_document= "";

        if ($request->hasFile('applyer_photo')){
            $applyer_photo = $request->applyer_photo->hashName();
            $request->applyer_photo->move(('upload/images/member'), $applyer_photo);
        }
        
       
		
		if ($request->hasFile('payment_document')){
            $payment_document = $request->payment_document->hashName();
            $request->payment_document->move(('upload/images/payment_document'), $payment_document);
        }

        $userprofile = UserProfile::create($excep + ['applyer_photo' => $applyer_photo, 'payment_document' => $payment_document]);
          $member = new Member;
          $member->full_name = $request->full_name;
          $member->email = $request->email;
          $member->mobile = $request->mobile;
          $member->password = Hash::make($request->password);
          $member->user_type = 'member';
          $member->profile_id = $userprofile->id;
          $member->save();

		Session::flash('message', 'Member Add Successfull, Please Remember Your Email and Password for Future Work' ); 
      //  session()->flash('message','Member Created Successfully');
      return redirect()->back();
    }


    public function newsDetails($id)
    {
        $news_dt =  newsmodel::find($id);
        $news =  newsmodel::where('db_status','Live')->orderBy('id','DESC')->take('3')->get();
        return view('frontsite.news_details', ['news'=>$news,'news_more'=>$news_dt]);
    }

    public function newsList()
    {
        
        $news =  newsmodel::where('db_status','Live')->orderBy('id','DESC')->take('3')->get();
        $newsall =  newsmodel::where('db_status','Live')->orderBy('id','DESC')->paginate(15);
        return view('frontsite.news_list', ['news'=>$news,'newsall'=>$newsall]);
    }

    public function usefulPage($pagename)
    {
        
        return view('frontsite.useful_page', ['pageName'=>$pagename]);
    }

    public function page($url)
    {
	
	  $page =  Page::where('db_status','Live')->where('page_url',$url)->first();
      return view('frontsite.page', ['page'=>$page, 'pageurl'=>$url]);
    }

	//Event ar jonno method
    //complete->1
    //current->2
    //yearly->3
    //permanent->4

	public function complete()
    {
      $eventName = EventName::where('id', 1)->first(); 
      $eventName = $eventName->event_name;
	   $charity = CompleteEvent::where('eventYear_id', 1)
                         ->orderBy('id','DESC')
                         ->paginate(15);
     return view('frontsite.completeEvent', ['charity'=>$charity, 'carityType'=>$eventName]);
    }

    public function eventCompleteYear($year_id)
    {
      $eventName =EventName::where('id', 1)->first(); 
      $eventName = $eventName->event_name;

      $charity = CompleteEvent::where('eventYear_id', $year_id)->get();
    return view('frontsite.completeEvent', ['charity'=>$charity, 'carityType'=>$eventName]);
    }



    public function current()
    {
      $eventName =EventName::where('id', 2)->first(); 
      $eventName = $eventName->event_name;
    $charity =  Campaing::where('db_status','Live')
                          ->where('event_id', 2)
                          ->orderBy('id','DESC')
                          ->paginate(15);
     return view('frontsite.charity_list', ['charity'=>$charity, 'carityType'=>$eventName]);
    }

    public function yearly()
    {
        $eventName =EventName::where('id', 3)->first(); 
      $eventName = $eventName->event_name;
    $charity =  Campaing::where('db_status','Live')
                           ->where('event_id', 3)
                           ->orderBy('id','DESC')
                           ->paginate(15);
     return view('frontsite.charity_list', ['charity'=>$charity, 'carityType'=>$eventName]);
    }

    public function permanent()
    {
        $eventName =EventName::where('id', 4)->first(); 
      $eventName = $eventName->event_name;
    $charity =  Campaing::where('db_status','Live')
                          ->where('event_id', 4)
                           ->orderBy('id','DESC')
                           ->paginate(15);
     return view('frontsite.charity_list', ['charity'=>$charity, 'carityType'=>$eventName]);
    }
    //Event ar jonno method finished


    public function DonatNow($charityid)
    {
        return view('frontsite.donat_now', ['charityid'=>$charityid]);
    }
    public function Blogupdate(Request $request, $id)
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
	
	public function BlogAll($cat="")
    {
        if(!empty($cat)) {

        $blog =  Blog::where('status', 1)->where('cat_id',$cat)->orderBy('id','DESC')->paginate(15);

        }else {

           $blog =  Blog::where('status', 1)->orderBy('id','DESC')->paginate(15);
        }
	

     return view('frontsite.blog_list', ['blog'=>$blog]);
    }

	public function BlogSingle($blogid)
    {
    $blog =  Blog::where('db_status','Live')->where('id',$blogid)->first();
     return view('frontsite.blog_details', ['blog'=>$blog]);
    }


    public function CharitySingle($charityid)
    {
        $charty = Campaing::find($charityid);
     return view('frontsite.charity_details', ['charityid'=>$charty]);
    }

    public function completeCharity($charityid)
    {
        $charty = CompleteEvent::where('event_id', $charityid)->first();
       return view('frontsite.completeEventDetails', ['charityid'=>$charty]);
    }

    
	
	public function galleryList()
    {
	  /* $gallery =  Gallery::where('db_status','Live')->orderBy('id','DESC')->paginate(15);*/
     return view('frontsite.gallery_list');
    }
	
	
	public function membersList()
    {
		//member_type
	/*$theme =  MemberCategory::where('id',$type)->where('db_status','Live')->first();*/
	$member =  UserProfile::where('db_status','Live')->where('status',20)->orderBy('member_id','asc')->paginate(15);
     return view('frontsite.ganarale_member', ['member'=>$member]);
    }

	
	/*public function membersComiteeList($type,$years=null)
    {
		ini_set('error_reporting', E_STRICT);
	//commte
	//$theme =  Committee::where('id',$type)->where('db_status','Live')->first();
    
	if(!empty($years)) {
		$comitelist =  cometiMember::where('comite',$type)->where('years',$years)->where('db_status','Live')->first();
	}else {
		
		$comitelist =  cometiMember::where('comite',$type)->where('db_status','Live')->first();
	}
	//return $comitelist;
	
	if(!empty($comitelist->years)){
		
		//$comiteemember = json_decode($comitelist->member_id);
		$member =  UserProfile::whereIn('id',$comiteemember)->where('db_status','Live')->where('status',20)->orderBy('id','asc')->paginate(15);
		return view('frontsite.member_list_style_3', ['member'=>$member, 'type'=>$theme->name]);
		
		//return view('frontsite.comitee_year', ['type'=>$type]);
		//comitee.membersListYears
	}else {
		
		return view('frontsite.comitee_year', ['type'=>$type,'ctype'=>$theme->name]);
	}

    }*/

 public function membersComiteeList($type, $years=null){

 }
	public function donarList($member="")
    {
		//$member = $GET['member'];
		
		if(!empty($member)) {
			$donar =  Donation::where('status',20)->where('db_status','Live')->where('donation_holder',$member)->orderBy('id','DESC')->paginate(15);
		}else {
			$donar =  Donation::where('status',20)->where('db_status','Live')->orderBy('id','DESC')->paginate(15);
		}
	
     return view('frontsite.donar_all',['doanr'=>$donar]);
    }
	
	public function donarListSearch(Request $request)
    {
	
	$donar =  Donation::where('status',20)->where('db_status','Live')->where('donation_holder', 'like',  '%' . $request->holder .'%')->orderBy('id','DESC')->paginate(15);
		
     return view('frontsite.donar_all',['doanr'=>$donar]);
    }
	

    public function subscribe()
    {
			 Subcribe::create([
            'email'=>$_GET['email'],
        ]);
        
       
			
		session()->flash('message','Submit Successfully');

      return redirect()->back();
			
        /*
          return response()->json([
                'status' => 'success',
                'message' => 'Your Data submitted Successful'
            ]);
			
			*/

    }
	
	public function contactus()
    {
     return view('frontsite.contactus');
    }
	
	public function Contactstore()
    {
		
		//$form_name = $_GET['form_name'];
		
		 Contact::create([
            'form_name'=>$_GET['form_name'],
            'form_email'=>$_GET['form_email'],
            'form_phone'=>$_GET['form_phone'],
            'form_subject'=>$_GET['form_subject'],
            'form_message'=>$_GET['form_message'],

        ]);
        
         return response()->json([
                'status' => 'success',
                'message' => 'Your Data submitted Successful'
            ]);

    }
}
