@extends('layouts.template')

@section('page-title','Add User')

@section('content')

 <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('save-user') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="uploadfle" name="uploadfle">
                        <label class="custom-file-label" for="exampleInputFile">Upload file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" value="{{old('fname')}}" name="fname">
                    @error('fname') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" >
                    @error('email') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="mobilenumber">Mobile Number</label>
                    <input type="text" class="form-control @error('mobilenumber') is-invalid @enderror" id="mobilenumber" name="mobilenumber" value="{{old('mobilenumber')}}">
                    @error('mobilenumber') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="{{old('gender')}}">{{old('gender')}}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="dateofbirth">Date of Birth</label>
                    <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}" >
                    @error('dateofbirth') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="role">User Role</label>
                    <select class="form-control" name="role">
                        <option value="{{old('role')}}">{{old('role')}}</option>
                        <option value="0">Admin</option>
                        <option value="1">ODP Department</option>
                         <option value="2">Doctors Department</option>
                          <option value="3">Phamarcy Department</option>
                         <option value="4">Cashier Department</option>
                          <option value="5">Laborary Department</option>
                    </select>
                    @error('role') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                   <div class="form-group">
                    <label for="npassword">New Password</label>
                    <input type="password" class="form-control @error('npassword') is-invalid @enderror" id="npassword" name="npassword" value="12345678" >
                    @error('npassword') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  
                 <div class="form-group">
                    <label for="npassword_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('npassword_confirmation') is-invalid @enderror" id="npassword_confirmation" name="npassword_confirmation" value="12345678" >
                    @error('npassword_confirmation') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">All Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Img</th>
                  <th>Fullname</th>
                  <th>Gender</th>
                  <th>Number</th>
                  <th width="20%">Email</th>
                  <th width="50%">Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        <ul class="list-inline">
                                  <li class="list-inline-item">
                                      @if($row->profile_photo_path)
                                        <img alt="Avatar" class="table-avatar" src="#" width="50" height="50">
                                      @else
                                        <img alt="Avatar" class="table-avatar" src="{{ URL::to('dist/img/avatar.png')}}" width="50" height="50">
                                      @endif
                                      
                                  </li>
                                  
                              </ul>
                      </td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->gender}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->email}}</td>
                      <td class="project-actions">
                         <a class="btn btn-primary btn-sm" href="#" id="show-user" cid="{{$row->id}}">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                    
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            <!-- /.card-body -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!--/.col (right) -->
        </div>

@endsection

@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    $(document).on("click","#show-user",function(e){
      e.preventDefault();
      var cid = $(this).attr('cid');
      var _token = $('meta[name=csrf-token]').attr('content');
      _this = $(this);
       
        $.ajax({
        url: '{{ route('view-user') }}',
        type: 'post',
        data: {cid: cid, _token: _token},
        success(data){
          $("#content-here").html(data);
          $("#show-thisuser").modal('show');
        },
        error(data){
          console.log(data);
        }
      });
      
      

    });

  });

</script>

@endsection