@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('union.index')}}">{{ translate('union')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('edit_union')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('edit_union'))

@section('content')

@push('style') 


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
                           

    <form class="needs-validation" role="form" action="{{route('union.update', $union->id)}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}
                      {{method_field('put')}}

                                

                                

                              



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('mtype_name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') ? old('name') : $union->name}}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('upozilla')}}</label> <span class="text-danger">*</span>
                                     
                                      <select class="form-control  custom-select" name="upozila_id" id="validationCustom02" style="width: 100%; height:36px;" required>
                                    <option value="">{{ translate('select')}}</option>
                                 
                                   
                                 @<?php foreach ($upozila as $key => $value): ?>

                                  <option value="{{$value->id}}" <?php if($union->upozila_id==$value->id) {echo "selected";} ?> >{{$value->name}}</option>
                                   
                                 <?php endforeach ?>
                                    
                                 
                                </select>
                                        <div class="invalid-feedback">
                                           {{translate('please_select_upozilla')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('description')}}</label>
                                     
                                      <textarea name="note" id="note" rows="5" cols="5" class="form-control">{{ old('note') ? old('note') : $union->note}}</textarea>

                                     

                                 
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
      
 @push('jsfile') 



 
 
 @endpush()
      
      @endsection