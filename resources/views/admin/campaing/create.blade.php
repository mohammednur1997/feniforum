@extends('admin.layout.admin_layout')

@section('breadcrumb')
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('campaing.index')}}">{{ translate('campaing')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('campaing_add')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
@endsection
@section('title', translate('create_campaing'))

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
                           

    <form action="{{ route('campaing.store') }}" method="post"  enctype="multipart/form-data">
                         
                      {{csrf_field()}}

                               <div class="form-group">
                                       <label for="validationCustom02">{{ translate('title')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="title" class="form-control"  placeholder="{{('title')}}" value="{{ old('title') }}" required>
                                  
                                        <div class="invalid-feedback">
                                           {{translate('please_add_title')}}
                                        </div>
                                 </div>

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Event type')}}</label> <span class="text-danger">*</span>
                                     
                              <select class="form-control  custom-select" name="event_id"  style="width: 100%; height:36px;" required>
                                
                                <option value="2">Current Event</option>
                                <option value="2">Yearly Event</option>
                                <option value="2">Permanent Event</option>
                     
                                    </select>
                                        <div class="invalid-feedback">
                                           {{translate('please_type_select')}}
                                        </div>
                                </div>

                                 <div class="form-group">
                                       <label for="year">{{ translate('Event Year')}}</label> <span class="text-danger">*</span>
                                     
                              <select class="form-control  custom-select" name="eventYear_id"  style="width: 100%; height:36px;" required>
                                @foreach(App\EventYear::get() as $event)
                                <option value="{{ $event->id }}">{{ $event->year_name }}</option>
                                @endforeach
                                    </select>
                                        <div class="invalid-feedback">
                                           {{translate('please_type_select')}}
                                        </div>
                                </div>

                                 <div class="form-group">
                      <label for="category">{{ translate('Event Category')}}</label> <span class="text-danger">*</span>
                                     
                        <select class="form-control"  name="campCategeroy_id" required>
                                 
                          @foreach(App\Category::get() as $category)
                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                    
                                </select>
                                      
                                </div>

                                 <div class="form-group">
                                       <label for="Location">{{ translate('Camping Location')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="campaing_location" class="form-control"  placeholder="{{('Camping Location')}}">
                                  
                                        <div class="invalid-feedback">
                                           {{translate('Camping Location')}}
                                        </div>
                                 </div>

                                  <div class="form-group">
                                       <label for="description">{{ translate('Description')}}</label> <span class="text-danger">*</span>
                                      
                                       <textarea name="campaing_description" id="ckeditor" cols="50" rows="15" class="ckeditor"></textarea>

                                        <div class="invalid-feedback">
                                           {{translate('please_add_title')}}
                                        </div>
                                 
                                </div>
                                 <!-- Start image teg -->
                                <div class="form-group">
                                       <label for="image">{{ translate('image')}}</label> <span class="text-danger">*</span>
                                      
                                       <input id="image" type="file" name="image[]">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                 
                                </div>
                                <div class="form-group">
                                       <label for="image">{{ translate('image')}}</label> 
                                      
                                       <input id="image" type="file" name="image[]">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                 
                                </div>
                                <div class="form-group">
                                       <label for="image">{{ translate('image')}}</label> 
                                      
                                       <input id="image" type="file" name="image[]">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                 
                                </div>
                                <div class="form-group">
                                       <label for="image">{{ translate('image')}}</label> 
                                      
                                       <input id="image" type="file" name="image[]">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                 
                                </div>
                                <div class="form-group">
                                       <label for="image">{{ translate('image')}}</label>
                                      
                                       <input id="image" type="file" name="image[]">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                 
                                </div>
                                 <!-- end image teg -->

                                   <div class="form-group">
                                 <label for="image">{{ translate('Camping Video')}}</label>
                                       <input class="form-control" type="text" name="video" placeholder="Enter Video Link">
                                   </div>

                                  <div class="form-group">
                                       <label for="goal_amount">{{ translate('Goal Amount')}}</label> <span class="text-danger">*</span>
                                       <input type="text" name="goal_amount" class="form-control"  placeholder="{{translate('goal_amount')}}"  required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_amount')}}
                                        </div>
                                 
                                 </div>

                                   <div class="form-group">
                                       <label for="validatstart_dateionCustom02">{{ translate('Start Date')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="campaing_start_date" class="form-control" id="startDate"  data-date-format='yyyy-mm-dd'  required>
                                        <div class="invalid-feedback">
                                           {{translate('please_date_select')}}
                                        </div>
                                 
                                  </div>

                                  <div class="form-group">
                                       <label for="end_date">{{ translate('End Date')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="campaing_end_date" class="form-control" id="endDate"  data-date-format='yyyy-mm-dd' required>
                                        <div class="invalid-feedback">
                                           {{translate('please_date_select')}}
                                        </div>
                                 
                                 </div>

                                  <div class="form-group">
                                       <label for="end_type">{{ translate('End Type')}}</label> <span class="text-danger">*</span>
                                      
                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="goal_amount" value="goal_amount" name="end_type" class="custom-control-input" required>
                                    <label class="custom-control-label" for="goal_amount">{{translate('goal_amount')}}</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="end_date" value="end_date" name="end_type" class="custom-control-input" required>
                                    <label class="custom-control-label" for="end_date">{{translate('end_date')}}</label>
                                    
                                        <div class="invalid-feedback">
                                           {{translate('please_end_type_select')}}
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                  <div class="custom-control custom-checkbox">

                                    <input type="checkbox" class="custom-control-input" value="1" name="add_to_feature" id="customControlValidation1">
                                    <label class="custom-control-label" for="customControlValidation1">{{translate('add_to_feature')}}</label>
                                    
                                </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Submit form</button>
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