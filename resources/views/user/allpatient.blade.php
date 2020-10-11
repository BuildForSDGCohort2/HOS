@extends('layouts.template')

@section('page-title','All Patents')

@section('content')

 <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">All Patients</h3>
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
                  <th>Status</th>
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