@extends('admin.layout.admin_layout')

@section('title', $commiteeName->name)


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
                                                <th>{{translate('member_name')}}</th>
                                                <th>{{translate('Position')}}</th>
                                                <th>{{translate('member_id')}}</th>
                                                 <th>{{translate('Priority')}}</th>
                                                 <th>{{translate('Year')}}</th>
                                                <th>{{translate('Committee Name')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($committeeMemberLists as $value)

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
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->position_name}}</td>
                                                <td>{{$value->member_id}}</td>
                                                <td>{{$value->priority}}</td>
                                                <td>
                                                  
         @foreach(App\Years::where('id', $value->committe_year)->get() as $committe_year)
                         {{ $committe_year->id ==  $value->committe_year? $committe_year->name : ''}}
                     @endforeach
                                                </td>
                                                <td>
    @foreach(App\Committee::where('id', $value->committe_type)->get() as $committe_types)
                         {{ $committe_types->id ==  $value->committe_type? $committe_types->name : ''}}
                     @endforeach
                                                </td>
                                                
                                                <td>
                            

             <a href="#EditCommittee{{ $value->member_id }}" data-toggle="modal" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>

               <!--Catagory Modal -->
                  <div class="modal fade" id="EditCommittee{{ $value->member_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Edit Committee Member List</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.committeeMemberList.update', $value->id) }}" method="post" enctype="multipart/form-data">
                 @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $value->name }}">
                <input type="hidden" name="member_id" value="{{ $value->member_id }}">
             </div>

           <div class="form-group">
                <label for="position">Position Name</label>
         <input type="text" class="form-control" name="position_name" value="{{ $value->position_name }}">
            </div>


              <div class="form-group">
                <label for="mobile">Mobile</label>
         <input type="text" class="form-control" name="mobile" value="{{ $value->mobile }}">
              </div>

              <div class="form-group">
                <label for="location">Location</label>
            <input type="text" class="form-control" name="present_address" value="{{ $value->present_address }}">
              </div>

              <div class="form-group">
                <label for="validationCustom02">{{ translate('Committee Name')}}</label> <span class="text-danger">*</span>
        <input type="text" tabindex="1" name="committe_name" class="form-control" id="validationCustom02" value="{{ $value->committe_name }}" required>
                 <div class="invalid-feedback">
                  {{translate('please_add_name')}}
                    </div>
                 </div>


              <div class="form-group">         
              <label><strong>{{ translate('Committe Year') }}</strong></label> <br>
              <select class="form-control" name="committe_year" required>
               <?php
              $memc =  App\Years::where('db_status','Live')->orderBy('id','desc')->get();
              ?>
                @foreach($memc as $memcs) 
                <option value="{{ $memcs->id }}" {{ $memcs->id == $value->committe_year? 'selected':'' }}> {{ $memcs->name }}</option>
              @endforeach

            </select>
             </div>

              <div class="form-group">        
              <label><strong>{{ translate('committee_type') }}</strong></label> <br>
              <select class="form-control" name="committe_type" required>
               
          <?php foreach ($cmttype as $ctvalue): ?>

         
          <option value="{{ $ctvalue->id }}" {{ $ctvalue->id == $value->committe_type?"selected":"" }}>{{ $ctvalue->name }}</option>
           <?php endforeach ?>

          </select>
           </div>

            <div class="form-group">
             <label for="priority">Priority</label>
            <input type="number" class="form-control" name="priority" value="{{ $value->priority }}">
            <input type="text" hidden class="form-control" name="state_id" value="unknow">
             </div>
            
         <button class="btn btn-primary" type="submit">{{translate('Update')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->

         <form id="delete-form" action="{{ route('admin.committeeMemberList.destroy', $value->id) }}" method="get">
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