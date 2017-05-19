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
  							<col width="15%">
							<col width="5%">
  							<col width="40%">
							<col width="20%">
						    <thead>
						    	<tr>
						    		<th>Name</th>
						    		<th>User Type</th>
						    		<th></th>
									<th></th>
									<th></th>
						    	</tr>
						    </thead>
						    <tbody>
								<?php
									$count = 0;								
								?>
						    	@foreach($users as $user)
						    	@if($user->status == 0)
							    	<tr class="danger">
							    @else
									<tr class="success">
								@endif
						    		<td scope="row">{{ $user->name }}</td>
						    		<td>
						    			@if($user->role == 'a')
						    				<i class="fa fa-lock"></i> Admin
						    			@else
						    				<i class="fa fa-user"></i> User
						    			@endif
						    		</td>
									<?php										
										$countOwned = 0;
										foreach($total[$count] as $game) { if($game->users()->first()->pivot->type == 'owned') { $countOwned++; } }	
										$count++;
									?>
									<td><span class="badge" style="background-color: #d9534f;">{{ $countOwned }}</span></td>
						    		<td>
						    			<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
						    			<a href="/users/{{ $user->slug }}?page=1" target="_blank" class="btn btn-primary">View <i class="fa fa-arrow-circle-o-right"></i></a>
										@if($user->status == 0)
											<a href="/admin/users/{{ $user->id }}/activate" class="btn btn-success">Activate <i class="fa fa-check"></i></a>
										@else
											<a href="/admin/users/{{ $user->id }}/deactivate" class="btn btn-danger">Deactivate <i class="fa fa-times"></i></a>
										@endif
						    		</td>
									<td><a href="/admin/users/{!! $user->id !!}/remove" class="btn btn-info">Remove</a></td>
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
