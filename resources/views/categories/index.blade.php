@extends('appAdmin')

@section('meta')
    <title>Categories</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Categories</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/categories/create" class="btn btn-primary">Create Category <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Categories:</strong></p>
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
						    	@foreach($categories as $category)
						    	<tr>
						    		<td scope="row">{{ $category->name }}</td>
						    		<td>
						    			<a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
						    			<a href="/categories/{{ $category->id }}" class="btn btn-primary">View <i class="fa fa-arrow-circle-o-right"></i></a>
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
