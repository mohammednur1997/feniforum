 <!-- Footer -->
  <footer id="footer" class="footer bg-black-222" data-bg-img="{{ asset('static/front_end/images/footer-bg.png') }}">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-15" alt="" src="{{ asset('upload/images/logo/'.app_config('footer_logo'))}}">
            <p class="font-16 mb-10">{{ app_config('about_footer') }}</p>
            <ul class="styled-icons icon-dark mt-20">

            <?php
        $social_icon =  App\SocialiCon::where('db_status','Live')->orderBy('id','DESC')->take('5')->get();
      ?>
        @foreach($social_icon as $icon)
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="{{ $icon->link}}" data-bg-color="{{ $icon->color}}"><i class="{{ $icon->icon}}"></i></a></li>

        @endforeach

            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">{{translate('latest_blog')}}</h5>
            <div class="latest-posts">
<?php
$newsview =  App\Blog::where('db_status','Live')->orderBy('id','DESC')->take('3')->get();
?>

@foreach($newsview as $newsvalue)
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb" ><img alt="{{ $newsvalue->title}}" height="70px" width="70px" src="{{ asset('upload/images/blog/'.$newsvalue->fet_image)}}"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5">
                    <a href="{{ route('blog.id',$newsvalue->id) }}">{{ $newsvalue->blog_title}}</a>
                  </h5>
                  <p class="post-date mb-0 font-12">{{ $newsvalue->created_at}}</p>
                </div>
              </article>

@endforeach
             
          
            
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">{{translate('Useful_Links')}}</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="/usefulPage/privacy">{{translate('Privacy_Policy')}}</a></li>
              <li><a href="/usefulPage/donor_privacy">{{translate('Donor_Privacy_Policy')}}</a></li>
              <li><a href="/usefulPage/disclaimer">{{translate('Disclaimer')}}</a></li>
              <li><a href="/usefulPage/terms">{{translate('Terms_of_Use')}}</a></li>
             
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">{{translate('Quick_Contact')}}</h5>
            <ul class="list-border">
              <li><a href="#">{{app_config('mobile')}}</a></li>
              <li><a href="#">{{app_config('email')}}</a></li>
              <li><a href="#" class="lineheight-20">{{app_config('address')}}</a></li>
            </ul>
            <p class="font-16 text-white mb-5 mt-15">Subscribe to our newsletter</p>
            <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10" action="{{ route('subscribe') }}" method="get">
			
			 <!--<form id="contact_form" name="contact_form" class="" action="{{ route('subscribe') }}" method="get">-->
			@csrf
              <label class="display-block" for="mce-EMAIL"></label>
              <div class="input-group">
                <input type="email" value="" name="email" placeholder="Your Email"  class="form-control" data-height="37px" id="mce-EMAIL">
                <span class="input-group-btn">
				<button type="submit" id="btnSave" onclick="save()" class="btn btn-colored btn-theme-colored m-0">{{translate('submit')}}</button>
				
                    <!--<button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>-->
                </span>
              </div>
            </form>
            
            <!-- Mailchimp Subscription Form Validation-->
            <script type="text/javascript">
           
function save()
    {
      var url;
    
        url = "{!! route('subscribe') !!}";
   
       // ajax adding data to database
       $.ajax({
        url : url,
        type: "get",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
               swal(
                'Submit is Successfull! ',
                'Data has been save!',
                'success'
                )
             },
             error: function (jqXHR, textStatus, errorThrown)
             {
             swal(
                'Empty is Not Allow!',
                'error'
                )
            }
          });
     }
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">{{app_config('FooterTxt ')}}</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
               <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="#">FAQ</a>
                </li>
              
                <li>|</li>
                <li>
                  <a href="#">Support</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>