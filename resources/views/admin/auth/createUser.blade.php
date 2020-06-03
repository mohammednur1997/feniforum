    @extends('admin.layout.admin_layout')

@section('content')

      <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                
                    <div class="col-md-4">
                        <div class="card">
                         
                    <form id="paypal_donate_form_onetime_recurring" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                     <label><strong>{{ translate('Name') }}</strong></label> <br>
                    <input type="text" class="form-control" id="name" name="admin_name" placeholder="{{ translate('admin_name') }}" > 
                                        @if ($errors->has('admin_name'))
                                   <font color="red">
                                        <strong>{{ $errors->first('admin_name') }}</strong>
                                    </font>
                                @endif
                    </div>

                    <div class="form-group">
                     <label><strong>{{ translate('email') }}</strong></label> <br>
                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ translate('email') }}"> 
                                @if ($errors->has('email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </font>
                                @endif
                    </div>


                    <div class="form-group">
                    <label><strong>{{ translate('new_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password" placeholder="{{ translate('password') }}"  value="{{ old('password') }}"> 
                    @if ($errors->has('password'))
                    <font color="red">
                        <strong>{{ $errors->first('password') }}</strong>
                        </font>
                        @endif
                    </div>
               

                 
                    <div class="form-group">
                    <label><strong>{{ translate('Confirm_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm_password') }}"  value="{{ old('password_confirmation') }}"> 
                    @if ($errors->has('password_confirmation'))
                    <font color="red">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </font>
                        @endif
                    </div>
               
                     <div class="form-group">
                     <label><strong>{{ translate('Admin_type') }}</strong></label> <br>
                      <select class="form-control" name="admin_type" required>
                           <option value="">Select Type</option>
                           <option value="1">Admin</option>
                           <option value="2">Accounter</option>
                           <option value="3">Editor</option>
                      </select>       
                    </div>

                     <div class="form-group">
                     <label><strong>{{ translate('Image') }}</strong></label> <br>
                    <input type="file" class="form-control" name="photo" >        
                    </div>

   
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">{{translate('Create')}}</button>
                    </div>

              
                  </form>      
                        

                     </div>
                </div>
                 <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('Image')}}</th>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('type')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($admin as $value)
                                            <tr>
                                                <td>
                       <img height="50px" width="50px" src="{{ asset('upload/images/user/'.$value->admin_image) }}">
                                                
                                                </td>
                                                <td>{{$value->admin_name}}</td>
                                                <td>
                                                  <?php
                                                  if ($value->admin_type == 1) {
                                                     echo "Admin";
                                                  }elseif ($value->admin_type == 2) {
                                                      echo "Accounter";
                                                  }elseif ($value->admin_type == 3) {
                                                     echo "Editor";
                                                  }
                                                  ?>  
                                                </td>
                                                <td>

                             <a href="#editUser{{ $value->id }}" data-toggle="modal"  class="btn btn-sm btn-primary">{{translate('edit')}}</a>
              <!--Catagory Modal -->
                  <div class="modal fade" id="editUser{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.user.update', $value->id) }}" method="post" enctype="multipart/form-data">
            
                 @csrf

                      <div class="form-group">
                     <label><strong>{{ translate('Name') }}</strong></label> <br>
                    <input type="text" class="form-control" id="name" name="admin_name" value="{{ value->admin_name }}" > 
                                        @if ($errors->has('admin_name'))
                                   <font color="red">
                                        <strong>{{ $errors->first('admin_name') }}</strong>
                                    </font>
                                @endif
                        </div>

                      <div class="form-group">
                     <label><strong>{{ translate('email') }}</strong></label> <br>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $value->email }}"> 
                                @if ($errors->has('email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </font>
                                @endif
                     </div>


                    <div class="form-group">
                    <label><strong>{{ translate('new_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password" placeholder="{{ translate('password') }}"  value="{{ old('password') }}"> 
                    @if ($errors->has('password'))
                    <font color="red">
                        <strong>{{ $errors->first('password') }}</strong>
                        </font>
                        @endif
                    </div>
               

                 
                    <div class="form-group">
                    <label><strong>{{ translate('Confirm_password') }}</strong></label> <br>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm_password') }}"  value="{{ old('password_confirmation') }}"> 
                    @if ($errors->has('password_confirmation'))
                    <font color="red">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </font>
                        @endif
                    </div>
               
                
                  <img height="200px" width="200px" src="{{ asset('upload/images/user/'.$value->admin_image) }}">
                     <div class="form-group">
                     <label><strong>{{ translate('Image') }}</strong></label> <br>
                    <input type="file" class="form-control" name="photo" >        
                    </div>

         <button class="btn btn-primary" type="submit">{{translate('Update')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->

                                            
                 <a onclick="return confirm('are You Sure Went to Delete Data')" href="{{ route('admin.user.destroy', $value->id) }}" class="btn btn-sm btn-danger"> {{translate('Delete')}} </a>

                                             </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('Image')}}</th>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('type')}}</th>
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
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
               
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
@endsection