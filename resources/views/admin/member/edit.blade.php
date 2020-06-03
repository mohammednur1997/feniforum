@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('member.index')}}">{{ translate('member')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('member_edit')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('edit_member'))

@section('content')

@push('style') 
<link href="{{ asset('static/back_end/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('static/back_end/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('static/back_end/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/back_end/libs/ckeditor/samples/css/samples.css') }}">
@endpush()




   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           

    <form class="needs-validation" role="form" action="{{route('member.update',$member->id)}}" method="post" novalidate enctype="multipart/form-data">
                         
                        {{csrf_field()}}
                      {{method_field('put')}}

									
	<div class="row">
				
				

                            
                             
                         	<div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('member_id') }}</strong></label> <br>
					            <input type="text" class="form-control" name="member_id"  value="{{ $member->member_id }}"> 
                    </div>
                  </div>
				
					<div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('full_name') }}</strong></label> <br>
<input type="text" class="form-control" name="full_name" placeholder="{{ translate('full_name') }}" value="{{ $member->full_name }}"> 
                    </div>
                  </div>

                  	<div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('mobile_home') }}</strong></label> <br>
<input type="text" class="form-control" name="mobile" placeholder="{{ translate('mobile_home') }}"  value="{{ $member->mobile }}"> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('mobile_work') }}</strong></label> <br>
<input type="text" class="form-control" name="mobile_work" placeholder="{{ translate('mobile_work') }}"  value="{{ $member->mobile_work }}"> 
                    </div>
                  </div>


                  	<div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('father_name') }}</strong></label> <br>
<input type="text" class="form-control" name="father_name" placeholder="{{ translate('father_name') }}"  value="{{ $member->father_name }}"> 
                    </div>
                  </div>

                  	<div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('mother_name') }}</strong></label> <br>
<input type="text" class="form-control" name="mother_name" placeholder="{{ translate('mother_name') }}"  value="{{ $member->mother_name }}"> 
                    </div>
                  </div>

        <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('upozila') }}</strong></label> <br>
<select class="form-control" name="upozila_id" onChange="htmlData('{{route('getUnion')}}', 'cid='+upozila_id.value)" required>
           <?php
					$upozila =  App\Upozila::where('db_status','Live')->orderBy('id','desc')->get();
				  ?>
				  	@foreach($upozila as $upozilas) 
            <option value="{{ $upozilas->id }}" <?php if($member->upozila_id==$upozilas->id) { echo"selected";} ?> >{{ $upozilas->name }}</option>
          @endforeach

        </select>
         </div>
         </div>

      

             <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('union') }}</strong></label> <br>
					<select class="form-control" name="union_id" required>
           <?php
					$union =  App\Union::where('db_status','Live')->orderBy('id','desc')->get();
				  ?>
				  	@foreach($union as $unions) 
            <option value="{{ $unions->id }}" <?php if($member->union_id==$unions->id) { echo"selected";} ?>>{{ $unions->name }}</option>
          @endforeach

        </select>
         </div>
         </div>

		
				 


                    <div class="col-md-12">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('permanent_address') }}</strong></label> <br>
					             <textarea name="parmanent_address" class="form-control">{{ $member->parmanent_address }}</textarea>
                      </div>
				            	</div>

                       <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('ksa_state') }}</strong></label> <br>
					<select class="form-control" name="state_id" required>
           <?php
					$state =  App\State::where('db_status','Live')->orderBy('id','desc')->get();
				  ?>
				  	@foreach($state as $states) 
            <option value="{{ $states->id }}" <?php if($member->state_id==$states->id) { echo"selected";} ?>>{{ $states->name }}</option>
          @endforeach

        </select>
         </div>
         </div>
				  
                        <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('present_address') }}</strong></label> <br>
					             <textarea name="present_address" class="form-control">{{ $member->present_address }}</textarea>
                      </div>
				            	</div>

                      
				 <div class="col-md-6">
            <div class="form-group mb-20">
            <label><strong>{{ translate('email') }}</strong></label> <br>
            <input type="email" class="form-control" name="email" placeholder="{{ translate('email') }}" value="{{ $member->email }}"> 
            </div>
        </div>

          <div class="col-md-6">
              <div class="form-group mb-20">
              <label><strong>{{ translate('password') }}</strong></label> <br>
              <input type="password" class="form-control" name="password" placeholder="{{ translate('password') }}"> 
              </div>
          </div>

				  
				   <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('dob') }}</strong></label> <br>
<input type="text" class="form-control required date-picker" autocomplete="off" name="dob" placeholder="{{ translate('dob') }}" value="{{ $member->dob }}"> 
                    </div>
          </div>
				  
				   <div class="col-md-6">
                    <div class="form-group mb-20">
            <label><strong>{{ translate('occapation') }}</strong></label> <br>
