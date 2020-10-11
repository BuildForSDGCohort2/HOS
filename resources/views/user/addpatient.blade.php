@extends('layouts.template')

@section('page-title','OPD UNIT')

@section('content')

 <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Record Patient Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('save-patient') }}" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                  <div class="form-group">
                    <label for="refnumber">Reference ID</label>
                    <input type="text" class="form-control @error('refnumber') is-invalid @enderror" id="refnumber" value="{{old('refnumber', $reffid)}}" name="refnumber">
                    @error('refnumber') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                   <div class="form-group">
                    <label for="patientid">Patient's ID</label>
                    <input type="text" class="form-control @error('patientid') is-invalid @enderror" id="patientid" name="patientid" value="{{old('patientid')}}" >
                    @error('patientid') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{old('email')}}" >
                    @error('fullname') 
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
                    <label for="tempearture">Tempearture in (Degree)</label>
                    <input type="text" class="form-control @error('tempearture') is-invalid @enderror" id="tempearture" name="tempearture" value="{{old('tempearture')}}" >
                    @error('tempearture') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="height">Height</label>
                    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{old('height')}}" >
                    @error('height') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                   <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight')}}" >
                    @error('weight') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                   <div class="form-group">
                    <label for="bp">BP</label>
                    <input type="text" class="form-control @error('bp') is-invalid @enderror" id="bp" name="bp" value="{{old('bp')}}" >
                    @error('bp') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                   <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{old('dateofbirth')}}" >
                    @error('age') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="issue">Patients Issue</label>
                    <textarea class="form-control @error('issue') is-invalid @enderror" rows="4" cols="4" name="issue">{{old('issue')}}</textarea>
                    @error('issue') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  
                 <div class="form-group">
                    <label for="room">Allocate To</label>
                    <select class="form-control" name="room">
                        <option value="{{old('room')}}">{{old('room')}}</option>
                        <option value="Room 1">Room 1</option>
                        <option value="Room 2">Room 2</option>
                        <option value="Room 3">Room 3</option>
                        <option value="Room 4">Room 4</option>
                        <option value="Room 5">Room 5</option>
                        <option value="Room 6">Room 6</option>
                    </select>
                    @error('room') 
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
                <h3 class="card-title">Your Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="8">Patients Information</th>
                  </tr>
                <tr>
                  <th>S.N</th>
                  <th>Refid</th>
                  <th>IDNumber</th>
                  <th>Fullname</th>
                  <th>contact</th>
                  <th>Gender</th>
                  <th>Allocated To</th>
                  <th width="50%">Status</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($patients as $row)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$row->Ref}}</td>
                      <td>{{$row->cardid}}</td>
                      <td>{{$row->fullname}}</td>
                      <td>{{$row->contact}}</td>
                      <td>{{$row->gender}}</td>
                      <td>{{$row->room}}</td>
                      <td class="project-actions">
                         <a class="btn btn-primary btn-sm" href="{{ route('edit-patient',['id'=>$row->id]) }}" cid="{{$row->id}}">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                          
                              <a class="btn btn-danger btn-sm" href="{{ route('delete-patient',['id'=>$row->id]) }}" onclick="return confirm('Are You Sure ?')">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
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