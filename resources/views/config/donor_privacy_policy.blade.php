<div class="col-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" role="form" action="{{route('postAllPage')}}" method="post" novalidate enctype="multipart/form-data">
{{csrf_field()}}



 <div class="form-group">
<label for="validationCustom02">{{ translate('donor_privacy_policy')}}</label>
<textarea name="donor_privacy" id="ckeditor" rows="5" cols="5" class="ckeditor">{{app_config('donor_privacy')}}</textarea>
</div>







<button class="btn btn-primary btn-block" type="submit">{{translate('submit')}}</button>
</form>

</div>
</div>
</div>
               