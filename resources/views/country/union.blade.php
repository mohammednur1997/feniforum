<div class="col-md-6">
<div class="form-group mb-20">
<label><strong>{{ translate('union') }}</strong></label> <br>
<select class="form-control" name="union_id" required>
<?php
$union =  App\Union::where('db_status','Live')->where('upozila_id',$cid)->orderBy('id','DESC')->get();
?>
@foreach($union as $unions) 
<option value="{{ $unions->id }}">{{ $unions->name }}</option>
@endforeach

</select>
</div>
</div>
											
		