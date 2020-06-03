@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('state.index')}}">{{ translate('state')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('state')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('state'))

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
                           

    <form class="needs-validation" role="form" action="{{route('state.update', $state->id)}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}
                      {{method_field('put')}}

                                

                                

                              



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') ? old('name') : $state->name}}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('description')}}</label>
                                     
                                      <textarea name="note" id="note" rows="5" cols="5" class="form-control">{{ old('note') ? old('note') : $state->note}}</textarea>

                                     

                                 
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