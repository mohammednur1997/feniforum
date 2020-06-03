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

                 <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                                 <h3>{{translate('Unseen_Message')}}</h3>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('email')}}</th>
                                                <th>{{translate('subject')}}</th>
                                                <th>{{translate('message')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($unseen as $value)
                                            <tr>
                                                
                                                <td>{{$value->form_name}}</td>
                                                <td>{{$value->form_email}}</td>
                                                <td>{{$value->form_subject}}</td>
                                                <td>{{$value->form_message}}</td>
                                                <td>

                             <a href="#reply{{ $value->id }}" data-toggle="modal"  class="btn btn-sm btn-primary">{{translate('Reply')}}</a>
              <!--Catagory Modal -->
                  <div class="modal fade" id="reply{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">{{translate('Reply_message')}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.send.messsge') }}" method="post" enctype="multipart/form-data">
            
                 @csrf

                      <div class="form-group">
                     <label><strong>{{ translate('Name') }}</strong></label> <br>
                    <input type="text" class="form-control" id="name" name="form_name" placeholder="{{ translate('name') }}" > 
                                        @if ($errors->has('form_name'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_name') }}</strong>
                                    </font>
                                @endif
                      </div>

                      <div class="form-group">
                     <label><strong>{{ translate('Subject') }}</strong></label> <br>
                    <input type="text" class="form-control" id="name" name="form_subject" placeholder="{{ translate('subject') }}" > 
                                        @if ($errors->has('form_subject'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_subject') }}</strong>
                                    </font>
                                @endif
                      </div>

                    <div class="form-group">
                     <label><strong>{{ translate('email') }}</strong></label> <br>
                    <input type="email" class="form-control" id="email" name="form_email" value="{{ $value->form_email }}">
                                @if ($errors->has('form_email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_email') }}</strong>
                                    </font>
                                @endif
                      </div>

                       <div class="form-group">
                     <label><strong>{{ translate('message') }}</strong></label> <br>
                           <textarea class="form-control"  name="form_message">
                             
                           </textarea>     
                      </div>


             <button class="btn btn-primary" type="submit">{{translate('Send')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->
                                            
                 <a href="#seen{{ $value->id }}" data-toggle="modal" class="btn btn-sm btn-danger"> {{translate('Seen')}} </a>

                  <!--Catagory Modal -->
                  <div class="modal fade" id="seen{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">{{translate('Details')}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('admin.inbox.seen', $value->id) }}" method="post" enctype="multipart/form-data">
            
                 @csrf

                      <div class="form-group">
                     <label><strong>{{ translate('Name') }}</strong></label> <br>
                    <input type="text" class="form-control"  name="form_name" value="{{ translate($value->form_name) }}" > 
                                        @if ($errors->has('form_name'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_name') }}</strong>
                                    </font>
                                @endif
                      </div>

                      <div class="form-group">
                     <label><strong>{{ translate('Subject') }}</strong></label> <br>
                    <input type="text" class="form-control"  name="form_subject" value="{{ translate($value->form_subject) }}" > 
                                        @if ($errors->has('form_subject'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_subject') }}</strong>
                                    </font>
                                @endif
                      </div>

                    <div class="form-group">
                     <label><strong>{{ translate('email') }}</strong></label> <br>
                    <input type="email" class="form-control" id="email" name="form_email" value="{{ translate($value->form_email) }}"> 
                                @if ($errors->has('form_email'))
                                   <font color="red">
                                        <strong>{{ $errors->first('form_email') }}</strong>
                                    </font>
                                @endif
                      </div>

                       <div class="form-group">
                     <label><strong>{{ translate('message') }}</strong></label> <br>
                           <textarea class="form-control"  name="form_message">
                             {{ $value->form_message }}
                           </textarea>     
                      </div>


             <button class="btn btn-primary" type="submit">{{translate('Seen')}}</button>
            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                   <!-- end Catagory Modal -->

                                             </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('email')}}</th>
                                                <th>{{translate('subject')}}</th>
                                                <th>{{translate('message')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                 </div>

                 <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                               <h3>{{translate('Seen_Message')}}</h3>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('email')}}</th>
                                                <th>{{translate('subject')}}</th>
                                                <th>{{translate('message')}}</th>
                                                <th>{{translate('action')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($seen as $value)
                                            <tr>
                                                
                                                <td>{{$value->form_name}}</td>
                                                <td>{{$value->form_email}}</td>
                                                <td>{{$value->form_subject}}</td>
                                                <td>{{$value->form_message}}</td>
                                                <td>

                      <a href="{{ route('admin.inbox.unseen', $value->id) }}" class="btn btn-sm btn-primary">{{translate('Unseen')}}</a>
          
                                            
      <a onclick="return confirm('are You Sure Went to Delete Data')" href="{{ route('admin.inbox.destroy', $value->id) }}" class="btn btn-sm btn-danger"> {{translate('Delete')}} </a>

                                             </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>{{translate('name')}}</th>
                                                <th>{{translate('email')}}</th>
                                                <th>{{translate('subject')}}</th>
                                                <th>{{translate('message')}}</th>
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