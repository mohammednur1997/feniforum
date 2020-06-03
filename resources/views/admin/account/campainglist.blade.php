@extends('admin.layout.admin_layout')
@section('title', translate('complete_event_list'))

@section('content')

@push('style') 
<link href="{{ asset('static/back_end/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush()

   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    @foreach($completeEvent as $memcs) 
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                               @php $i=1; @endphp
                                     @foreach($memcs->evetnIamge as $image)   
                                        @if($i > 0)  

  <a href="{{ route('admin.donation.index', $memcs->id) }}">                            
 <img height="200" width="200"  src="{{ asset('upload/images/event/'. $image->image) }}">  
  </a>
                                        @endif    
                                      @php $i--; @endphp
                                     @endforeach


                  <div class="containerMy mt-2">
                      <a href="{{ route('admin.donation.index', $memcs->id) }}"><h4 style="font-size: 13px"><b>Title: {{ $memcs->title }}</b></h4></a>
                      <p>Raised: 
                          
                        <?php 
                       $total = 0;
                       $total = App\Donation::where([
                                        ['campaing_type', $memcs->id],
                                        ['status',  20],
                                      ])->sum('amount');
                      ?>      
                        {{ $total }} Tk
                      </p>
                      <p>Goal: <span style="color: red">{{ $memcs->  goal_amount }} Tk</span></p>
                      <p>Description: {{ str_limit(strip_tags($memcs->campaing_description), 10) }}</p>

                <a class="btn btn-success btn-lg"  href="{{ route('admin.eventDetails', $memcs->event_id) }}">Details</a>
                  </div>
             
                            </div>
                        </div>
                    </div>
                     @endforeach
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
@endsection