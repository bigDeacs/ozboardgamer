@extends('appAdmin')

@section('meta')
    <title>Users</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Users</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/users/create" class="btn btn-primary">Create User <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Users:</strong></p>
						<div class="table-responsive">
						  <table class="table dataTable table-striped table-hover">
						  	<col width="20%">
  							<col width="20%">
  							<col width="20%">
  							<col width="40%">
						    <thead>
						    	<tr>
						    		<th>Name</th>
						    		<th></th>
						    	</tr>
						    </thead>
						    <tbody>
						    	@foreach($users as $user)
						    	<tr>
						    		<td scope="row">{{ $user->name }}</td>
						    		<td>
						    			<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
										@if($user->status == 0)
											<a href="/admin/users/{{ $user->id }}/activate" class="btn btn-success">Activate <i class="fa fa-check"></i></a>
										@else
											<a href="/admin/users/{{ $user->id }}/deactivate" class="btn btn-danger">Deactivate <i class="fa fa-times"></i></a>
										@endif
						    		</td>
						    	</tr>
						    	@endforeach
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>
@endsection
