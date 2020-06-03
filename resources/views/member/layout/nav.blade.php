        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                          <li class="sidebar-item"><a href="{{ url('member/home')}}" class="sidebar-link"><i class="mdi mdi-av-timer"></i><span class="hide-menu"> {{ translate('dashboard') }} </span></a></li>
							<li class="sidebar-item"><a href="{{ route('member.blog.add') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> {{ translate('blog_add')}} </span></a></li>
                        
                     
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->