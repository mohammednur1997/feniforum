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
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                         
                    <form id="paypal_donate_form_onetime_recurring" action="{{ route('admin.changePassword.store') }}" method="post">
                    @csrf
                <div class="row">
        
                    <div class="col-md-6">
                    <div class="form-group mb-20">
                    <label><strong>{{ translate('new_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password" placeholder="{{ translate('password') }}"  value="{{ old('password') }}"> 
                    <input type="text" hidden="" name="email" value="{{ Auth::guard('admin')->user()->email}}">
                    <input type="text" hidden="" name="id" value="{{ Auth::guard('admin')->user()->id}}">
                    @if ($errors->has('password'))
                    <font color="red">
                        <strong>{{ $errors->first('password') }}</strong>
                        </font>
                        @endif
                    </div>
               </div>

                 <div class="col-md-6">
                    <div class="form-group mb-20">
                    <label><strong>{{ translate('Confirm_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm_password') }}"  value="{{ old('password_confirmation') }}"> 
                    @if ($errors->has('password_confirmation'))
                    <font color="red">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </font>
                        @endif
                    </div>
                </div>
          
          
                  <div class="col-sm-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">{{translate('Change')}}</button>
                    </div>
                  </div>

                 
                </div>
              </form>      
                        

                        </div>
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