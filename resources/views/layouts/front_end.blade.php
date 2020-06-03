@include('include.header')
<body class="">
   <div id="wrapper" class="clearfix">
   
   <div class="btn-block text-center showBanner padding-top-10 padding-bottom-10" style="display:none;">This site uses cookies, by continuing to use the service, you accept our use of cookies <button class="btn btn-sm btn-success" id="close-banner">I agree</button></div>
   
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img alt="" src="{{ asset('static/front_end/images/preloaders/8.gif') }}">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  @include('include.nav_header')
  <div class="main-content">
  @yield('content')
  </div>
  
  
  @include('include.footer')
  </div>

  
<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="{{ asset('static/front_end/js/custom.js') }}"></script>
<script src="{{ asset('js/ajax_req.js') }}"></script>
<script src="{{ asset('js/cookies.js') }}"></script>
<script src="{{ asset('static/front_end/share/jquery.share.js') }}"></script>

<script>
	$(document).ready(function() {
		$('#share').share({
			networks: ['facebook','googleplus','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
			theme: 'square'
		});
	});
</script>

<script type="text/javascript">

	Cookies.set('cookieBanner');

		$(document).ready(function() {
    if (Cookies('cookieBanner'));
    else {
    	$('.showBanner').fadeIn();
        $("#close-banner").click(function() {
            $(".showBanner").slideUp(50);
            Cookies('cookieBanner', true);
        });
    }
});
	</script>
  

	
</body>


</html>