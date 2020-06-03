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
                                            <p class="font-16 m-b-5">{{translate('total_donar')}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right">{{ $total_Donar }}</h1>
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
                                            <p class="font-16 m-b-5">{{translate('Donation_amount')}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right">{{ $Donation_amount }}</h1>
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
                   
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <i class="mdi mdi-currency-eur font-20 text-muted"></i>
                                            <p class="font-16 m-b-5">{{translate('Expense_total_amount')}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h1 class="font-light text-right">{{ $ExpenseAmount }}</h1>
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
                    <div class="col-md-6">
                        <div class="card">
                         
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th class="border-top-0">{{translate('id')}}</th>
                                        <th class="border-top-0">{{translate('Donar_Name')}}</th>
                                        <th class="border-top-0">{{translate('amount')}}</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($Donation as $donation)
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            <td>{{ $donation->name }}</td>
                                            <td>{{ $donation->amount }}</td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th colspan="2" class="text-right">{{translate('Total:')}}</th>
                                        <th>{{ $Donation_amount }}</th>
                                       </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                         
                            <div class="table-responsive">
                                <table  class="table table-hover">
                                    <thead>
                                        <tr>
                                    <th class="border-top-0">{{translate('Expense_Details')}}</th>
                                        <th class="border-top-0">{{translate('Expense')}}</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($EventExpense as $value)
                                        <tr>
                                            <td>{{ $value->expense_details }}</td>
                                            <td>{{ $value->expense }}</td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                 <th colspan="1" class="text-right">{{translate('Total Expense:')}}</th>
                                        <th>{{ $ExpenseAmount }}</th>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Surplus: {{ $Donation_amount-$ExpenseAmount }} </h2>
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