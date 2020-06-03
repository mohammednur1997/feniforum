@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('blog_category')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('blogCat.create')}}">{{ translate('blog_category_add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('blog_category_list'))


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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                               
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('category_name')}}</th>
                                                <th>{{translate('date')}}</th>
                                               
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($categorys as $value)

                                            <tr>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->created_at}}</td>
                                                <td>
        <a href="{{ route('admin.blog.category', $value->id) }}" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>

        <a onclick="return confirm('Are You sure went to delete category')" href="{{ route('admin.blog.destroy', $value->id) }}" class="btn btn-sm btn-danger"> {{translate('delete')}} </a>
                                               
                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('category_name')}}</th>
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