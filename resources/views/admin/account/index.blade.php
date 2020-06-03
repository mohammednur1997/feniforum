    @extends('admin.layout.admin_layout')

@section('content')

      <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="mdi mdi-emoticon font-20 text-muted"></i>
                                            <p class="font-16 m-b-5">{{translate('total_member')}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right">{{ $CollectionMember }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="mdi mdi-currency-eur font-20 text-muted"></i>
                                            <p class="font-16 m-b-5">{{translate('total_amount')}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right">{{ $CollectionMoney }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
              
                <div class="row">
                    <!-- column -->
                    <div class="col-md-12">
                        <div class="card">
                         
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th class="border-top-0">{{translate('id')}}</th>
                                        <th class="border-top-0">{{translate('image')}}</th>
                                        <th class="border-top-0">{{translate('member_name')}}</th>
                                        <th class="border-top-0">{{translate('join_date')}}</th>
                                            <th class="border-top-0">{{translate('mobile')}}</th>
                                            <th class="border-top-0">{{translate('amount')}}</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($Members as $value)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>
                            <img height="50" width="50" src="{{ asset('upload/images/member/'.$value->applyer_photo) }}">
                                            </td>
                                            <td>{{ $value->full_name }}</td>
                                            <td>{{ $value->join_date }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->amount }}</td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th class="border-top-0">{{translate('member_name')}}</th>
                                        <th class="border-top-0">{{translate('join_date')}}</th>
                                            <th class="border-top-0">{{translate('mobile')}}</th>
                                            <th class="border-top-0">{{translate('amount')}}</th>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
               
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
            @endsection