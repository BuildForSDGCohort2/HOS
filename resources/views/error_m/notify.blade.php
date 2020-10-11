@if (session()->has('message'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-success"></i> Success!</h4>
		{{ session('message') }}
	</div>
@endif

@if (session()->has('error'))
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-warning"></i> Error!</h4>
		{{ session('error') }}
	</div>
@endif