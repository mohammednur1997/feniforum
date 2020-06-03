  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-theme-color-2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-5 pt-10 pb-10">
            <div class="widget no-border m-0">
              <ul class="list-inline">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">{{app_config('mobile')}}</a> </li>
               <!-- <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> Mon-Fri 8:00 to 2:00 </li>-->
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">{{app_config('email')}}</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-5 pt-10 pb-10">
            <div class="widget no-border m-0">
              <ul class="list-inline text-right sm-text-center">
                 <li><a href="{{route('BlogAll')}}" class="text-white">{{translate('blog')}}</a></li>
                <li class="text-white">|</li>
                <li>
                  <a href="{{ route('member.login') }}" class="text-white">{{translate('login')}}</a>
                </li>
                <li class="text-white">|</li>
                <li>
                  <a href="{{ route('donarList') }}" class="text-white">{{translate('donar_list')}}</a>
                </li>

                <!--   <li>
                      <div id="google_translate_element"></div>
                  </li>

                  <script type="text/javascript">
                      function googleTranslateElementInit() {
                          new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,ar', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                      }
                  </script>

                  <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

                      
 <li class="text-white">|</li>

                          <li class="dropdown flags">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if(Session::get('language')){
                              $set_lang =  Session::get('language');
                            } else {
                                $set_lang = app_config('Language');
                            }
                            $lid = App\Language::where('db_field',$set_lang)->first()->id;
                            $lnm = App\Language::where('db_field',$set_lang)->first()->name;
                        ?>
      <img src="{{ asset('upload/images/language_list_image/language_list_'.$lid.'.jpg')}}" width="20px;" alt=""/> <span class="hidden-xs"><font color="white" >{{ ucwords($lnm) }}</font></span><i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                          <?php
                          $language =  App\Language::where('db_status','Live')->orderBy('id','DESC')->take('5')->get();
                          ?>

                          @foreach($language as $languages)
                        <li
              <?php if($set_lang == $languages->db_field){ ?>class="active"<?php } ?> 
                          >

      <a href="{{ route('set_language', $languages->db_field) }}">
              <img src="{{ asset('upload/images/language_list_image/language_list_'.$languages->id.'.jpg')}}" width="20px;" alt=""/>

                          <?php echo ucwords($languages->name); ?>

                          <?php if($set_lang == $languages->db_field){ ?>

                          <i class="fa fa-check"></i>

                          <?php } ?>
                      </a>
                          </li>
                          @endforeach

                    </ul>
                </li>
          
            </ul>
            
            </div>
          </div>
          <div class="col-md-2 pb-10">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                  
                  <li class="mt-sm-10 mb-sm-10">
                  <a class="btn btn-default btn-flat btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('donation') }}">{{translate('Donate')}}</a>
                                  </li>
                    <li class="mt-sm-10 mb-sm-10">
                  <a class="btn btn-primery btn-flat btn-xs bg-light p-5 font-11 pl-12 pr-10" href="{{ route('member_add_front') }}">{{translate('apply_join')}}</a>
                    </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a style="color:#ED1C24;font-size: 16px;font-family: 'BenSen', Arial, sans-serif !important;" class="menuzord-brand pull-left flip" href="{{ url('/') }}">
              <img src="{{ asset('upload/images/logo/'.app_config('AppLogo'))}}" alt="">
                সৌদি আরবস্থ ফেনী প্রবাসী ফোরাম
            </a>
            <ul class="menuzord-menu">
              <li><a href="/">{{translate('home')}}</a></li>
              <li><a href="{{ route('about') }}">{{translate('about_us')}}</a></li>
              <li><a href="#">{{translate('committee')}}</a>
                <ul class="dropdown">
              <?php
              $commete =  App\Committee::where('db_status','Live')->orderBy('id','asc')->get();
              ?>
	             @foreach($commete as $cometee)
                  <li><a href="{{ route('front.yearList', $cometee->id) }}">{{ $cometee->name }}</a></li>
                  @endforeach
                  </ul>
                 
              </li>
              <li><a href="{{ url('/gallery_list') }}">{{translate('gallery')}}</a></li>
			   <li><a href="#">{{translate('Charity')}}</a>
        <ul class="dropdown">
			  <li><a href="{{ route('event.complete') }}">{{translate('Complete_Event')}}</a></li>
        <li><a href="{{ route('event.current') }}">{{translate('Current_Event')}}</a></li>
        <li><a href="{{ route('event.yearly') }}">{{translate('Yearly_Event')}}</a></li>
			<li><a href="{{ route('event.permanent') }}">{{translate('Permanent_Event')}}</a></li>
        </ul>
              </li>

              <li><a href="{{route('BlogAll')}}">{{translate('blog')}}</a></li>
                <li><a href="{{ route('membersList') }}">{{translate('members')}}</a></li>
             <li><a href="{{route('contactus')}}">{{translate('contact_us')}}</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>