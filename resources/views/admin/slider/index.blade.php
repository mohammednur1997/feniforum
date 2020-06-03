@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('slider.index')}}">{{ translate('slider_setting')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('slider_setting')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('slider_setting'))

@section('content')

@push('style') 

@endpush()



<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
<!-- ============================================================== -->
<div class="card">
<div class="card-body">

  <form action="{{route('slider.store')}}" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

<div class="row">





<div class="col-md-3">
<label for="boldtext"><b>{{translate('Bold_Text')}}</b></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-bold"></i></span>
<input id="bold_text" type="text" class="form-control" name="bold_text"
placeholder="type Your text">
</div>
</div>

<div class="col-md-3">
<label for="boldtext"><b>{{translate('Mid_Text')}}</b></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-bold"></i></span>
<input id="mid_text" type="text" class="form-control" name="mid_text"
placeholder="type Your text">
</div>
</div>

<div class="col-md-3">
<label for="boldtext"><b>{{translate('Small_Text')}}</b></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-text-height"></i></span>
<input id="small_text" type="text" class="form-control" name="small_text"
placeholder="type Your text">
</div>
</div>


<div class="col-md-3">
<label for="favicon"><b>Image: (Select png/ico file only)</b></label>
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="input-group input-large select_image">


<span class="input-group-addon btn default btn-file">
<span class=""> Select file </span>
<input id="slider_image" type="file" name="slider_image"> </span>
</div>
</div>
</div>



<div class="col-md-12 text-center" style="margin-bottom: 25px;margin-top: 25px;">
<button type="submit" class="btn btn-primary btn-lg btn-block">
<i class="fa fa-check"></i> Submit
</button>
</div>


</form>

@foreach($slide as $slides) 

<div class="col-md-4 text-center" style="margin-bottom: 25px;margin-top: 25px;">
<img class="slider_image" width="250px" height="130" src="{{ asset('upload/images/slider/'.$slides->image) }}" alt="missing"/>
<h2><b>{{translate('Bold_Text')}}: </b>{{ $slides->bold_text}}</h2>
<h4><b>{{translate('Mid_Text')}}: </b>{{ $slides->mid_text}}</h4>
<p><b>{{translate('Small_Text')}}: </b>{{ $slides->small_text}}</p>
<button type="button" class="btn red slider_item_delete_btn" data-toggle="modal" data-target="#deleteSlider" data-id="{{ $slides->id}}"><i class="fa fa-trash"></i>
{{translate('Delete')}}
</button>
</div>
@endforeach




    
</div>
</div>

</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->

  <!-- Begin Modal Delete menu -->
    <div class="modal fade" id="deleteSlider" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('slider.delete')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This?</h3>
                                        <input type="hidden" name="sliderid" id="sliderDelId">
                                    </div>
                                </div>
                                <div class="form-actions noborder text-center">
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

      
 @push('jsfile') 

  <script type="text/javascript">
        $(document).on('click', '.slider_item_delete_btn', function () {
            var slId = $(this).data('id');
            $('#sliderDelId').val(slId);
        });
    </script>

 @endpush()
      
      @endsection