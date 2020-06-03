@extends('admin.layout.admin_layout')
@section('title', translate('Central Protinidi List'))


@section('content')

@push('style') 
<link href="{{ asset('static/back_end/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush()

   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">

                    <div class="col-4">
                    <div class="card">
                    <div class="card-body">
                <form class="needs-validation" action="{{route('admin.Centralprotinidi.store')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('name')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="name" class="form-control"  placeholder="{{translate('please_add_name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                   </div>

                                   <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Area Name')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="area_name" class="form-control"  placeholder="{{translate('please_add_name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Position')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="position" class="form-control"  placeholder="{{translate('Write the Position')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('Write the Position')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Blood')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="blood_group" class="form-control"  placeholder="{{translate('write Blood Group')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('write Blood Group')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Address')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="address" class="form-control"  placeholder="{{translate('Enter Your Address')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>

                                   

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Mobile')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="mobile" class="form-control"  placeholder="{{translate('Enter Your Mobile number')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Priority')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="priority" class="form-control"  placeholder="{{translate('Enter member priority')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>

                             <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Image')}}</label> <span class="text-danger">*</span>
                                       <input type="file" name="image" class="form-control"    required>
                                   </div>
             <button class="btn btn-primary" type="submit">{{translate('submit')}}</button>
                            </form>
                            </div>
                         </div>
                     </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">                               
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('image')}}</th>
                                                <th>{{translate('position')}}</th>
                                                <th>{{translate('Priority')}}</th>
                                                <th>{{translate('address')}}</th>
                                                <th>{{translate('mobile')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($CentralProtinidi as $value)

                                            <tr>
                                                <td>{{$value->name}}</td>
                                                <td>
                                                  <img height="50px" width="50px" src="{{ asset('upload/images/protinidi/'.$value->image) }}">
                                                </td>
                                                <td>{{$value->position}}</td>
                                                <td>{{$value->priority}}</td>
                                                <td>{{$value->address}}</td>
                                                <td>{{$value->mobile}}</td>
                <td><a href="#EditProtinidi{{ $value->id }}" data-toggle="modal" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>

     <!--Catagory Modal -->
                  <div class="modal fade" id="EditProtinidi{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Edit Central Protindi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.Centralprotinidi.update', $value->id) }}" method="post" enctype="multipart/form-data">
                 @csrf
                <div class="form-group">
     <label for="validationCustom02">{{ translate('name')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="name" class="form-control"  value="{{ $value->name }}">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                   </div>

                                     <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Area Name')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="area_name" class="form-control"  value="{{ $value->area_name }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                   </div>


                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Position')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="position" class="form-control"   value="{{ $value->position }}">
                                        <div class="invalid-feedback">
                                           {{translate('Write the Position')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Blood')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="blood_group" class="form-control" value="{{ $value->blood_group }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('write Blood Group')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Address')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="address" class="form-control"   value="{{ $value->address }}">
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>


                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Mobile')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="mobile" class="form-control"   value="{{ $value->mobile }}">
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>

                                    <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Priority')}}</label> <span class="text-danger">*</span>
                                       <input type="text"  name="priority" class="form-control"  value="{{ $value->priority }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('Enter Your Address')}}
                                        </div>
                                   </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('Image')}}</label> <span class="text-danger">*</span>
                                       <input type="file" name="image" class="form-control"    >
                                   </div>
             <button class="btn btn-primary" type="submit">{{translate('submit')}}</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->
                    <a onclick="return confirm('Are You Sure Went to delete data')" href="{{ route('admin.Centralprotinidi.delete', $value->id) }}" class="btn btn-sm btn-danger"> {{translate('Delete')}} </a>

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>{{translate('name')}}</th>
                                                <th>{{translate('image')}}</th>
                                                <th>{{translate('position')}}</th>
                                                <th>{{translate('Priority')}}</th>
                                                <th>{{translate('address')}}</th>
                                                <th>{{translate('mobile')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

        
@endsection