@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('committeeMember.index')}}">{{ translate('committee')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('committee')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('committee'))

@section('content')

@push('style') 


@endpush()




   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
    <form class="needs-validation" role="form" action="{{route('committeeMember.store')}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}
					  
<div class="row">

       <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                           

	

                   
								
                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('title')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>


                             
							   
							    <div class="form-group">
									  <label><strong>{{ translate('years') }}</strong></label> <br>
												<select class="form-control" name="years" required>
												<option value="">select years</option>
												<?php
												$memc =  App\Years::where('db_status','Live')->orderBy('id','desc')->get();
											  ?>
												@foreach($memc as $memcs) 
										<option value="{{ $memcs->id }}">{{ $memcs->name }}</option>
									  @endforeach

									</select>
									 </div>
        
                                
                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('committee_type')}}</label> <span class="text-danger">*</span>
                                     
                                      <select class="select2 form-control  custom-select" name="comite" id="validationCustom02" style="width: 100%; height:36px;" required>
                                    <option value="">{{ translate('select')}}</option>
                                 
                                 
                                      <?php foreach ($cmttype as $key => $value): ?>

                                  <option value="{{$value->id}}">{{$value->name}}</option>
                                   
                                 <?php endforeach ?>
                                    
                                </select>
                                        <div class="invalid-feedback">
                                           {{translate('please_select_type')}}
                                        </div>
                                 
                                </div>


									 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('note')}}</label>
                                     
                                      <textarea name="note" id="ckeditor" rows="5" cols="5" class="ckeditor"></textarea>

                                     

                                 
                                </div>
                               

                                 <!--<div class="form-group">
                                       <label for="validationCustom02">{{ translate('note')}}</label>
                                      <textarea name="note" id="note" rows="5" cols="5" class="form-control"></textarea>
                                </div>-->
                              

                                <button class="btn btn-primary" type="submit">{{ translate('submit')}}</button>
                           
                           
                        </div>
                    </div>
                </div>
				
<div class="col-lg-6">

<div class="card">
<div class="card-body">
					  								
<div class="form-group">
@foreach($memr as $member)
<div class="checkbox"><label><input type="checkbox" name="member[]" value="{{ $member->id }}"> {{ $member->full_name }} </label></div>
@endforeach
</div>
</div>
</div>
</div>


					
      
</form>
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