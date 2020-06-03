    @extends('admin.layout.admin_layout')

@section('content')

      <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                         
                    <form id="paypal_donate_form_onetime_recurring" action="{{ route('admin.account.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <img  class="rounded-circle" height="200px" width="200px" src="{{ asset('upload/images/user/'. Auth::guard('admin')->user()->admin_image) }}">
                    <div class="form-group">
                     <label><strong>{{ translate('Image') }}</strong></label> <br>
                    <input type="file" class="form-control" name="photo" >        
                    </div>


                    <div class="form-group mb-20">
                     <label><strong>{{ translate('Name') }}</strong></label> <br>
                    <input type="text" class="form-control" id="name" name="admin_name" placeholder="{{ translate('admin_name') }}" value="{{ Auth::guard('admin')->user()->admin_name  }}"> 

                    <input type="text" hidden name="id" value="{{ Auth::guard('admin')->user()->id}}"> 

                                        @if ($errors->has('admin_name'))
                                   <font color="red">
                                        <strong>{{ $errors->first('admin_name') }}</strong>
                                    </font>
                                @endif
                    </div>

                    <div class="form-group">
                     <label><strong>{{ translate('email') }}</strong></label> <br>
                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ translate('email') }}" value="{{ Auth::guard('admin')->user()->email}}"> 
                                @if ($errors->has('email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </font>
                                @endif
                        </div>
   
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">{{translate('Update')}}</button>
                    </div>

              
                  </form>      
                        

                     </div>
                </div>
                 <div class="col-md-4">
                        
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
               
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
            @endsection