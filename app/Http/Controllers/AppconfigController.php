<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AppconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.setting.index');
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
        //
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
        //
    }

      public function postLogoSetting(Request $request){

             $this->validate($request,[
            'app_fav'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'logo'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'breadcrumb'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);

        $logo = Input::file('logo');
        $footer_logo = Input::file('footer_logo');
        $app_fav = Input::file('app_fav');
        $breadcrumb = Input::file('breadcrumb');

                if ($app_fav != '') {
                    if ($request->hasFile('app_fav')){
                    $favicon = $request->app_fav->hashName();
                    $request->app_fav->move(('upload/images/logo'), $favicon);
                     }
                    AppConfig::where('setting', '=', 'AppFav')->update(['value' => $favicon]);
                }

                if ($logo != '') {
                    if ($request->hasFile('logo')){
                    $logo = $request->logo->hashName();
                    $request->logo->move(('upload/images/logo'), $logo);
                     }
                    AppConfig::where('setting', '=', 'AppLogo')->update(['value' => $logo]);
                }

                  if ($footer_logo != '') {
                    if ($request->hasFile('footer_logo')){
                    $footer_logo = $request->footer_logo->hashName();
                    $request->footer_logo->move(('upload/images/logo'), $footer_logo);
                     }
                    AppConfig::where('setting', '=', 'footer_logo')->update(['value' => $footer_logo]);
                }

                if ($breadcrumb != '') {
                    if ($request->hasFile('breadcrumb')){
                    $breadcrumb = $request->breadcrumb->hashName();
                    $request->breadcrumb->move(('upload/images/logo'), $breadcrumb);
                     }
                    AppConfig::where('setting', '=', 'BreadCumb')->update(['value' => $breadcrumb]);
                }

                //breadcrumb

        session()->flash('message','Update Successfully');
        return redirect()->back();


    }

    public function postGeneralSetting(Request $request)
    {

          $v = \Validator::make($request->all(), [
            'app_name' => 'required', 'app_title' => 'required', 'email' => 'required', 'mobile' => 'required', 'address' => 'required', 'FooterTxt' => 'required'
        ]);
        if ($v->fails()) {
            return redirect('admin/app')->withInput($request->all())->withErrors($v->errors());
        }

        $app_name = Input::get('app_name');
        $app_title = Input::get('app_title');
        $email = Input::get('email');
        $mobile = Input::get('mobile');
        $footer = Input::get('FooterTxt');
        $about_footer = Input::get('about_footer');
        $address = Input::get('address');
         if ($app_name != '') {
            AppConfig::where('setting', '=', 'AppName')->update(['value' => $app_name]);
        }
        if ($app_title != '') {
            AppConfig::where('setting', '=', 'AppTitle')->update(['value' => $app_title]);
        }
        if ($email != '') {
            AppConfig::where('setting', '=', 'email')->update(['value' => $email]);
        }
         if ($mobile != '') {
            AppConfig::where('setting', '=', 'mobile')->update(['value' => $mobile]);
        }
        if ($footer != '') {
            AppConfig::where('setting', '=', 'FooterTxt')->update(['value' => $footer]);
        }
        if ($about_footer != '') {
            AppConfig::where('setting', '=', 'about_footer')->update(['value' => $about_footer]);
        }

        if ($address != '') {
            AppConfig::where('setting', '=', 'address')->update(['value' => $address]);
        }

        session()->flash('message','Update Successfully');
        return redirect()->back();
       

    }

    public function localizationPost(Request $request)
    {
         $v = \Validator::make($request->all(), [
            'country' => 'required', 'date_format' => 'required', 'currency_code' => 'required', 'currency_symbol' => 'required', 'timezone' => 'required', 'cformat' => 'required', 'currency_decimal_digits' => 'required', 'currency_symbol_position' => 'required'
        ]);
        if ($v->fails()) {
            return redirect('admin/app')->withInput($request->all())->withErrors($v->errors());
        }
        $country = Input::get('country');
        $language = Input::get('language');
        $date_format = Input::get('date_format');
        $currency_code = Input::get('currency_code');
        $currency_symbol = Input::get('currency_symbol');
        $get_timezone = Input::get('timezone');
        $cformat = Input::get('cformat');
        $currency_decimal_digits = Input::get('currency_decimal_digits');
        $currency_symbol_position = Input::get('currency_symbol_position');

        if ($country != '' AND $date_format != '' AND $currency_code != '' AND $currency_symbol != '' AND $cformat != '' AND $currency_decimal_digits != '' AND $currency_symbol_position != '') {
            appConfig::where('setting', '=', 'Country')->update(['value' => $country]);
            appConfig::where('setting', '=', 'DateFormat')->update(['value' => $date_format]);
            appConfig::where('setting', '=', 'Currency')->update(['value' => $currency_code]);
            appConfig::where('setting', '=', 'CurrencyCode')->update(['value' => $currency_symbol]);

            if ($cformat == '1') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '']);
            } elseif ($cformat == '2') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => ',']);
            } elseif ($cformat == '3') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => ',']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '']);
            } elseif ($cformat == '4') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => ',']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '.']);
            } else {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => ',']);
            }

            appConfig::where('setting', '=', 'currency_decimal_digits')->update(['value' => $currency_decimal_digits]);

            appConfig::where('setting', '=', 'language')->update(['value' => $language]);
            
            appConfig::where('setting', '=', 'currency_symbol_position')->update(['value' => $currency_symbol_position]);


            if (env('TIME_ZONE') != $get_timezone) {
                appConfig::where('setting', '=', 'Timezone')->update(['value' => $get_timezone]);

                $timeZoneSetting = "\n" .
                    'TIME_ZONE=' . $get_timezone .
                    "\n";
                // @ignoreCodingStandard
                $env = file_get_contents(base_path('.env'));
                $rows = explode("\n", $env);
                $unwanted = "TIME_ZONE";
                $cleanArray = preg_grep("/$unwanted/i", $rows, PREG_GREP_INVERT);

                $cleanString = implode("\n", $cleanArray);
                $env = $cleanString . $timeZoneSetting;

                try {
                    file_put_contents(base_path('.env'), $env);
                } catch (\Exception $e) {
                    return redirect('settings/localization')->with([
                        'message' => $e->getMessage(),
                        'message_important' => true
                    ]);
                }
            }
        }

         session()->flash('message','Update Successfully');
        return redirect()->back();
    }

     public function postAllPage(Request $request)
    {
        $privacy = Input::get('privacy');
        $donor_privacy = Input::get('donor_privacy');
        $disclaimer = Input::get('disclaimer');
        $terms = Input::get('terms');
        $about = Input::get('about');
        $welcome = Input::get('welcome');

        //$page = '';

        
           if ($privacy != '') {
            $v = \Validator::make($request->all(), [
                'privacy' => 'required'
            ]);
          }
          if ($donor_privacy != '') {
            $v = \Validator::make($request->all(), [
                'donor_privacy' => 'required'
            ]);
          }
          if ($disclaimer != '') {
            $v = \Validator::make($request->all(), [
                'disclaimer' => 'required'
            ]);
          }
        if ($terms != '') {
            $v = \Validator::make($request->all(), [
                'terms' => 'required'
            ]);
          }
           if ($about != '') {
            $v = \Validator::make($request->all(), [
                'about' => 'required'
            ]);
          }

          if ($welcome != '') {
            $v = \Validator::make($request->all(), [
                'welcome' => 'required'
            ]);
          }

        if ($v->fails()) {
            return redirect('admin/app')->withInput($request->all())->withErrors($v->errors());
        }

      
      
        if ($privacy != '') {
            $page = 'privacy';
            AppConfig::where('setting', '=', 'privacy')->update(['value' => $privacy]);
        }
        if ($donor_privacy != '') {
             $page = 'donor_privacy';
            AppConfig::where('setting', '=', 'donor_privacy')->update(['value' => $donor_privacy]);
        }
        if ($disclaimer != '') {
             $page = 'donor_privacy';
            AppConfig::where('setting', '=', 'disclaimer')->update(['value' => $disclaimer]);
        }
         if ($terms != '') {
             $page = 'terms';
            AppConfig::where('setting', '=', 'terms')->update(['value' => $terms]);
        }
        if ($about != '') {
             $page = 'about';
            AppConfig::where('setting', '=', 'about')->update(['value' => $about]);
        }

         if ($welcome != '') {
             $page = 'welcome';
            AppConfig::where('setting', '=', 'welcome')->update(['value' => $welcome]);
        }
       




        session()->flash('message','Page Update Successfully');

        return redirect()->route( 'admin.index', [ 'page' => $page ] );

         // return view('admin.useful_page.index', [ 'page' => $page ] );

        //return redirect()->back();
       

    }
}
