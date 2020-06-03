<div class="col-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" role="form" action="{{route('postGeneralSetting')}}" method="post" novalidate enctype="multipart/form-data">
{{csrf_field()}}

<div class="form-group">
<label for="validationCustom02">{{ translate('site_name')}}</label>
<span class="text-danger">*</span>
<input type="text" tabindex="1" name="app_name" class="form-control" id="validationCustom02" placeholder="{{translate('site_name')}}"value="{{app_config('AppName')}}" required>
<div class="invalid-feedback">
{{translate('please_add')}}
</div>
</div>

<div class="form-group">
<label for="validationCustom02">{{ translate('site_title')}}</label>
<span class="text-danger">*</span>
<input type="text" tabindex="1" name="app_title" class="form-control" id="validationCustom02" placeholder="{{translate('site_title')}}" value="{{app_config('AppTitle')}}" required>
<div class="invalid-feedback">
{{translate('please_add')}}
</div>
</div>



<div class="form-group">
<label for="validationCustom02">{{ translate('mobile')}}</label>
<span class="text-danger">*</span>
<input type="text" tabindex="1" name="mobile" class="form-control" id="validationCustom02" placeholder="{{translate('mobile')}}" value="{{app_config('mobile')}}" required>
<div class="invalid-feedback">
{{translate('please_add')}}
</div>
</div>


<div class="form-group">
<label for="validationCustom02">{{ translate('email')}}</label>
<span class="text-danger">*</span>
<input type="text" tabindex="1" name="email" class="form-control" id="validationCustom02" placeholder="{{translate('email')}}" value="{{app_config('email')}}" required>
<div class="invalid-feedback">
{{translate('please_add')}}
</div>
</div>

<div class="form-group">
<label for="validationCustom02">{{ translate('address')}}</label>
<textarea name="address" id="address" class="form-control" rows="5" cols="5" class="address">{{app_config('address')}}</textarea>
</div>

<div class="form-group">
<label for="validationCustom02">{{ translate('footer')}}</label>
<textarea name="FooterTxt" id="FooterTxt" class="form-control" rows="5" cols="5" class="FooterTxt">{{app_config('FooterTxt')}}</textarea>
</div>


<div class="form-group">
<label for="validationCustom02">{{ translate('about_footer')}}</label>
<textarea name="about_footer" id="about_footer" class="form-control" rows="5" cols="5" class="about_footer">{{app_config('about_footer')}}</textarea>
</div>




<button class="btn btn-primary btn-block" type="submit">{{translate('submit')}}</button>
</form>

</div>
</div>
</div>
               