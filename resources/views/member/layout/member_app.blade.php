 @include('admin.layout.cssfile')
 <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
	
	   <div id="main-wrapper">
	  @include('member.layout.header')
	   
	    @include('member.layout.nav')
		
		  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
		
		        <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">@yield('title')</h4>
                    </div>

                     @section('breadcrumb')
                    @show



                </div>
            </div>

           
            @include('include.error')
			
			  @yield('content')
			
			
			 <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="http://aastech.net" target="_blank">aastech</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
	
	 @include('admin.layout.footer')