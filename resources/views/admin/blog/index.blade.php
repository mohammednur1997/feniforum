@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('blog')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('blog.create')}}">{{ translate('blog_add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('blog_list'))


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
                                                <th>{{translate('blog_title')}}</th>
                                                <th>{{translate('image')}}</th>
                                                <th>{{translate('category')}}</th>
                                                <th>{{translate('time')}}</th>
                                                <th>{{translate('status')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($blog as $value)

                                            <tr>
                                                <td>{{$value->blog_title}}</td>
                                                <td>
                          <img height="60px" width="60px" src="{{ asset('upload/images/blog/'. $value->fet_image) }}">
                                                </td>
												<td>
                             @foreach(App\Blogcategory::get() as $cat)  
                                  @if($cat->id == $value->cat_id) 
                                  {{ $cat->name }}                 
                                  @endif                  
                             @endforeach                              
                                                </td>
                                                <td>{{$value->created_at}}</td>
                                                <td>
                                                    @if($value->status == 2)
                             <a href="{{ route('admin.blog.publish', $value->id) }}" class="btn btn-sm btn-info"> {{translate('Publish')}} </a>
												@else
                            <a href="{{ route('admin.blog.unpublish', $value->id) }}" class="btn btn-sm btn-danger"> {{translate('UnPublish')}} </a>
												@endif
											
											</td>
                                                <td><a href="{{ route('blog.edit', $value->id) }}" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>
                                                <button  onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" class="btn btn-sm btn-danger delete"> {{translate('delete')}} </button>

                                                 <form id="delete-form" action="{{ route('blog.destroy', $value->id) }}" method="post" style="display: none;">
                                                {{ csrf_field() }}
                                                 {{method_field('delete')}}
                                                 </form>

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('blog_title')}}</th>
                                                <th>{{translate('category')}}</th>
                                                <th>{{translate('time')}}</th>
                                                <th>{{translate('status')}}</th>
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