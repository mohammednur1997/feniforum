@extends('admin.layout.admin_layout')
@section('title', translate('Expense_list'))
@section('content')
   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">

                      <div class="col-md-4">
                    <div class="card">
                    <div class="card-body">

                <form class="needs-validation" role="form" action="{{ route('admin.expense.store') }}" method="post" novalidate enctype="multipart/form-data">
                      {{csrf_field()}}

                                  <div class="form-group">
                                       <label for="validationCustom02">{{ translate('expense_details')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="expense_details" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') }}" required>
                                       <input type="text" hidden name="event_id" value="{{ $event_id }}">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                  </div>

                                   <div class="form-group">
                                       <label for="validationCustom02">{{ translate('expense')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="expense" class="form-control" id="validationCustom02" placeholder="{{translate('name')}}" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_name')}}
                                        </div>
                                  </div>

                                    
                            <button class="btn btn-primary" type="submit">{{translate('submit')}}</button>
                            </form>
                            </div>
                            </div>
                            </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('id')}}</th>
                                                <th>{{translate('donar_name')}}</th>
                                                <th>{{translate('amount')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                        
                         @foreach(App\Donation:: where([
                                                ["campaing_type", $event_id],
                                                ['status',  20],
                                              ])->get() as $donar)  
                                              
                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td>{{$donar->name}}</td>
                                                <td>{{$donar->amount}}</td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th colspan="2" class="text-center">{{translate('Total')}}</th>
                                               <th>
                                               {{App\Donation::where("campaing_type", $event_id)->sum('amount')}}
                                             </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                              <a href="{{ route('admin.order.invoice', $event_id) }}" class="btn btn-primary mb-3 float-right">Print</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('id')}}</th>
                                                 <th>{{translate('details')}}</th>
                                                <th>{{translate('expense')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          @foreach ($eventExpense as $value)

                                            <tr>
                                                <td>{{$loop->index +1}}</td>
                                                <td>{{$value->expense_details}}</td>
                                                <td>{{$value->expense}}</td>
                                                <td>

     <a onclick="return confirm('Are You sure went to delete data')" class="btn btn-sm btn-danger delete" href="{{ route('admin.expense.destroy', $value->id) }}" >Delete</a>  

                                            </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                         <tfoot>
                                            <tr>
                                               <th colspan="2" class="text-center">{{translate('Total_Expense')}}</th>
                                               <th>
                                               {{App\EventExpense::where("event_id", $event_id)->sum('expense')}}
                                             </th>
                                              <th>{{translate('action')}}</th>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                  <div class="col-md-12 text-center" >
             @php
              $amount = App\Donation::where("campaing_type", $event_id)->sum('amount');
              $expense = App\EventExpense::where("event_id", $event_id)->sum('expense');
               @endphp
                  
                 
                     @php $money = $amount-$expense   @endphp
                     @if(Auth::guard('admin')->user()->admin_type == 1)  
                   @if($amount < $expense)
                   <form action="{{ route('admin.need.money') }}" method="post">
                       @csrf
                       <input type="text" hidden name="event_id" value="{{ $event_id }}">
                        <input type="text" hidden name="extra" value="{{  $money }}">
                        <button class="btn btn-success">Donate</button>
                      </form>
                   @endif
                   @endif
                
                  
                   
                      @if($input == 2)
                       <h2>Done</h2>
                      @else
                      <h2>Surplus : {{  $amount-$expense }}</h2>
                      @if(Auth::guard('admin')->user()->admin_type == 1)  
                      @if($amount>$expense)
                     <form action="{{ route('admin.extra.moneay') }}" method="post">
                       @csrf
                       <input type="text" hidden name="event_id" value="{{ $event_id }}">
                        <input type="text" hidden name="extra" value="{{  $money }}">
                        <button class="btn btn-success">Add Main Account</button>
                      </form>
                      @endif
                      @endif
                      @endif
                     

                      

                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
@endsection