<input type="text" class="form-control" name="occapation" placeholder="{{ translate('occapation') }}" value="{{ $member->occapation }}"> 
                    </div>
          </div>

           <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('marital_status') }}</strong></label> <br>
					<select class="form-control" name="marital_status" required>
          <option value="married" <?php if($member->marital_status=="married") { echo"selected";} ?>>Married</option>
          <option value="unmarried" <?php if($member->marital_status=="unmarried") { echo"selected";} ?>>Unmarried</option>
        </select>
         </div>
          </div>

           <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('blood_group') }}</strong></label> <br>
					<select class="form-control" name="blood_group" required>
            <option value="A+" <?php if($member->blood_group=="A+") { echo"selected";} ?>>A+</option>
			<option value="A-" <?php if($member->blood_group=="A-") { echo"selected";} ?>>A-</option>
			<option value="B+" <?php if($member->blood_group=="B+") { echo"selected";} ?>>B+</option>
			<option value="B-" <?php if($member->blood_group=="B-") { echo"selected";} ?>>B-</option>
			<option value="O+" <?php if($member->blood_group=="O+") { echo"selected";} ?> >O+</option>
			<option value="O-" <?php if($member->blood_group=="O-") { echo"selected";} ?>>O-</option>
		<option value="AB+" <?php if($member->blood_group=="AB+") { echo"selected";} ?>>AB+</option>
		<option value="AB-" <?php if($member->blood_group=="AB-") { echo"selected";} ?>>AB-</option>

        </select>
         </div>
          </div>
		  
		   <div class="col-md-6">
                    <div class="form-group mb-20">
                      <label><strong>{{ translate('join_date') }}</strong></label> <br>
					   <input type="text" class="form-control required date-picker" name="join_date" placeholder="{{ translate('join_date') }}" value="{{ $member->join_date }}"> 
                    </div>
          </div>
		  
		  	  <div class="col-md-6">
					<div class="form-group mb-20">
					<label><strong>{{ translate('member_photo') }}</strong></label> <br>
					<input type="file" class="form-control" name="applyer_photo" placeholder="{{ translate('member_photo') }}"> 
					 <img src="{{ asset('upload/images/member/'.$member->applyer_photo)}}" width="300" height="250" >
					</div>
					</div>
					
          <div class="col-md-6">
          <div class="form-group">
          <label><strong>{{ translate('refer') }}</strong></label> <br>
          <input type="text" class="form-control" name="referane_name" placeholder="{{ translate('refer') }}" value="{{ $member->referane_name }}"> 
          </div>
          </div>

              <div class="col-md-6">
              <div class="form-group">
              <label><strong>{{ translate('org_name') }}</strong></label> <br>
              <input type="text" class="form-control" name="org_name" placeholder="{{ translate('org_name') }}" value="{{ $member->org_name }}"> 
              </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
              <label><strong>{{ translate('position') }}</strong></label> <br>
              <input type="text" class="form-control" name="org_relation" placeholder="{{ translate('position') }}" value="{{ $member->org_relation }}"> 
              </div>
              </div>


           <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('status') }}</strong></label> <br>
					<select class="form-control" name="status" required>
          <option value="20" <?php if($member->status=="20") { echo"selected";} ?>>Approved</option>
          <option value="1" <?php if($member->status=="1") { echo"selected";} ?>>Pending</option>
        </select>
         </div>
          </div>
		  
		  
		  
		     <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('member_type') }}</strong></label> <br>
					<select class="form-control" name="member_type" required>
           <?php
					$memc =  App\MemberCategory::where('db_status','Live')->orderBy('id','desc')->get();
				  ?>
				  	@foreach($memc as $memcs) 
            <option value="{{ $memcs->id }}" <?php if($member->member_type==$memcs->id) { echo"selected";} ?>>{{ $memcs->name }}</option>
          @endforeach

        </select>
         </div>
         </div>
				  
        <div class="col-md-6">
        <div class="form-group">
        <label><strong>{{ translate('member_position') }}</strong></label> <br>
        <input type="text" class="form-control" name="member_position" placeholder="{{ translate('member_position') }}" value="{{ $member->member_position }}"> 
        </div>
        </div>
		 
		   <div class="col-md-6">
          <div class="form-group mb-20">
          <label><strong>{{ translate('payment_status') }}</strong></label> <br>
					<select class="form-control" name="payment_status" required>
          <option value="6" <?php if($member->payment_status=="6") { echo"selected";} ?>>Paid</option>
          <option value="1" <?php if($member->payment_status=="1") { echo"selected";} ?>>Pending</option>
        </select>
		
		 <img src="{{ asset('upload/images/payment_document/'.$member->payment_document)}}" width="200" height="200" >
         </div>
          </div>
				  

                  <div class="col-sm-12">
                    <div class="form-group">
<button type="submit" class="btn btn-flat btn-dark btn-block" data-loading-text="Please wait...">{{translate('submit_now')}}</button>
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
   
    jQuery('#dob').datepicker({
       autoclose: true, 
      todayHighlight: true,
    });

    jQuery('.join_date').datepicker({
       autoclose: true, 
      todayHighlight: true,
     
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