@extends('layouts.template')

@section('page-title','Patients Information')

@section('content')

@foreach($allinfo as $index => $row)

@if($index == 0)
  <div class="alert alert-info">
    Todays or Previous Visit
  </div>
@else
  <div class="alert alert-info">
    DateTime Of Previous Visits {{$row->created_at->diffForHumans()}}
 </div>
@endif


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
                <h3 class="card-title">Laboaratory Information</h3>
              </div>
              <!-- /.card-header -->
               <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-info">Measurement</th>
                    <th class="text-info">Value</th>
                  </tr>
                  <tr>
                    <th>Blood Group</th>
                    <th class="text-info">{{$row->bloodgrp}}</th>
                  </tr>
                  <tr>
                    <th>Sickling</th>
                    <th class="text-info">{{$row->sicking}}</th>
                  </tr>
                  <tr>
                    <th>HB Denotype</th>
                    <th class="text-info">{{$row->hbgenotype}}</th>
                  </tr>
                  <tr>
                    <th>HIV Statu</th>
                    <th class="text-info">{{$row->Hivst}}</th>
                  </tr>
                  <tr>
                    <th>Hypertise B</th>
                    <th class="text-info">{{$row->hypertS}}</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
              </table>

              <hr>
              <br>
              <div class="clearfix"></div>

              <div class="form-group">
                <label for="drugs">Drugs Prescribed</label>
                    <textarea class="form-control @error('drugs') is-invalid @enderror" rows="5" cols="5" name="drugs">{{old('drugs', $row->Prescibe)}}</textarea>
                    @error('drugs') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="form-group">
                    <label for="drugs">Prescribed By</label>
                    <input type="text" name="docname" value="{{$row->DoctorsName}}" class="form-control">
                    @error('drugs') 
                       <span class="input-group text-danger" role="alert">
                          <strong>{{$message}}</strong>
                    </span>
                  @enderror
                  </div>

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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-info">Measurement</th>
                    <th class="text-info">Value</th>
                    <th class="text-info">Reference Range</th>
                  </tr>
                  <tr>
            <th >Color</th>
            <th class="text-info">{{$row->Ucolor}}</th>
            <th >Yellow</th> 
        </tr>
        <tr>
            <th>Apperance</th>
            <th class="text-info">{{$row->Uappera}}</th> 
            <th>clear</th> 
        </tr>
        <tr>
            <th>PH</th> 
            <th class="text-info">{{$row->Ph}}</th>
            <th>5.0-5.8</th> 
        </tr>       <tr>

        <tr>
            <th>Protein (mg/dl)</th> 
            <th class="text-info">{{$row->Uprote}}</th>
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>Glucose (mg/dl)</th>
            <th class="text-info">{{$row->Ugluc}}</th> 
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>CliniTest (%)</th>
            <th class="text-info">{{$row->UcliniT}}</th> 
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>Ketones (mg/dl)</th> 
            <th class="text-info">{{$row->UKet}}</th>
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>Bilirubin</th> 
            <th class="text-info">{{$row->Ubili}}</th>
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>Blood</th> 
            <th class="text-info">{{$row->Ublod}}</th>
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>Nitrite</th> 
            <th class="text-info">{{$row->Unitri}}</th>
            <th>Neagative</th> 
        </tr>
        <tr>
            <th>WBC</th> 
            <th class="text-info">{{$row->Uwbc}}</th>
            <th>0-4</th> 
        </tr>
        <tr>
            <th>RBC</th>
            <th class="text-info">{{$row->Urbc}}</th> 
            <th>0-4</th> 
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
        </div>


@endforeach

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