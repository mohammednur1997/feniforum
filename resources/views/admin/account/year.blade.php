@extends('admin.layout.admin_layout')
@section('title', translate('Collection_Year'))


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
                              
            
            @foreach(App\EventYear::get() as $memcs)
             <a href="{{ route('admin.collection.money', $memcs->id) }}" class="btn btn-primary">{{ $memcs->year_name }}</a>
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