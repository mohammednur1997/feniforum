@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('news')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('news.create')}}">{{ translate('news_add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>



@endsection
@section('title', translate('news_list'))


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
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th>{{translate('news_image')}}</th>
                                                <th>{{translate('title')}}</th>
                                                <th>{{translate('date')}}</th>
                                               
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                              @foreach ($news as $value)

                                            <tr>
                                            <td><img alt="{{ $value->title}}" height="50px" width="50px" src="{{ asset('upload/images/news/'.$value->news_image)}}"></td>
                                                <td>{{$value->title}}</td>
                                                <td>{{$value->created_at}}</td>
                                                <td><a href="{{ route('news.edit', $value->id) }}" class="btn btn-sm btn-primary"> {{translate('edit')}} </a>
                                                <button  onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" class="btn btn-sm btn-danger delete"> {{translate('delete')}} </button>

                                                 <form id="delete-form" action="{{ route('news.destroy', $value->id) }}" method="post" style="display: none;">
                                                {{ csrf_field() }}
                                                 {{method_field('delete')}}
                                                 </form>

                                            </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>{{translate('news_image')}}</th>
                                                <th>{{translate('title')}}</th>
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
            
@push('jsfile') 
<!--This page plugins -->
<script src="{{ asset('static/back_end/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('static/back_end/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>


<script type="text/javascript">
    
</script>




@endpush()
            

            
            @endsection