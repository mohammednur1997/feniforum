@extends('member.layout.member_app')

@section('content')

      <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
           
		   
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
              
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                         
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{translate('Image')}}</th>
                                            <th>{{translate('blog_title')}}</th>
												<th>{{translate('cat_id')}}</th>
												<th>{{translate('time')}}</th>
                                            <th class="border-top-0">{{translate('status')}}</th>
                                            <th>{{translate('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
				<?php $blog =  App\Blog::where('db_status','Live')
									->where('auth_id', Auth::guard('member')->user()->id)->get(); ?>
                                        @foreach ($blog as $value)

                                            <tr>
                                                <td>
                        <img height="50px" width="50px" src="{{ asset('upload/images/blog/'.$value->fet_image) }}">
                                                </td>
                                                <td>{{$value->blog_title}}</td>
                                                <td>{{$value->category->name}}</td>
												 <td>{{$value->created_at}}</td>
												 <td>@if($value->status==1)
												{{ 'Publish '}} 
												@else
												{{ 'UnPublish' }} 
												@endif
											
											</td>
                                            <td>
                                               

            <a href="#EditBlog{{ $value->id }}" data-toggle="modal"  class="btn btn-info">{{translate('Edit')}}</a>
              <!--Catagory Modal -->
                  <div class="modal fade" id="EditBlog{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="#exampleModal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>

                        </div>
                        <div class="modal-body">

                <form action="{{ route('member.blog.update', $value->id) }}" method="post" enctype="multipart/form-data">
            
                        @csrf
                              <div class="form-group">
                                       <label for="validationCustom02">{{ translate('blog_title')}}</label> <span class="text-danger">*</span>
                                       <input type="text" tabindex="1" name="blog_title" class="form-control" id="validationCustom02"  value="{{ $value->blog_title }}">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_title')}}
                                        </div>
                                  </div>

<img height="200px" width="200px" src="{{ asset('upload/images/blog/'.$value->fet_image) }}">
                                <div class="form-group">
                                       <label for="validationCustom02">{{ translate('fet_image')}}</label> <span class="text-danger">*</span>
                                       <input type="file" tabindex="1" name="fet_image" class="form-control" id="validationCustom02">
                                        <div class="invalid-feedback">
                                           {{translate('please_add_fet_image')}}
                                        </div>
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('blog_description')}}</label>
                            <textarea name="blog_description" id="ckeditor" rows="10" cols="40" class="ckeditor">
                                          {{$value->blog_description}}
                                      </textarea>
                                </div>

                                 <div class="form-group">
                                       <label for="validationCustom02">{{ translate('category')}}</label> <span class="text-danger">*</span>
                                     
                                      <select class="form-control  custom-select" name="cat_id" id="validationCustom02" style="width: 100%; height:36px;">
                            @foreach(App\BlogCategory::get() as $cat)
                            <option value="{{$cat->id}}" {{ $cat->id ==  $value->cat_id?"selected":""}}>{{$cat->name}}</option>
                            @endforeach
                                  </select>
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