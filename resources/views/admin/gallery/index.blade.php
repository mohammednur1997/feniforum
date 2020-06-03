@extends('admin.layout.admin_layout')
@section('title', translate('gallery'))

@section('content')
   <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                       <div class="row">
                        <div class="col-lg-4 col-xl-3">

                    <div class="card">
                        <div class="card-body">
                           

    <form  action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                         
                      {{csrf_field()}}
                                  <div class="form-group">
                                       <label for="photo">{{ translate('photo')}}</label> <span class="text-danger">*</span>
                                       <input type="file" name="gallery_image" class="form-control" required>
                                        <div class="invalid-feedback">
                                           {{translate('please_add_photo')}}
                                        </div>
                                </div>

                                 <div class="form-group">
                                       <label for="note">{{ translate('note')}}</label>
                                     
                                      <textarea name="gallery_note" id="gallery_note" rows="5" cols="5" class="form-control"></textarea>

                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                           
                        </div>
                    </div>
                     </div>
                    <div class="col-lg-8">
                          <div class="card">
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> {{translate('photo')}}  </th>
                                                <th> {{translate('note')}}  </th>
                                                <th> {{translate('date')}}  </th>
                                                <th> {{translate('action')}} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($gallery as $gallerys)
                                            <tr>
                                                <td> <img src="{{ asset('upload/images/gallery/'.$gallerys->gallery_image) }}" alt="" height="50" width="50" /> </td>
                                                 <td> {{ $gallerys->gallery_note }}</td>
                                                  <td> {{ $gallerys->created_at }}</td>
                            <td><a onclick="return confirm('Are You Sure Went to Delete Gallery')" class="btn btn-danger btn-sm" href="{{ route('gallery.destroy', $gallerys->id) }}"> {{ translate('delete') }}</a></td>
                                            </tr>

                                            @endforeach
                                          
                                                                                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th> {{translate('photo')}}</th>
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



                 


                </div>
                <!-- ============================================================== -->



            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
      
@endsection