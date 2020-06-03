@extends('admin.layout.admin_layout')
@section('title', translate('Commitee List'))


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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                               <?php
            $commtiee =  App\Committee::orderBy('id', 'asc')->get();
            ?>
            @foreach($commtiee as $memcs) 

             <a href="{{ route('admin.committeeMemberList', $memcs->id) }}" class="btn btn-primary">{{ $memcs->name }}</a>
            
            @endforeach
                                  
                            </div>
                        </div>
                    </div>
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