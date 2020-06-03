@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('social.index')}}">{{ translate('social_setting')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('social_setting')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('social_setting'))

@section('content')

@push('style') 



<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />


@endpush()



<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
<!-- ============================================================== -->
<div class="card">
<div class="card-body">

  <form action="{{route('social.store')}}" class="form-horizontal form-bordered" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

<div class="row">


<div class="col-md-3">
<label for="logo"><b>{{translate('icon')}}</b></label>
<div class="input-group">
<input id="social_icon" type="text" class="form-control socioicon" name="social_icon" placeholder="Click here...">
</div>
</div>

<div class="col-md-3">
<label for="logo"><b>{{translate('Color')}}</b></label>
<div class="input-group">
<input  type="color" class="form-control socioicon" name="color">
</div>
</div>

<div class="col-md-3">
<label for="favicon"><b>{{translate('link')}}</b></label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-external-link"></i></span>
<input id="social_url" type="text" class="form-control" name="social_url" placeholder="type Your URL">
</div>
</div>


<div class="col-md-3">
<label for="favicon"><b>{{translate('action')}}</b></label>
<div class="form-actions">
<button type="submit" class="btn btn-primary">
<i class="fa fa-check"></i> {{translate('submit')}} </button>
</div>
</div>



</form>

</div>



 <div class="row text-center">
            <div class="col-md-12">
                <div class="portlet box green-meadow">
                  
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> Icon</th>
                                    <th class="text-center"> URL</th>
                                    <th class="text-center"> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sicon as $item)
                                    <tr>
                                        <td><i class="{{ str_replace('fa fa','ti',$item->icon)}}"></i></td>
                                        <td>{{$item->link}}</td>
                                        <td>
                                            <button type="button" class="btn red icon_item_delete_btn" data-toggle="modal"
                                                    data-id="{{$item->id}}" data-target="#deleteSocial">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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

  <!-- Begin Modal Delete menu -->

<div class="modal fade" id="deleteSocial" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('social.delete')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input text-center">
                                        <h3>Are you Want Delete This?</h3>
                                        <input type="hidden" name="socialid" id="socialDelId">
                                    </div>
                                </div>
                                <div class="form-actions noborder text-center">
                                    <button type="submit" class="btn blue">Yes</button>
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
        $(document).ready(function () {
        $(document).on('focus', '.socioicon', function () {
            $('.socioicon').iconpicker();
        });

        $(document).on('click', '.icon_item_delete_btn', function () {
            var sId = $(this).data('id');
            $('#socialDelId').val(sId);
        });
        });
    </script>



 @endpush()
      
      @endsection