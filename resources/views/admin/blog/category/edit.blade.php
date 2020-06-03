@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('category.index')}}">{{ translate('category')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('category_add')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('create_category'))

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
                           

    <form   action="{{route('category.update', $editcat->id)}}" method="post" enctype="multipart/form-data">
                         
                      {{csrf_field()}}



                                  <div class="form-group">
                                       <label for="category_name">{{ translate('category_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" name="category_name" class="form-control" value="{{ $editcat->name }}">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="description">{{ translate('description')}}</label>
                                     
                                      <textarea name="description" id="ckeditor" rows="5" cols="5" class="form-control">
                                        {{ $editcat->note }}
                                    </textarea>

                                </div>
                                <button class="btn btn-primary" type="submit">{{translate('submit')}}</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
      
      @endsection