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
@section('title', $eventName->event_name)


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
                                                <th>Title</th>
                                                <th>Event Name</th>
                                                <th>Image</th>
                                                <th>Campaing Start</th>
                                                <th>Campaing End</th>
                                                <th>Goal Amount</th>
                                                <th>Campaing Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($event as $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>
                               @foreach(App\EventName::where('id', $value->event_id)->get() as $eventname)     
                                 {{ $eventname->event_name }}
                              @endforeach                          
                                                </td>
                                                 <td>
                                          @php $i=1; @endphp
                                     @foreach($value->evetnIamge as $image)   
                                        @if($i > 0)  
 <img height="50px" width="50px" src="{{ asset('upload/images/event/'. $image->image) }}">          
                                        @endif    
                                      @php $i--; @endphp
                                     @endforeach               
                                                </td>
                                                <td>{{ $value->campaing_start_date }}</td>
                                                <td>{{ $value->campaing_end_date }}</td>
                
                                                <td>{{ $value->goal_amount }}</td>
                                                <td>{{ $value-> campaing_location }}</td>
                                                <td>
                                    <a href="{{ route('admin.eventpage', $value->id) }}" class="btn btn-info">Edit</a>

                                    <a onclick="return confirm('Are You Sure went to close Event')" href="{{ route('admin.event.close', $value->id) }}" class="btn btn-success">Complete</a>

                                    <a href="{{ route('admin.expense',  $value->id) }}" class="btn btn-info">{{translate('Expense')}}</a>

                                     <a onclick="return confirm('Are You Sure went to delete data')" href="{{ route('admin.event.destroy2', $value->id) }}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                      @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Title</th>
                                                <th>Event Name</th>
                                                <th>Image</th>
                                                <th>Campaing Start</th>
                                                <th>Campaing End</th>
                                                <th>Goal Amount</th>
                                                <th>Campaing Location</th>
                                                <th>Action</th>
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