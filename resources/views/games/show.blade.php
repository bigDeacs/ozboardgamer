@extends('appAdmin')

@section('meta')
    <title>{{ $game->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>{{ $game->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/{{ (Auth::check()) ? 'games' : '' }}" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>			  	
			  	<div style="clear:both;"></div>
				@unless($game->themes->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->themes as $theme)
					    		{!! $theme->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
				@unless($game->mechanics->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->mechanics as $mechanic)
					    		{!! $mechanic->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
				@unless($game->types->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->types as $type)
					    		{!! $type->name !!}
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