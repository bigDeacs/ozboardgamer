@extends('appAdmin')

@section('meta')
    <title>Games</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Games</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/pushGames" class="btn btn-danger">Push To Algolia <i class="fa fa-cloud-upload"></i></a> <a href="/admin/games/create" class="btn btn-primary">Create Game <i class="fa fa-plus-square"></i></a></div>
			  	<div style="clear:both;"></div>
			  	<div class="row">
					<div class="col-sm-12">
						<p><strong>Games:</strong></p>
						<div class="table-responsive">
						  <table class="table dataTable table-striped table-hover">
						  	<col width="20%">
  							<col width="20%">
  							<col width="20%">
  							<col width="40%">
						    <thead>
						    	<tr>
						    		<th>Name</th>
						    		<th>Type</th>
                    <th>Published</th>
                    <th>Rating</th>
						    		<th></th>
						    	</tr>
						    </thead>
						    <tbody>
						    	@foreach($games as $game)
						    	@if($game->status == 0)
							    	<tr class="danger">
							    @else
									<tr class="success">
								@endif
						    		<td scope="row">{{ $game->name }}</td>
						    		<td scope="row">{{ $game->types()->first()->name }}</td>
                    <td scope="row">{{ $game->published }}</td>
						    		<td scope="row">{{ number_format((float)$game->rating, 1, '.', '') }}/10</td>
						    		<td>
						    			<a href="/admin/games/{{ $game->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
						    			<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" target="_blank" class="btn btn-primary">View <i class="fa fa-arrow-circle-o-right"></i></a>
						    			@if($game->status == 0)
											<a href="/admin/games/{{ $game->id }}/activate" class="btn btn-success">Activate <i class="fa fa-check"></i></a>
										@else
											<a href="/admin/games/{{ $game->id }}/deactivate" class="btn btn-danger">Deactivate <i class="fa fa-times"></i></a>
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
