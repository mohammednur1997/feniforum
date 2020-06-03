@extends('admin.layout.admin_layout')
@section('title', translate('member_type'))

@section('content')
   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                  <?php if(Session::has('message')): ?>
              <div class="alert alert-success">{{ Session::get('message') }}.</div>
              <?php endif; ?>




              @if (count($errors) > 0)
              @foreach ($errors->all() as $error)   
            <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
              @endif
            

              <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
              <form action="{{ route('admin.donation.update', $value->id) }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row">

                       <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('Name') }}</strong></label> <br>
                      <input type="text" class="form-control" name="name" value="{{ $value->name }}"> 
                    </div>
                   </div>
                
                            <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('amount') }}</strong></label> <br>
        <input type="text" class="form-control" name="amount" value="{{ $value->amount }}"> 
                    </div>
                  </div>

                    <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('donar_holder') }}</strong></label> <br>
                 <input type="text" class="form-control" name="donation_holder" value="{{ $value->donation_holder }}"  > 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('mobile') }}</strong></label> <br>
                                <input type="text" class="form-control" name="donation_mobile" value="{{ $value->donation_mobile }}"> 
                    </div>
                  </div>
                  
                  


                    <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('email') }}</strong></label> <br>
                                <input type="text" class="form-control" name="donation_email" value="{{ $value->donation_email }}" > 
                    </div>
                  </div>
                  
                   <div class="col-md-12">
                    <img height="200px" width="200px" src="{{ asset('upload/images/donar/'.$value->donation_photo) }}">
                    <div class="form-group mb-20">
                    <label><strong>{{ translate('donar_photo') }}</strong></label> <br>
                    <input type="file" class="form-control" name="donation_photo" > 
                    </div>
                    </div>

                
                    <div class="col-md-12">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('donation_address') }}</strong></label> <br>
                                 <textarea name="donation_location" class="form-control">
                                 {{ $value->donation_location }}
                             </textarea>
                      </div>
                    </div>

      
                     <div class="col-md-12">
                      <div class="form-group mb-20">
                      <label><strong>{{ translate('charity_select') }}</strong></label> <br>
                                <select class="form-control" name="donation_type" required>
                        <?php
                         $campaing = App\Campaing::orderBy('id', "asc")->get();
                        ?>

                        @foreach($campaing as $campaings) 
                        <option value="{{ $campaings->id }}" <?php if($campaings->id == $value->campaing_type) { echo "selected='selected'"; } ?>>{{ $campaings->title }}</option>
                      @endforeach

                    </select>
                     </div>
                     </div>   
        

                    <div class="col-md-12">
                <img height="200px" width="200px" src="{{ asset('upload/images/payment_document/'.$value->donation_slip) }}">
                    <div class="form-group mb-20">
                    <label><strong>{{ translate('payment_document') }}</strong></label> <br>
                    <input type="file" class="form-control" name="document"> 
                    </div>
                    </div>

                      <div class="col-md-8">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('Payment Type') }}</strong></label> <br>
                <input type="text" class="form-control" name="donation_email" value="{{ $value->payment_type }}" readonly> 
                      </div>
                    </div>

                <div class="col-md-8">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('Payment Trxid') }}</strong></label> <br>
                 <input type="text" class="form-control" name="donation_email" value="{{ $value->payment_txid }}" readonly> 
                      </div>
                    </div>


                    <div class="col-md-6">
                    <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" name="agree" class="custom-control-input" id="invalidCheck" value="check" required>
                    <label class="custom-control-label" for="invalidCheck">{{translate('agree_to_terms_and_conditions')}} <a href=""> here </a></label>
                    </div>                       
                    </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">{{translate('Submit')}}</button>
                        </div>
                      </div>
                    </div>
                  </form>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
      
 
      
      @endsection