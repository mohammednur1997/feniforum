@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('doantion')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="">{{ translate('donar')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('donar_list'))

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
                              
                               
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
											  <th>{{translate('sl')}}</th>
											  <th>{{translate('photo')}}</th>
                                                <th>{{translate('donar_name')}}</th>
                                                <th>{{translate('mobile')}}</th>
												 <th>{{translate('email')}}</th>
                                                <th>{{translate('amount')}}</th>
												 <th>{{translate('location')}}</th>
												 <th>{{translate('date')}}</th>
												 <th>{{translate('status')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($donat as $value)

                                            <tr>
											  <td>{{$value->id}}</td>
											<td><img src="{{ asset('upload/images/donar/'.$value->donation_photo)}}" alt="doanr" /  width="50" height="50"></td>
                                                <td>{{$value->donation_holder}}</td>
                                                <td>{{$value->donation_mobile}}</td>
                                                <td>{{$value->donation_email}}</td>
												  <td>{{$value->amount}}</td>
                                                <td>{{$value->donation_location}}</td>
                                              
                                                <td>{{$value->created_at}}</td>
												  <td><?php if($value->status==20) { echo "<font color='green'><b>Approved</b></font>";}else { echo "pending";} ?></td>
                                                <td>

												<?php if($value->status!=20) { ?>
												<a href="{{ route('donat_approv', $value->id) }}" class="btn btn-success"> {{translate('approval')}} </a>

												<?php } ?>
                                    <a href="{{ route('admin.donation.edit', $value->id) }}" class="btn btn-primary"> {{translate('edit')}} </a>

									<a onclick="return confirm('Are You sure went to delete the donar')" href="{{ route('admin.donation.destroy', $value->id) }}" class="btn btn-danger"> {{translate('Delete')}} </a>
                                               

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                  <th>{{translate('sl')}}</th>
											  <th>{{translate('photo')}}</th>
                                                <th>{{translate('donar_name')}}</th>
                                                <th>{{translate('mobile')}}</th>
												 <th>{{translate('email')}}</th>
                                                <th>{{translate('amount')}}</th>
												 <th>{{translate('location')}}</th>
												
												 <th>{{translate('date')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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