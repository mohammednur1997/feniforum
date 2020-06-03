@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('member.index')}}">{{ translate('member')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('member_add')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('create_member'))

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
                           

    <form class="needs-validation" role="form" action="{{route('member.store')}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('member_full_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('member_full_name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                   <div class="form-group">
                                       <label for="validationCustom02">{{ translate('father_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="father_name" class="form-control" id="validationCustom02" placeholder="{{translate('father_name')}}" value="{{ old('father_name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_father_name')}}
                                        </div>
                                 
                                </div>


                                   <div class="form-group">
                                       <label for="validationCustom02">{{ translate('mother_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="mother_name" class="form-control" id="validationCustom02" placeholder="{{translate('mother_name')}}" value="{{ old('mother_name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_mother_name')}}
                                        </div>
                                 
                                </div>


                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('mobile')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="mobile" class="form-control" id="validationCustom02" placeholder="{{translate('mobile')}}" value="{{ old('mobile') }}" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_mobile')}}
                                        </div>
                                 
                                </div>


                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('email')}}</label> <span class="text-danger">*</span>
                                       <input type="email" tabindex="1" name="email" class="form-control" id="validationCustom02" placeholder="{{translate('email')}}" value="{{ old('email') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_email')}}
                                        </div>
                                 
                                </div>




                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('present_address')}}</label>
                                     
                                      <textarea name="present_address" id="present_address" rows="5" cols="5" class="form-control" >{{ old('present_address') }}</textarea>

                                     

                                 
                                </div>


                                   <div class="form-group">
                                       <label for="validationCustom02">{{ translate('parmanent_address')}}</label>
                                     
                                      <textarea name="parmanent_address" id="parmanent_address" rows="5" cols="5" class="form-control" required>{{ old('parmanent_address') }}</textarea>

                                     <div class="invalid-feedback">
                                           {{translate('please_add_address')}}
                                        </div>

                                 
                                </div>



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('member_id')}}</label> <span class="text-danger">*</span>
                                       <input type="textfield" tabindex="1" name="member_id" class="form-control" id="validationCustom02" placeholder="{{translate('member_id')}}" value="{{ old('member_id') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('add_member_id')}}
                                        </div>
                                 
                                </div>


                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('dob')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="dob" class="form-control" id="dob" placeholder="{{ translate('dob')}}" data-date-format='yyyy-mm-dd' value="{{ old('dob') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_date_select')}}
                                        </div>
                                 
                                </div>


                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('blood_group')}}</label> <span class="text-danger">*</span>
                                     
                                      <select class="form-control  custom-select" name="blood_group" id="validationCustom02" style="width: 100%; height:36px;" required>
                                    <option value="A+">{{ translate('a+')}}</option>
                                    <option value="A-">{{ translate('a-')}}</option>
                                    <option value="B+">{{ translate('b+')}}</option>
                                    <option value="B-">{{ translate('b-')}}</option>
                                    <option value="O+">{{ translate('o+')}}</option>
                                    <option value="O-">{{ translate('o-')}}</option>
                                    <option value="AB+">{{ translate('ab+')}}</option>
                                    <option value="AB-">{{ translate('ab-')}}</option>
                                
                                 
                                </select>
                                <div class="invalid-feedback">
                              
                              
                             {{translate('please_select_blood')}}
                             </div>
                                 
                               
                                </div>

                                 <div class="form-group">
                                    <label for="validationCustom02">{{ translate('org_relation')}}</label> <span class="text-danger">*</span>
                                     <div class="custom-control custom-radio">
                                    <label> 
                                    <input tabindex="5" type="radio" name="org_relation" id="collect_vat_yes" value="Yes">{{translate('yes')}} </label>
                                                                            </div>
                                    <div class="custom-control custom-radio">
                                    <label><input tabindex="6" type="radio" name="org_relation" id="collect_vat_no" value="No">{{translate('no')}} 
                                    </label>
                                    </div>

                                 
                                </div>

                                <div id="org_relation_no_container" style="display: none;">
                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('org_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="org_name" class="form-control" id="validationCustom02" placeholder="{{translate('org_name')}}" value="{{ old('org_name') }}">
                                       
                                 
                                </div>
                            </div>


                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('applyer_sign')}}</label> <span class="text-danger">*</span>
                                       <input type="file" tabindex="1" name="applyer_sign" class="form-control" id="validationCustom02" placeholder="{{translate('applyer_sign')}}" value="{{ old('applyer_sign') }}">
                                       

                                </div>


                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('applyer_photo')}}</label> <span class="text-danger">*</span>
                                       <input type="file" tabindex="1" name="applyer_photo" class="form-control" id="validationCustom02" placeholder="{{translate('applyer_photo')}}" value="{{ old('applyer_photo') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('add_member_applyer_photo')}}
                                        </div>
                                 
                                </div>


                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('referane_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="referane_name" class="form-control" id="validationCustom02" placeholder="{{translate('referane_name')}}" value="{{ old('referane_name') }}">
                                      
                                </div>


                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('referane_sign')}}</label> <span class="text-danger">*</span>
                                       <input type="file" tabindex="1" name="referane_sign" class="form-control" id="validationCustom02" placeholder="{{translate('referane_sign')}}" value="{{ old('referane_sign') }}">
                                      

                                 
                                </div>



                            

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('marital_status')}}</label> <span class="text-danger">*</span>
                                     
                                      <select class="form-control  custom-select" name="marital_status" id="validationCustom02" style="width: 100%; height:36px;" required>
                                    <option value="married">{{ translate('married')}}</option>
                                 
                                    <option value="unmarried">{{ translate('unmarried')}}</option>
                                

                                
                              
                                    
                                 
                                </select>
                                <div class="invalid-feedback">
                              
                              
                             {{translate('please_select_marital_status')}}
                             </div>
                                 
                               
                                </div>



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('referane_id')}}</label> <span class="text-danger">*</span>
                                       <input type="textfield" tabindex="1" name="referane_id" class="form-control" id="validationCustom02" placeholder="{{translate('referane_id')}}" value="{{ old('referane_id') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('add_referane_id')}}
                                        </div>
                                 
                                </div>


                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('join_date')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="join_date" class="form-control join_date" id="validationCustom02" placeholder="{{ translate('join_date')}}" data-date-format='yyyy-mm-dd' value="{{ old('join_date') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_date_select')}}
                                        </div>
                                 
                                </div>





                                 <div class="form-group">
                                    <label for="validationCustom02">{{ translate('occapation')}}</label> <span class="text-danger">*</span>
                                     
                                    <select class="form-control  custom-select" name="occapation" id="validationCustom02" style="width: 100%; height:36px;" required>
                                 
                                    <option value="probashi">{{ translate('probashi')}}</option>
                                

                                    <option value="service">{{translate('service_holder')}}</option>
                                     </select>
                                <div class="invalid-feedback">
                                    {{translate('please_select_occapation')}}
                                </div>
                                 
                                </div>



                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('username')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="username" class="form-control" id="validationCustom02" placeholder="{{ translate('username')}}" value="{{ old('username') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_username')}}
                                        </div>
                                 
                                </div>




                                      <div class="form-group">
                                       <label for="validationCustom02">{{ translate('password')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="password" class="form-control" id="validationCustom02" placeholder="{{ translate('password')}}" value="{{ old('password') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_date_select')}}
                                        </div>
                                 
                                </div>



                             
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="invalidCheck" value="check" required>
                                        <label class="custom-control-label" for="invalidCheck">{{translate('agree_to_terms_and_conditions')}}</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        {{translate('you_must_agree_before_submitting')}}
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">{{translate('Submit')}}</button>
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

    <script type="text/javascript">
    $(function () { 

            $('#org_relation_yes').hide();

        $('input[type=radio][name=org_relation]').change(function() {
            if (this.value == 'Yes') {
                $('#org_relation_no_container').show();
            }
            else if (this.value == 'No') {
                $('#org_relation_no_container').hide();
            }
        });

      
    })
</script>


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