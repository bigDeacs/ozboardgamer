@extends('appAdmin')

@section('meta')
    <title>Posts</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Posts</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/posts/create" class="btn btn-primary">Create Post <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Posts:</strong></p>
						<div class="table-responsive">
						  <table class="table dataTable table-striped table-hover">
						  	<col width="20%">
  							<col width="20%">
  							<col width="20%">
  							<col width="40%">
						    <thead>
						    	<tr>
						    		<th>Name</th>
						    		<th>Category</th>
						    		<th>Published</th>
						    		<th></th>
						    	</tr>
						    </thead>
						    <tbody>
						    	@foreach($posts as $post)
						    	@if($post->status == 0)
							    	<tr class="danger">
							    @else
									<tr class="success">
								@endif
						    		<td scope="row">{{ $post->name }}</td>
						    		<td scope="row">{{ $post->category->name }}</td>
						    		<td scope="row">{{ $post->published_at }}</td>
						    		<td>
						    			<a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
						    			<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" target="_blank" class="btn btn-primary">View <i class="fa fa-arrow-circle-o-right"></i></a>
						    			@if($post->status == 0)
											<a href="/admin/posts/{{ $post->id }}/activate" class="btn btn-success">Activate <i class="fa fa-check"></i></a>
										@else
											<a href="/admin/posts/{{ $post->id }}/deactivate" class="btn btn-danger">Deactivate <i class="fa fa-times"></i></a>
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
