
<section class="">
  <div class="container" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mb-0 text-white">{{translate('become_a_member')}}</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">

          <form id="volunteer_apply_form" name="job_apply_form" action="includes/become-volunteer.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('name')}} <small>*</small></label>
                  <input name="form_name" type="text" placeholder="Enter {{translate('name')}}" required="" class="form-control">
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('father_name')}} <small>*</small></label>
                  <input name="father_name" type="text" placeholder="Enter {{translate('father_name')}}" required="" class="form-control">
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('mother_name')}} <small>*</small></label>
                  <input name="form_name" type="text" placeholder="Enter {{translate('mother_name')}}" required="" class="form-control">
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('mobile')}} <small>*</small></label>
                  <input name="mobile" type="text" placeholder="Enter {{translate('mobile')}}" required="" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('email')}} <small>*</small></label>
                  <input name="form_email" class="form-control required {{translate('email')}}" type="email" placeholder="Enter Email">
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label>{{translate('dob')}} <small>*</small></label>
                  <input name="dob" class="form-control required {{translate('dob')}}" type="text" placeholder="Enter {{translate('date_of_brith')}}">
                </div>
              </div>
            </div>
            <div class="row">               
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="form_sex">{{translate('gender')}} <small>*</small></label>
                  <select id="form_sex" name="form_sex" class="form-control required">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <label for="form_sex">{{translate('marital_status')}} <small>*</small></label>
                  <select id="form_sex" name="form_sex" class="form-control required">
                     <option value="married">Married</option>
                                 
                      <option value="unmarried">Unmarried</option>

                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="form_sex">{{translate('blood_group')}} <small>*</small></label>
                  <select id="form_sex" name="form_sex" class="form-control required">
                     <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">Ab+</option>
                                    <option value="AB-">Ab-</option>

                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="form_branch">Choose State <small>*</small></label>
                  <select id="form_branch" name="form_branch" class="form-control required">
                    <option value="UK">Riyadh</option>
                    <option value="Jeddah">Jeddah</option>
                    <option value="Makkah">Makkah</option>
                    <option value="Madīnah">Madīnah</option>
                    <option value="Sulţānah">Sulţānah</option>
                    <option value="Dammam">Dammam</option>
                    <option value="Tabuk">Tabuk</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>{{translate('present_address')}} <small>*</small></label>
              <textarea name="present_address" class="form-control required" rows="5" placeholder="Your {{translate('present_address')}}"></textarea>
            </div>
             <div class="form-group">
              <label>{{translate('parmanent_address')}} <small>*</small></label>
              <textarea name="parmanent_address" class="form-control required" rows="5" placeholder="Your {{translate('parmanent_address')}}"></textarea>
            </div>
            <div class="form-group">
              <label for="form_attachment">{{translate('payment_ducoment')}}</label>
              <input id="form_attachment" name="form_attachment" class="file" type="file" multiple data-show-upload="false" data-show-caption="true">
              <small>Maximum upload file size: 12 MB</small>
            </div>
            <div class="form-group">
              <input name="form_botcheck" class="form-control" type="hidden" value="" />
              <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Apply Now</button>
            </div>
          </form>
          <!-- Job Form Validation-->
          <script type="text/javascript">
            $("#volunteer_apply_form").validate({
              submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                  dataType:  'json',
                  success: function(data) {
                    if( data.status == 'true' ) {
                      $(form).find('.form-control').val('');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                  }
                });
              }
            });
          </script>


        </div>
      </div>
    </div>
  </div>
</section>