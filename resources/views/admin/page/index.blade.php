@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('page.index')}}">{{ translate('page')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('page')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('page'))

@section('content')

@push('style') 


@endpush()




   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                       <div class="row">
                        <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                           

    <form class="needs-validation" role="form" action="{{route('page.store')}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}

                   

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('page_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('page_name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('page_details')}}</label>
                                     
                                      <textarea name="page_details" id="ckeditor" rows="5" cols="5" class="ckeditor"></textarea>

                                </div>


                          
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                           
                        </div>
                    </div>
                     </div>
                    <div class="col-lg-4">
                          <div class="card">
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> {{translate('page_name')}}  </th>
                                             
                                                <th> {{translate('date')}}  </th>
                                                <th> {{translate('action')}} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($gallery as $value)
                                            <tr>
                                                 <td> {{ $value->name }}</td>
                                                  <td> {{ $value->created_at }}</td>
                                                  <td><a class="btn btn-danger btn-sm" href="{{ route('page.show', $value->id) }}"> {{ translate('delete') }}</a></td>



                                            </tr>

                                            @endforeach
                                          
                                                                                         
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th> {{translate('photo')}}</th>
                                                <th>{{translate('title')}}</th>
                                                <th>{{translate('date')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div>
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