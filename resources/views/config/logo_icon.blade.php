<div class="col-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" role="form" action="{{route('postLogoSetting')}}" method="post" novalidate enctype="multipart/form-data">
{{csrf_field()}}





<div class="form-group">
<label for="validationCustom02">{{ translate('logo')}}</label> <span class="text-danger">*</span>
<input type="file" tabindex="1" name="logo" class="form-control" id="validationCustom02" placeholder="{{translate('logo')}}" value="{{ old('logo') }}" required>
<div class="invalid-feedback">
{{translate('please_add_logo')}}
</div>
<div class="portlet-body">
<img class="logo_img img-responsive" width="405px" height="100px"  src="{{ asset('upload/images/logo/'.app_config('AppLogo'))}}" alt="missing"/>
</div>
</div>



<div class="form-group">
<label for="validationCustom02">{{ translate('favicon')}}</label> <span class="text-danger">*</span>
<input type="file" tabindex="1" name="app_fav" class="form-control" id="validationCustom02" value="{{ old('app_fav') }}" required>
<div class="invalid-feedback">
{{translate('please_add_favicon')}}
</div>
<div class="portlet-body">
<img class="logo_img img-responsive" width="105px" height="100px"  src="{{ asset('upload/images/logo/'.app_config('AppFav'))}}" alt="missing"/>
</div>
</div>



<div class="form-group">
<label for="validationCustom02">{{ translate('breadcrumb_background')}}</label> <span class="text-danger">*</span>
<input type="file" tabindex="1" name="breadcrumb" class="form-control" id="validationCustom02"  value="{{ old('breadcrumb') }}" required>
<div class="invalid-feedback">
{{translate('please_add_background')}}
</div>
<div class="portlet-body">
<img class="logo_img img-responsive" width="405px" height="100px" src="{{ asset('upload/images/logo/'.app_config('BreadCumb'))}}" alt="missing"/>
</div>
</div>


<div class="form-group">
<label for="validationCustom02">{{ translate('footer_logo')}}</label> <span class="text-danger">*</span>
<input type="file" tabindex="1" name="footer_logo" class="form-control" id="validationCustom02" value="{{ old('footer_logo') }}" required>
<div class="invalid-feedback">
{{translate('please_add_footer_logo')}}
</div>
<div class="portlet-body">
<img class="logo_img img-responsive" width="405px" height="100px"  src="{{ asset('upload/images/logo/'.app_config('footer_logo'))}}" alt="missing"/>
</div>
</div>




<button class="btn btn-primary btn-block" type="submit">{{translate('submit')}}</button>
</form>




			
			

</div>
</div>
</div>
               