@extends('app')

@section('meta')
    <title>{{ $post->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>View {{ $post->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div style="clear:both;"></div>
				<div class="row">
			      <div class="col-sm-6 col-xs-12">
			      	<img src="{{ $post->image }}" class="img-responsive" />
			      </div>
			      <div class="col-sm-6 col-xs-12">
			      	<h1>{{ $post->name }}</h1>
			      </div>
			    </div>
				@unless($post->games->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($post->games as $game)
					    		{!! $game->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
			  </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection