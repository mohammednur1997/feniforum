@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('state')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('mtype.create')}}">{{ translate('add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('state_list'))


@section('content')
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

                <form class="needs-validation" role="form" action="{{route('state.store')}}" method="post" novalidate enctype="multipart/form-data">
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
                                                <th>{{translate('date')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($state as $value)

                                            <tr>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->created_at}}</td>
                                                <td><a href="{{ route('state.edit', $value->id) }}" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>
                                                <button  onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" class="btn btn-sm btn-danger delete"> {{translate('delete')}} </button>

                                                 <form id="delete-form" action="{{ route('state.destroy', $value->id) }}" method="post" style="display: none;">
                                                {{ csrf_field() }}
                                                 {{method_field('delete')}}
                                                 </form>

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('date')}}</th>
                                               
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