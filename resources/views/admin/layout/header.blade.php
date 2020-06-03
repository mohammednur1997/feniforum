        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{ url('/admin') }}" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('upload/images/logo/'.app_config('AppLogo'))}}" width="100" height="60px" alt="homepage" class="dark-logo" />
                              
                            </b>
                            <!--End Logo icon -->
                          
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                       
                   
				   
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               @if(Auth::guard('admin')->user()->admin_image)
                      <img src="{{ asset('upload/images/user/'. Auth::guard('admin')->user()->admin_image) }}" alt="user" class="rounded-circle" height="40" width="40">
                      @else
                        <img src="{{ asset('static/back_end/images/users/2.jpg') }}" alt="user" class="rounded-circle" width="40">
                       @endif 
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ Auth::guard('admin')->user()->admin_name}} <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">

                      @if(Auth::guard('admin')->user()->admin_image)
                      <img src="{{ asset('upload/images/user/'. Auth::guard('admin')->user()->admin_image) }}" alt="user" class="rounded-circle" height="40" width="40">
                      @else
                        <img src="{{ asset('static/back_end/images/users/2.jpg') }}" alt="user" class="rounded-circle" width="40">
                       @endif 
                   
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::guard('admin')->user()->admin_name}}</h4>
                                        <p class=" m-b-0">{{ Auth::guard('admin')->user()->email}}</p>
                                    </div>
                                </div>
                         @if(Auth::guard('admin')->user()->admin_type == 1)       
                        <a class="dropdown-item" href="{{ route('admin.create.user') }}">
                                    <i class="ti-user m-r-5 m-l-5"></i>  {{translate('create_new_user')}} </a>  
                                    
                          
                               
                            <a class="dropdown-item" href="{{ route('admin.inbox') }}">
                            <i class="ti-email m-r-5 m-l-5"></i> {{translate('inbox')}}<span class="badge badge-pill badge-danger ml-1">{{App\Contact::where('seen', 2)->count()}}</span></a>


                        @endif
                     <a class="dropdown-item" href="{{ route('admin.change.password') }}">
                                    <i class="ti-lock m-r-5 m-l-5"></i>  {{translate('change_password')}} </a>  

                                
                            <a class="dropdown-item" href="{{ route('account') }}">
                                    <i class="ti-settings m-r-5 m-l-5"></i> {{translate('account_setting')}}</a>

                           <form  action="{{ route('admin.logout.check') }}" method="post">
                                  @csrf
                                        <button type="submit" class="dropdown-item"><i class="fa fa-power-off m-r-5 m-l-5"></i>Logout</button>
                                    </form>
                               
                            </div>
                        </li>

                         

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>

                      <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->