@extends('appAdmin')

@section('meta')
    <title>Featured Game</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Featured Game</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/features/create" class="btn btn-primary">Create Featured Game <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Quizzes:</strong></p>
						<div class="table-responsive">
						  <table class="table dataTable table-striped table-hover">
						  	<col width="20%">
  							<col width="20%">
  							<col width="20%">
  							<col width="40%">
						    <thead>
						    	<tr>
						    		<th>Month</th>
						    		<th>Year</th>
						    		<th>Game</th>
                					<th></th>
						    	</tr>
						    </thead>
						    <tbody>
						    	@foreach($features as $feature)
									<tr class="success">
						    			<td scope="row">{{ $feature->month }}</td>
						    			<td>{{ $feature->year }}</td>					   
						    			<td>{{ $feature->game()->name }}</td>
						    			<td><a href="/admin/features/{{ $feature->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a></td>
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
