@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.index')}}">{{ translate('useful_page')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('useful_page')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('useful_page'))

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

				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                             <?php $page = ""; ?>

                            <?php if(isset($page)):?>

                                <?php echo $page ?>
                                dfdfdf

                                 <?php endif;?>


                                <div class="row">
                                    <div class="col-lg-4 col-xl-3">
                                        <!-- Nav tabs -->
<div style="background:#EEEEF6; font-color:white;"  class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

<a class="nav-link active" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="false">{{ translate('about_page') }} {{ $page }} 
                            </a>	


<a class="nav-link" id="v-pills-privacy_policy-tab" data-toggle="pill" href="#v-pills-privacy_policy" role="tab" aria-controls="v-pills-privacy_policy" aria-selected="true">{{ translate('privacy_policy') }}</a>
									
										 
<a class="nav-link" id="v-pills-donor_privacy_policy-tab" data-toggle="pill" href="#v-pills-donor_privacy_policy" role="tab" aria-controls="v-pills-donor_privacy_policy" aria-selected="false">{{ translate('donor_privacy_policy') }}</a>

<a class="nav-link" id="v-pills-disclaimer-tab" data-toggle="pill" href="#v-pills-disclaimer" role="tab" aria-controls="v-pills-disclaimer" aria-selected="false">{{ translate('disclaimer') }}</a>

<a class="nav-link" id="v-pills-terms_of_use-tab" data-toggle="pill" href="#v-pills-terms_of_use" role="tab" aria-controls="v-pills-terms_of_use" aria-selected="false">{{ translate('terms_of_use') }}</a>

<a class="nav-link" id="v-pills-welcome-tab" data-toggle="pill" href="#v-pills-welcome" role="tab" aria-controls="v-pills-welcome" aria-selected="false">{{ translate('welcome_page') }}</a>

											
</div>


</div>


<div class="col-lg-8 col-xl-9">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade" id="v-pills-privacy_policy" role="tabpanel" aria-labelledby="v-pills-privacy_policy-tab">
@include('config.privacy_policy')
</div>

<!-- about-->

<div class="tab-pane fade show active" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">.
@include('config.about')
</div>


<div class="tab-pane fade" id="v-pills-donor_privacy_policy" role="tabpanel" aria-labelledby="v-pills-donor_privacy_policy-tab">.
@include('config.donor_privacy_policy')
</div>

<div class="tab-pane fade" id="v-pills-disclaimer" role="tabpanel" aria-labelledby="v-pills-disclaimer-tab">.
@include('config.disclaimer')
</div>

<div class="tab-pane fade" id="v-pills-terms_of_use" role="tabpanel" aria-labelledby="v-pills-terms_of_use-tab">.
@include('config.terms_of_use')
</div>

<div class="tab-pane fade" id="v-pills-welcome" role="tabpanel" aria-labelledby="v-pills-welcome-tab">.
@include('config.welcome')
</div>
                                           
</div>
</div>
</div>
</div>
</div>
</div>
</div>
		 
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