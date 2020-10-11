@extends('layouts.template')

@section('page-title','All Users')

@section('content')

 <div class="row">
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">All Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Img</th>
                  <th>Fullname</th>
                  <th>Gender</th>
                  <th>Number</th>
                  <th>Email</th>
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


  });

</script>

@endsection
