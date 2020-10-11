@extends('layouts.template')

@section('page-title','Add Role')

@section('content')

 <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add Role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- form start -->
             	<form method="post" action="{{route('user-role-save')}}">
					@csrf
					<div class="form-group  @error('role') has-error @enderror">
				         <label class="control-label" for="inputError">Role name</label>
				         <input type="text" class="form-control" name="role" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('role') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Add Role" class="btn btn-success">
				</form> 

				<hr>

				<form method="post" action="{{route('user-permission-save')}}">
					@csrf
					<div class="form-group  @error('Permission') has-error @enderror">
				         <label class="control-label" for="inputError">Add Permission</label>
				         <input type="text" class="form-control" name="Permission" id="inputError" placeholder="Enter ... Permission">
				          <span class="help-block">@error('Permission') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Add Permission" class="btn btn-success">
				</form> 
				</div>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-4">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">All Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              	<table id="example3" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>User Role</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($role as $row)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$row->name}}</td>
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

          <div class="col-md-4">
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">All Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive"> 
              	<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>User Permissions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($Permission as $row)
		                		<tr>
		                			<td>{{$loop->iteration}}</td>
		                			<td>{{$row->name}}</td>
		                			
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

        </div>

@endsection

@section('script')

<script type="text/javascript">
  $('document').ready(function(){

   

  });

</script>

@endsection

