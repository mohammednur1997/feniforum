@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('committeeMember.index')}}">{{ translate('committee')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('committee_edit')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



            @endsection
            @section('title', translate('edit_committee'))

            @section('content')

            @push('style') 


            @endpush()


                <div class="row">
                  <div class="col-md-4">
                          
                      </div>
                      <div class="col-md-4">
                          
                      </div>

                      <div class="col-md-4">
                           <div class="search">
                            <form action="{{ route('admin.Commitimember.search') }}">
                                @csrf
                                   <input class="form-control" type="text" name="search" placeholder="Search & Enter">
                            </form>
                           </div>
                      </div>

                </div>

                <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                              
                               
                                <div class="table-responsive">
                                  <!-- code for session message -->
                                  @if(Session::has('success'))
                                    <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      <li>{{ Session('success') }}</li>
                                    </div>
                                    @endif

                                   
                                      @if (Session::has('error'))
                                      <div class="alert alert-danger">
                               <button type="button" class="close" data-dismiss="alert">&times;</button>
                                          <li>{!! session('error') !!}</li>
                                      </div>
                                     @endif
                                  <!-- code for session message -->
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

                                              @foreach ($memr as $value)

                                                                <tr>
                                           <td>{{$value->id}}</td>
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
                      

     <a href="#addCommittee{{ $value->member_id }}" data-toggle="modal"  class="btn btn-sm btn-info">{{translate('Add Committee')}}</a>
              <!--Catagory Modal -->
                  <div class="modal fade" id="addCommittee{{ $value->member_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Add Committee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.committeeMemberList.store') }}" method="post" enctype="multipart/form-data">
            
                 @csrf
           
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $value->full_name }}">
            <input type="hidden" name="member_id" value="{{ $value->member_id }}">
            <input type="hidden" name="father_name" value="{{ $value->father_name }}">
            <input type="hidden" name="mother_name" value="{{ $value->mother_name }}">
  <input type="hidden" name="parmanent_address" value="{{ $value->parmanent_address }}">
            <input type="hidden" name="blood_group" value="{{ $value->blood_group }}">
            <input type="hidden" name="occapation" value="{{ $value->occapation }}">
        <input type="hidden" name="marital_status" value="{{ $value->marital_status }}">
            <input type="hidden" name="org_relation" value="{{ $value->org_relation }}">
            <input type="hidden" name="org_name" value="{{ $value->org_name }}">
        <input type="hidden" name=" applyer_photo" value="{{ $value->applyer_photo }}">
          <input type="hidden" name="referane_id" value="{{ $value->referane_id }}">
            <input type="hidden" name="join_date" value="{{ $value->join_date }}">
    
          </div>

           <div class="form-group">
                <label for="position">Position Name</label>
         <input type="text" class="form-control" name="position_name" placeholder="Write member Position Name">
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
        <input type="text" tabindex="1" name="committe_name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" required>
                 <div class="invalid-feedback">
                  {{translate('please_add_name')}}
                    </div>
                 </div>


              <div class="form-group">         
              <label><strong>{{ translate('member_type') }}</strong></label> <br>
              <select class="form-control" name="committe_year" required>
               <?php
              $memc =  App\Years::where('db_status','Live')->orderBy('id','desc')->get();
              ?>
                @foreach($memc as $memcs) 
                <option value="{{ $memcs->id }}"> {{ $memcs->name }}</option>
              @endforeach

            </select>
             </div>

             <div class="form-group">        
              <label><strong>{{ translate('committee_type') }}</strong></label> <br>
              <select class="form-control" name="committe_type" required>
               
          <?php foreach ($cmttype as $ctvalue): ?>

         
          <option value="{{ $ctvalue->id }}">{{ $ctvalue->name }}</option>
           <?php endforeach ?>

          </select>
           </div>

            <div class="form-group">
             <label for="priority">Priority</label>
            <input type="number" class="form-control" name="priority" placeholder="Write member priority">
             </div>
            
         <button class="btn btn-primary" type="submit">{{translate('Add Committee')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->

   <a href="#praCommittee{{ $value->member_id }}" data-toggle="modal"  class="btn btn-sm btn-danger">{{translate('Pradesik Commitee')}}</a>  
   
         <!--Catagory Modal -->
                  <div class="modal fade" id="praCommittee{{ $value->member_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Add Pradesik Committee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.committeeMemberList.pradesh.store') }}" method="post" enctype="multipart/form-data">
            
                 @csrf
           
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $value->full_name }}">
            <input type="hidden" name="member_id" value="{{ $value->member_id }}">
            <input type="hidden" name="father_name" value="{{ $value->father_name }}">
            <input type="hidden" name="mother_name" value="{{ $value->mother_name }}">
  <input type="hidden" name="parmanent_address" value="{{ $value->parmanent_address }}">
            <input type="hidden" name="blood_group" value="{{ $value->blood_group }}">
            <input type="hidden" name="occapation" value="{{ $value->occapation }}">
        <input type="hidden" name="marital_status" value="{{ $value->marital_status }}">
            <input type="hidden" name="org_relation" value="{{ $value->org_relation }}">
            <input type="hidden" name="org_name" value="{{ $value->org_name }}">
        <input type="hidden" name=" applyer_photo" value="{{ $value->applyer_photo }}">
          <input type="hidden" name="referane_id" value="{{ $value->referane_id }}">
            <input type="hidden" name="join_date" value="{{ $value->join_date }}">
          </div>

           <div class="form-group">
                <label for="position">Position Name</label>
         <input type="text" class="form-control" name="position_name" placeholder="Write member Position Name">
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
        <input type="text" tabindex="1" name="committe_name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" required>
                 <div class="invalid-feedback">
                  {{translate('please_add_name')}}
                    </div>
                 </div>


              <div class="form-group">         
              <label><strong>{{ translate('member_type') }}</strong></label> <br>
              <select class="form-control" name="committe_year" required>
               <?php
              $memc =  App\Years::where('db_status','Live')->orderBy('id','desc')->get();
              ?>
                @foreach($memc as $memcs) 
                <option value="{{ $memcs->id }}"> {{ $memcs->name }}</option>
              @endforeach

            </select>
             </div>

             <div class="form-group">        
              <label><strong>{{ translate('committee_type') }}</strong></label> <br>
              <select class="form-control" name="committe_type" required>
            <option value="4">Pradesik Commitee</option>
            </select>
           </div>

           <div class="form-group">        
              <label><strong>{{ translate('Select State') }}</strong></label> <br>
              <select class="form-control" name="State_id" required>
                  <?php
              $memc= App\State::where('db_status','Live')->orderBy('id','desc')->get();
              ?>
                @foreach($memc as $memcs) 
                <option value="{{ $memcs->id }}"> {{ $memcs->name }}</option>
              @endforeach
            </select>
           </div>

            <div class="form-group">
             <label for="priority">Priority</label>
            <input type="number" class="form-control" name="priority" placeholder="Write member priority">
             </div>
            
         <button class="btn btn-primary" type="submit">{{translate('Add Committee')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->               

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
                                {{ $memr->links() }}
                          
                            </div>
                        </div>
                    </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
      
 @push('jsfile') 

 <script src="{{ asset('static/back_end/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/sweetalert2/sweet-alert.init.js') }}"></script>

 <script src="{{ asset('static/back_end/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('static/back_end/dist/js/pages/forms/select2/select2.init.js') }}"></script>

 
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

     <script src="{{ asset('static/back_end/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('static/back_end/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
    // Date Picker
   
    jQuery('#startDate').datepicker({
       autoclose: true, 
      todayHighlight: true,
      startDate: new Date()
    });

    jQuery('#endDate').datepicker({
       autoclose: true, 
      todayHighlight: true,
      startDate: new Date()
    });


   

    </script>


     <script src="{{ asset('static/back_end/libs/ckeditor/ckeditor.js') }}"></script>
    <script src=" {{ asset('static/back_end/libs/ckeditor/samples/js/sample.js') }}"></script>
    <script>
    //default
    initSample();

    //inline editor
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.inline('editor2', {
        extraPlugins: 'sourcedialog',
        removePlugins: 'sourcearea'
    });

    var editor1 = CKEDITOR.replace('editor1', {
        extraAllowedContent: 'div',
        height: 460
    });
    editor1.on('instanceReady', function() {
        // Output self-closing tags the HTML4 way, like <br>.
        this.dataProcessor.writer.selfClosingEnd = '>';

        // Use line breaks for block elements, tables, and lists.
        var dtd = CKEDITOR.dtd;
        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
            this.dataProcessor.writer.setRules(e, {
                indent: true,
                breakBeforeOpen: true,
                breakAfterOpen: true,
                breakBeforeClose: true,
                breakAfterClose: true
            });
        }
        // Start in source mode.
        this.setMode('source');
    });
    </script>
 
 @endpush()
      
      @endsection