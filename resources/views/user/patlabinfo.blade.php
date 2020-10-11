@extends('layouts.template')

@section('page-title','Patients Information')

@section('content')

 <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Personal Details</h3>
              </div>
              <!-- /.card-header -->
               <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Refid</th>
                    <th class="text-info">{{$row->Ref}}</th>
                  </tr>
                  <tr>
                    <th>Patients's ID</th>
                    <th class="text-info">{{$row->cardid}}</th>
                  </tr>
                  <tr>
                    <th>Fullname</th>
                    <th class="text-info">{{$row->fullname}}</th>
                  </tr>
                  <tr>
                    <th>contact</th>
                    <th class="text-info">{{$row->contact}}</th>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <th class="text-info">{{$row->gender}}</th>
                  </tr>
                  <tr>
                    <th>Allocated To</th>
                    <th class="text-info">{{$row->room}}</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
              </table>
            <!-- /.card-body -->
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Personal Record</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Temperature</th>
                    <th class="text-info">{{$row->temperature}}</th>
                  </tr>
                  <tr>
                    <th>Height</th>
                    <th class="text-info">{{$row->height}}</th>
                  </tr>
                  <tr>
                    <th>Weight</th>
                    <th class="text-info">{{$row->PWeight}}</th>
                  </tr>
                  <tr>
                    <th>Blood Pressure</th>
                    <th class="text-info">{{$row->Bp}}</th>
                  </tr>
                  <tr>
                    <th>Reason For Visiting</th>
                    <th class="text-info">{{$row->Reason}}</th>
                  </tr>
                  
                </thead>
                <tbody>
                    
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



        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Blood Test Results</h3>
              </div>
              <!-- /.card-header -->
               <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('savebloodtest') }}">
                  @csrf

                  <input type="hidden" name="hiddenid" value="{{$row->id}}">

                  <div class="form-group">
                    <label for="bloodgrp">Blood Group</label>
                    <input type="text" class="form-control @error('bloodgrp') is-invalid @enderror" id="bloodgrp" value="{{old('bloodgrp',$row->bloodgrp)}}" name="bloodgrp">
                    @error('bloodgrp') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="sickling">Sickling</label>
                    <input type="text" class="form-control @error('sickling') is-invalid @enderror" id="sickling" value="{{old('sickling',$row->sicking)}}" name="sickling">
                    @error('sickling') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="hbdenote">HB Denotype</label>
                    <input type="text" class="form-control @error('hbdenote') is-invalid @enderror" id="hbdenote" value="{{old('hbdenote',$row->hbgenotype)}}" name="hbdenote">
                    @error('hbdenote') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="hivstatus">HIV Status</label>
                    <input type="text" class="form-control @error('hivstatus') is-invalid @enderror" id="hivstatus" value="{{old('hivstatus',$row->Hivst)}}" name="hivstatus">
                    @error('hivstatus') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="hypertb">Hypertise B</label>
                    <input type="text" class="form-control @error('hypertb') is-invalid @enderror" id="hypertb" value="{{old('hypertb',$row->hypertS)}}" name="hypertb">
                    @error('hypertb') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  @if($row->Btc)
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  @else
            
                  @endif

                  


                </form>
            <!-- /.card-body -->
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Urine Test Results</h3>
              </div>
              <!-- /.card-header -->
               <!-- /.card-header -->
              <div class="card-body table-responsive"> 

                <form method="post" action="{{ route('saveurinetest') }}">
                  @csrf

                  <input type="hidden" name="hiddenid" value="{{$row->id}}">

                  <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" value="{{old('color',$row->Ucolor)}}" name="color">
                    @error('color') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="appearance">Apperance</label>
                    <input type="text" class="form-control @error('appearance') is-invalid @enderror" id="appearance" value="{{old('appearance',$row->Uappera)}}" name="appearance">
                    @error('appearance') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="ph">PH</label>
                    <input type="text" class="form-control @error('ph') is-invalid @enderror" id="ph" value="{{old('ph',$row->Ph)}}" name="ph">
                    @error('ph') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="protein">Protein (mg/dl)</label>
                    <input type="text" class="form-control @error('protein') is-invalid @enderror" id="protein" value="{{old('protein',$row->Uprote)}}" name="protein">
                    @error('protein') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="glucose">Glucose (mg/dl)</label>
                    <input type="text" class="form-control @error('glucose') is-invalid @enderror" id="glucose" value="{{old('glucose',$row->Ugluc)}}" name="glucose">
                    @error('glucose') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="clinitest">CliniTest (%)</label>
                    <input type="text" class="form-control @error('clinitest') is-invalid @enderror" id="clinitest" value="{{old('clinitest',$row->UcliniT)}}" name="clinitest">
                    @error('clinitest') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="ketones">Ketones (mg/dl)</label>
                    <input type="text" class="form-control @error('ketones') is-invalid @enderror" id="ketones" value="{{old('ketones',$row->UKet)}}" name="ketones">
                    @error('ketones') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="bilirub">Bilirubin</label>
                    <input type="text" class="form-control @error('bilirub') is-invalid @enderror" id="bilirub" value="{{old('bilirub',$row->Ubili)}}" name="bilirub">
                    @error('bilirub') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  <div class="form-group">
                    <label for="blood">Blood</label>
                    <input type="text" class="form-control @error('blood') is-invalid @enderror" id="blood" value="{{old('blood',$row->Ublod)}}" name="blood">
                    @error('blood') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="nitri">Nitrite</label>
                    <input type="text" class="form-control @error('nitri') is-invalid @enderror" id="nitri" value="{{old('nitri',$row->Unitri)}}" name="nitri">
                    @error('nitri') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="wbc">WBC</label>
                    <input type="text" class="form-control @error('wbc') is-invalid @enderror" id="wbc" value="{{old('wbc',$row->Uwbc)}}" name="wbc">
                    @error('wbc') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="rbc">RBC</label>
                    <input type="text" class="form-control @error('rbc') is-invalid @enderror" id="rbc" value="{{old('rbc',$row->Urbc)}}" name="rbc">
                    @error('rbc') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>


                  @if($row->Utc)
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  @else
            
                  @endif


                </form>
            <!-- /.card-body -->
              </div>
              <!-- /.card-body -->

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