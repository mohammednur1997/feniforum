        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                         
                          <li class="sidebar-item"><a href="{{ url('admin/dashboard')}}" class="sidebar-link"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('dashboard') }} </span></a>
                          </li>
                        

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>


                   @if(Auth::guard('admin')->user()->admin_type == 1 || Auth::guard('admin')->user()->admin_type == 2)
                          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('Account')}} </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('admin.collect.year') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('Collect_From_Member')}} </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('admin.eventCollect.year') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('Collect_From_Event')}} </span></a></li>

                                  <li class="sidebar-item"><a href="{{ route('admin.account.all') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('main_account')}} </span></a></li>
								
                                                         
                            </ul>
                        </li>
                        @endif

                       @if(Auth::guard('admin')->user()->admin_type == 1)
                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('member')}} </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('member.index') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('member_list')}} </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('member.create') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('member_add')}} </span></a></li>
                                
                                                         
                            </ul>
                        </li>
                        @endif
						 @if(Auth::guard('admin')->user()->admin_type == 1)
						 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('committee ')}} </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                                             
                                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('committeeMember.index') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('Add Committee Member')}} </span></a></li>

                                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.committeeMemberListPage') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('Committee Member List')}} </span></a></li>

                                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('committee.index') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('committee_type')}} </span></a></li>
								   
                                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('designation.index') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('designation')}} </span></a></li>
								   
								   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('years.index') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('years_management')}} </span></a></li>
                                  
                                  
                            </ul>
                        </li>
                        @endif

                    

                   @if(Auth::guard('admin')->user()->admin_type == 1 || Auth::guard('admin')->user()->admin_type == 2)
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('donation')}} </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('admin.alldonation') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('All Donar')}} </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('admin.donation.eventList') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('Campaing Donar')}} </span></a></li>

                            </ul>
                        </li>
                   @endif

                   @if(Auth::guard('admin')->user()->admin_type == 1 || Auth::guard('admin')->user()->admin_type == 3)

 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('blog')}} </span></a>

                            <ul aria-expanded="false" class="collapse  first-level">

                                  <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-none"></i><span class="hide-menu"> {{translate('blog_category')}}</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">


                                        <li class="sidebar-item"><a href="{{route('blogCat.create')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">{{translate('blog_category_add')}}  </span></a></li>

                                        <li class="sidebar-item"><a href="{{route('blogCat.index')}}" class="sidebar-link"><i class="mdi mdi-adjust"></i></i><span class="hide-menu">{{translate('blog_category_list')}}   </span></a></li>

                                    </ul>
                                </li>


                                <li class="sidebar-item"><a href="{{ route('blog.index') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('blog_list')}} </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('blog.create') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('blog_add')}} </span></a>
                                </li>
                               
                               
                            </ul>
                        </li>
                   @endif




                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('campaings')}} </span></a>



                            <ul aria-expanded="false" class="collapse  first-level">

                                 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-none"></i><span class="hide-menu"> {{translate('Campaing_category')}}</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">


                                        <li class="sidebar-item"><a href="{{ route('category.create') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">{{translate('Campaing_category_add')}}  </span></a></li>

                                        <li class="sidebar-item"><a href="{{ route('category.index') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i></i><span class="hide-menu">{{translate('Campaing_category_list')}}   </span></a></li>

                                    </ul>
                                </li>



                                <li class="sidebar-item"><a href="{{ route('campaing.index') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('campaings_list')}} </span></a></li>

                                <li class="sidebar-item"><a href="{{ route('campaing.create') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('Campaings_add')}} </span></a></li>
                               

                            </ul>
                             </li>

                             
     @if(Auth::guard('admin')->user()->admin_type == 1 || Auth::guard('admin')->user()->admin_type == 3)

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-none"></i><span class="hide-menu">{{translate('setting')}}</span></a>
                             <ul aria-expanded="false" class="collapse first-level">
                                 @if(Auth::guard('admin')->user()->admin_type == 1)
                                   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('app.index')}}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('general_settings')}} </span></a>
                                   </li>
                                   @endif

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('language.index') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('language_setting')}} </span></a>
                                    </li>


                                   @if(Auth::guard('admin')->user()->admin_type == 1)
                                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.Centralprotinidi')}}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('Central Protinidi')}} </span></a></li>

                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.protinidi') }}" aria-expanded="false"><i class="mdi mdi-border-top"></i><span class="hide-menu">{{translate('Protinidi')}} </span></a></li>
     


                                 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-none"></i><span class="hide-menu"> {{translate('locations')}}</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">


                                        <li class="sidebar-item"><a href="{{route('upozila.index')}}" class="sidebar-link"><i class="mdi mdi-border-all"></i><span class="hide-menu">{{translate('upozila')}}  </span></a></li>

                                        <li class="sidebar-item"><a href="{{route('union.index')}}" class="sidebar-link"><i class="mdi mdi-border-left"></i><span class="hide-menu">{{translate('union')}}   </span></a></li>

                                         <li class="sidebar-item"><a href="{{route('state.index')}}" class="sidebar-link"><i class="mdi mdi-border-left"></i><span class="hide-menu">{{translate('ksa_state')}}   </span></a></li>


                                    </ul>
                                </li>



                               <!--  <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-none"></i><span class="hide-menu"> {{translate('member_type')}}</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">


                                        <li class="sidebar-item"><a href="{{route('mtype.create')}}" class="sidebar-link"><i class="mdi mdi-border-all"></i><span class="hide-menu">{{translate('member_type_add')}}  </span></a></li>

                                        <li class="sidebar-item"><a href="{{route('mtype.index')}}" class="sidebar-link"><i class="mdi mdi-border-left"></i><span class="hide-menu">{{translate('member_type_list')}}   </span></a></li>

                                    </ul>
                                </li> -->
                                
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">{{ translate('front_site')}}</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item"><a href="{{route('slider.index')}}" class="sidebar-link"><i class="mdi mdi-border-vertical"></i><span class="hide-menu">{{translate('slider')}}</span></a></li>
                                      
                                      
                                        <li class="sidebar-item"><a href="{{route('admin.index')}}" class="sidebar-link"><i class="mdi mdi-border-style"></i><span class="hide-menu"> {{translate('useful_pages')}}</span></a></li>

                                         <li class="sidebar-item"><a href="{{route('social.index')}}" class="sidebar-link"><i class="mdi mdi-border-style"></i><span class="hide-menu"> {{translate('social_settings')}}</span></a></li>

                                          <li class="sidebar-item"><a href="{{route('gallery.index')}}" class="sidebar-link"><i class="mdi mdi-border-style"></i><span class="hide-menu"> {{translate('gallery')}}</span></a></li>

                                           <li class="sidebar-item"><a href="{{route('page.index')}}" class="sidebar-link"><i class="mdi mdi-border-style"></i><span class="hide-menu"> {{translate('page')}}</span></a></li>

                                    </ul>
                                </li>
                                @endif
                             
                               
                            </ul>
                        </li>

                        @endif
                    
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->