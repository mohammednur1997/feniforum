@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('years.index')}}">{{ translate('years')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('years')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('years'))

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
                           

    <form class="needs-validation" role="form" action="{{route('years.store')}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}

                   

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('note')}}</label>
                                     
                                      <textarea name="note" id="note" rows="5" cols="5" class="form-control"></textarea>

                                     

                                 
                                </div>


                            






                              


                               




                                  






                             
                                <!--<div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="invalidCheck" value="check" required>
                                        <label class="custom-control-label" for="invalidCheck">Agree to terms and conditions</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>-->


                                <button class="btn btn-primary" type="submit">Submit form</button>
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