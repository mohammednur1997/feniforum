@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('committee.index')}}">{{ translate('committee_type')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ translate('committee_type_add')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('edit_committee_type'))

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
                           

    <form class="needs-validation" role="form" action="{{route('committee.update', $committee->id)}}" method="post" novalidate enctype="multipart/form-data">
                         
                      {{csrf_field()}}
                      {{method_field('put')}}

                                

                                

                              



                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('name')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="name" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') ? old('name') : $committee->name}}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                 
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('note')}}</label>
                                     
                                      <textarea name="note" id="note" rows="5" cols="5" class="form-control">{{ old('note') ? old('note') : $committee->note}}</textarea>

                                     

                                 
                                </div>
								
								    <div class="form-group">
								  <label><strong>{{ translate('view_style') }}</strong></label> <br>
											<select class="form-control" name="member_type" required>
									  <?php
										for ($x = 1; $x <= 5; $x++) {
											
										
										?>
									<option value="{{ $committee->theme_style }}" <?php if($x==$committee->theme_style) { echo"selected";} ?>> {{ translate('view_style') }} {{ $x }}</option>
										<?php } ?>

								</select>
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