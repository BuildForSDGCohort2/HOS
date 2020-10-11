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
                <input type="hidden" name="hiddenid" value="{{$patient->id}}" >

                <div class="card-body">

                  <div class="form-group">
                    <label for="refnumber">Reference ID</label>
                    <input type="text" class="form-control @error('refnumber') is-invalid @enderror" id="refnumber" value="{{$patient->Ref}}" name="refnumber">
                    @error('refnumber') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                   <div class="form-group">
                    <label for="patientid">Patient's ID</label>
                    <input type="text" class="form-control @error('patientid') is-invalid @enderror" id="patientid" name="patientid" value="{{old('patientid',$patient->cardid)}}" >
                    @error('patientid') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{old('email',$patient->fullname)}}" >
                    @error('fullname') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="mobilenumber">Mobile Number</label>
                    <input type="text" class="form-control @error('mobilenumber') is-invalid @enderror" id="mobilenumber" name="mobilenumber" value="{{old('mobilenumber',$patient->contact)}}">
                    @error('mobilenumber') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="{{old('gender',$patient->gender)}}">{{old('gender',$patient->gender)}}</option>
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
                    <input type="text" class="form-control @error('tempearture') is-invalid @enderror" id="tempearture" name="tempearture" value="{{old('tempearture',$patient->temperature)}}" >
                    @error('tempearture') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="height">Height</label>
                    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{old('height',$patient->height)}}" >
                    @error('height') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                   <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight',$patient->PWeight)}}" >
                    @error('weight') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                   <div class="form-group">
                    <label for="bp">BP</label>
                    <input type="text" class="form-control @error('bp') is-invalid @enderror" id="bp" name="bp" value="{{old('bp',$patient->Bp)}}" >
                    @error('bp') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                   <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{old('dateofbirth',$patient->Age)}}" >
                    @error('age') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="issue">Patients Issue</label>
                    <textarea class="form-control @error('issue') is-invalid @enderror" rows="4" cols="4" name="issue">{{old('issue',$patient->Reason)}}</textarea>
                    @error('issue') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  
                 <div class="form-group">
                    <label for="room">Allocate To</label>
                    <select class="form-control" name="room">
                        <option value="{{old('room',$patient->room)}}">{{old('room',$patient->room)}}</option>
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
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
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