<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="aastech" />

		<meta name="keywords" content="feniforum">
        <meta name="author" content="aastech">
        <meta name="revisit-after" content="2 days">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        	        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="">
        <meta itemprop="description" content="">
        <meta itemprop="image" content="">
        
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image:src" content="">
        
        <!-- Open Graph data -->
        <meta property="og:title" content="" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <meta property="og:description" content="" />
        <meta property="og:site_name" content="" />


<!-- Page Title -->
<title>{{ CompanyName() }} {{ CompanyTitle() }}  </title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
        <!-- css fonts -->
        <link href="https://fonts.maateen.me/bensen/font.css" rel="stylesheet">
        <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- Stylesheet -->
        <link href="{{ asset('css/my_style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('static/front_end/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('static/front_end/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('static/front_end/css/css-plugin-collections.css') }}" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ asset('static/front_end/css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ asset('static/front_end/css/style-main.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ asset('static/front_end/css/preloader.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ asset('static/front_end/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ asset('static/front_end/css/responsive.css') }}" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="{{ asset('static/front_end/css/colors/theme-skin-color-set-1.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('static/front_end/share/jquery.share.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/my_style.css') }}" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="{{ asset('static/front_end/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('static/front_end/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('static/front_end/js/bootstrap.min.js') }}"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('static/front_end/js/jquery-plugin-collection.js') }}"></script>

<!-- SCRIPTS -->
	 <script>
        $(document).ready(function(){
            $.ajaxSetup({
                'X-CSRF-Token' : "{{csrf_token()}}"
            })
        });
    </script>
	
	<script type="text/javascript">
    $(document).ready(function(){
        $('.set_langs').on('click',function(){
            var lang_url = $(this).data('href');                                    
            $.ajax({url: lang_url, success: function(result){
                location.reload();
            }});
        });
        
    });
</script>
</head>
