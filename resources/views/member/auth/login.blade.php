@extends('layouts.front_end')

@section('content')
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="{{ asset('upload/images/logo/'.app_config('BreadCumb'))}}">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title text-white" style="font-family: 'Montserrat', sans-serif;font-weight: 600">{{translate('login')}} </h2>
            </div>
          </div>
        </div>
      </div>
    </section>

            


	 <!-- Section: Donation -->
    <section id="donation">
      <div class="container mt-0 pt-50">
        <div class="section-content">
          <div class="row">
		   <div class="col-md-2">

       
       
		   </div>
            <div class="col-md-8 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="title text-black-666 line-bottom">{{translate('login')}}  <span class="text-theme-colored"> Now!</span></h3>

                <?php if(Session::has('message')): ?>
              <div class="alert alert-success">{{ Session::get('message') }}.</div>
              <?php endif; ?>

             
              <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
              <form id="paypal_donate_form_onetime_recurring" action="{{ route('member.login.check') }}" method="post">
              @csrf
                <div class="row">
				
				       	<div class="col-md-12">
                    <div class="form-group mb-20">
                         <label><strong>{{ translate('email') }}</strong></label> <br>
    					<input type="text" class="form-control" id="email" name="email" placeholder="{{ translate('email') }}" value="{{ old('email') }}"> 
    							           	@if ($errors->has('email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </font>
                                @endif
								  </div>
				   	</div>
					
					

                  	<div class="col-md-12">
                    <div class="form-group mb-20">
                    <label><strong>{{ translate('password') }}</strong></label> <br>
					<input type="password" class="form-control" name="password" placeholder="{{ translate('password') }}"  value="{{ old('password') }}"> 
                    @if ($errors->has('password'))
					<font color="red">
						<strong>{{ $errors->first('password') }}</strong>
						</font>
						@endif
					</div>
            </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">{{translate('login')}}</button>
                       
                       <a href="{{ route('memberregister') }}" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30">{{translate('Register')}}</a>

                       <a href="{{ route('member.password.request') }}" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30">{{translate('Forget Password')}}</a>

                      <!-- <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait..."></button> -->
                    </div>

                  </div>


              <div class="col-sm-12">
                  <div class="form-group">
                   <div class="col-md-6 col-md-offset-4">
                       <a href="{{ url('/login/github') }}" class="btn btn-github"><i class="fa fa-github"></i> Github</a>
                       <a href="{{ url('/login/twitter') }}" class="btn btn-twitter" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                       <a href="{{ url('/login/facebook') }}" class="btn btn-facebook" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                   </div>
                 </div>
              </div>

                 
                </div>
              </form>      
            </div>
			   <div class="col-md-2">
		   </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
@endsection

