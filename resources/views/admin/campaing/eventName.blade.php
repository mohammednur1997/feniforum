@extends('admin.layout.admin_layout')

@section('breadcrumb')

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        {{ translate('campaing')}}
                                    </li>
                                     <li class="breadcrumb-item">
                                        <a href="{{route('campaing.create')}}">{{ translate('campaing_add')}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
@endsection
@section('title', translate('Event_list'))


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
                              
            
            @foreach($eventName as $memcs)
             <a href="{{ route('admin.eventList', $memcs->id) }}" class="btn btn-primary">{{ $memcs->event_name }}</a>
              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
					
@endsection