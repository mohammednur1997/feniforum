@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('blog.index')}}">{{ translate('blog')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('blog_edit')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('edit_blog'))

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
                           

    <form class="needs-validation" role="form" action="{{route('blog.update', $editblog->id)}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}
                      {{method_field('put')}}

                                

                                

                              



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('blog_title')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="blog_title" class="form-control" id="validationCustom02" placeholder="{{translate('blog_title')}}" value="{{ old('blog_title') ? old('title') : $editblog->title}}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_title')}}
                                        </div>
                                 
                                </div>

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('cat_id')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="cat_id" class="form-control" id="validationCustom02" placeholder="{{translate('cat_id')}}" value="{{ old('cat_id') ? old('title') : $editblog->title}}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_title')}}
                                        </div>


                            



                             






                        


                                <button class="btn btn-primary" type="submit">{{translate('submit')}}</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
      
 @push('jsfile') 



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