@extends('admin.layout.admin_layout')
@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('member')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('member.create')}}">{{ translate('member_add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                @endsection
                @section('title', translate('member_list'))
                @section('content')

   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                      <div class="col-md-4">
                          
                      </div>
                      <div class="col-md-4">
                          
                      </div>

                      <div class="col-md-4">
                           <div class="search">
                            <form action="{{ route('admin.member.search') }}">
                                @csrf
                                   <input class="form-control" type="text" name="search" placeholder="Search & Enter">
                            </form>
                           </div>
                      </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                               
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('sl')}}</th>
                                                <th>{{translate('photo')}}</th>
                                                <th>{{translate('member_name')}}</th>
                                                <th>{{translate('member_id')}}</th>
												 <th>{{translate('mobile')}}</th>
												
												 <th>{{translate('location')}}</th>
                                                <th>{{translate('date')}}</th>
												<th>{{translate('status')}}</th>
                                               
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($member as $value)

                                            <tr>
											 <td>{{$loop->index + 1}}</td>
											<td>

                                            <?php
                                                 $menimgae = 'upload/images/member/'.$value->applyer_photo;

                                                if(file_exists($menimgae) && !empty($value->applyer_photo)) { ?>
                                                <img src="{{ asset('upload/images/member/'.$value->applyer_photo)}}" alt="member"  width="50" height="50">

                                                <?php }else { ?>
                                                <img src="{{ asset('upload/no-men.svg')}}"  width="50" height="50">

                                            <?php } ?>

                                        
                                           </td>
                                                <td>{{$value->full_name}}</td>
                                                <td>{{$value->member_id}}</td>
                                                <td>{{$value->mobile}}</td>
                                                <td>{{$value->present_address}}</td>
                                                <td>{{date("F j, Y g:i a", strtotime($value->created_at))}}</td>
                                                <td><?php if($value->status==20) { echo "<font color='green'><b>Approved</b></font>";}else { echo "pending";} ?></td>
												
                                                <td>
												<?php if($value->status!=20) { ?>
												<a href="{{ route('approv', $value->id) }}" class="btn btn-sm btn-success"> {{translate('approval')}} </a>
												<?php } ?>

												<a href="{{ route('member.edit', $value->id) }}" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>

                                            

         <form id="delete-form" action="{{ route('member.destroy', $value->id) }}" method="get">
            @csrf
             <button onclick="return confirm('Are You Sure went to Delete')"  class="btn btn-sm btn-danger"> {{translate('delete')}} </button>                       
            </form>

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>{{translate('sl')}}</th>
                                                <th>{{translate('photo')}}</th>
                                                <th>{{translate('member_name')}}</th>
                                                <th>{{translate('member_id')}}</th>
												 <th>{{translate('mobile')}}</th>
												
												 <th>{{translate('location')}}</th>
                                                <th>{{translate('date')}}</th>
												<th>{{translate('status')}}</th>
                                               
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                 {{ $member->links() }}
                                  
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