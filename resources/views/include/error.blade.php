@if (count($errors)>0)
    @foreach($errors->all() as $error)

	<div class="alert alert-info alert-rounded">
        {{$error}}

	</div>

      
    @endforeach
@endif