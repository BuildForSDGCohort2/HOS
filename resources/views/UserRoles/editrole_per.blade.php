@extends('layouts.main')


@section('title')
  OSMS | Add Programme
@endsection

@section('mtitle')
  OSMS Programme Management
@endsection


@section('mtitlesub')

@endsection



@section('main_content')

      <div class="panel panel-info">
        <div class="panel panel-heading">Edit User Role / Permission</div>
        <div class="panel panel-body">

           @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    {{ session('message') }}
                </div>
            @endif


            <div class="row">
			
              <div class="col-md-4">	
				<form method="post" action="{{route('edit-role-update')}}">
					@csrf
					<input type="hidden" name="hiddenid" value="@if(isset($role->id)) {{$role->id}} @endif">
					<input type="hidden" name="type" value="role">
					<div class="form-group  @error('role') has-error @enderror">
				         <label class="control-label" for="inputError">Role name</label>
				         <input type="text" value="@if(isset($role->name)) {{$role->name}} @endif" class="form-control" name="role" id="inputError" placeholder="Enter ...">
				          <span class="help-block">@error('role') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Update Role" class="btn btn-success">
				</form> 

				<hr>

				<form method="post" action="{{route('edit-perm-update')}}">
					@csrf
					<input type="hidden" name="hiddenid" value="@if(isset($Permission->id)) {{$Permission->id}} @endif">
					<input type="hidden" name="type" value="perm">
					<div class="form-group  @error('Permission') has-error @enderror">
				         <label class="control-label" for="inputError">Edit Permission</label>
				         <input type="text" class="form-control" name="Permission" id="inputError" value="@if(isset($Permission->name)) {{$Permission->name}} @endif" placeholder="Enter ... Permission">
				          <span class="help-block">@error('Permission') {{ $message }} @enderror</span>
				    </div>
				    
				    <input type="submit" name="submit" value="Update Permission" class="btn btn-success">
				</form> 
              </div>
              <div class="col-md-5">
	              	
              </div>
			  
			  <div class="col-md-3">
	              	
              </div>
			  
			  			  
			
			  
            </div>
            
            

        </div>
    </div>

@endsection




@section('script')

<script type="text/javascript">
  $('document').ready(function(){

    //start
    $(document).on("change",".checkit", function(e){
      e.preventDefault();
      var cid = $(this).attr("cid");
      var _token = $('meta[name=csrf-token]').attr('content');
    
      if ($(this).prop('checked')) {
          
        if (confirm("Confirm Academic Year Activation")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 1},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }


      }else{
         
        if (confirm("Confirm Academic Year Deactivation !")) {
            $.ajax({
                    url: '{{route('academic-year-update-status')}}',
                    type: 'POST',
                    data: {_token : _token , cid: cid, status: 0},
                     dataType: 'json',
                    success: function(data){
                        if (data.msg) {
                            alert(data.msg);
                        }else{
                            $("#error").text(data.error).show();
                        }
                        
                    },
                      error: function (data) {
                        console.log('Error:', data);
                        $("#msg").text(data.message).show();
                      }
                });

          }

      }
          
     
    });
    //end

  });

</script>


@endsection