@extends('admin.layout.admin_layout')
@section('title', translate('event_list'))

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
                    @foreach($event as $memcs) 
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

                <a class="btn btn-success"  href="{{ route('admin.donation.index', $memcs->id) }}">Donar</a>

            <a class="btn btn-danger" onclick="return confirm('You Went to Delete this Event')" href="{{ route('admin.event.destroy', [$event_id, $memcs->id]) }}">Delete</a>
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
			
@push('jsfile') 
<!--This page plugins -->


<script type="text/javascript">
    
  $(".delete").click(function(e){
                    e.preventDefault();
                    var linkURL = this.href;
                    warnBeforeRedirect(linkURL);
                });
                function warnBeforeRedirect(linkURL) {
                    swal({
                        title: "Alert!",
                        text: "Are you sure!",
                        confirmButtonColor: '#0C5889',
                        showCancelButton: true
                    }, function() {
                        window.location.href = linkURL;
                    });
                }

</script>
@endpush()
@endsection