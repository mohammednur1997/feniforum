<div class="col-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" role="form" action="{{route('postAllPage')}}" method="post" novalidate enctype="multipart/form-data">
{{csrf_field()}}



 <div class="form-group">
<label for="validationCustom02">{{ translate('welcome')}}</label>
<textarea name="welcome" id="ckeditor" rows="5" cols="5" class="ckeditor">{{app_config('welcome')}}</textarea>
</div>







<button class="btn btn-primary btn-block" type="submit">{{translate('submit')}}</button>
</form>

</div>
</div>
</div>
               