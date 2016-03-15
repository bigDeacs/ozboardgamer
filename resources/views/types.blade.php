@extends('app')

@section('meta')
    <title>Games</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Games</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($types as $type)
						<div class="col-sm-3 col-xs-12">
					    	<a href="/games/{{ $type->slug }}">
				    			<img src="{{ $type->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/games/{{ $type->slug }}">{!! $type->name !!}</a></p>
						</div>
					@endforeach
				</div>
				<hr />

				@foreach($games as $game)
					<div class="row">
						<div class="col-sm-2 col-xs-12">
							<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
					    		<img src="{{ $game->image }}" class="img-responsive" />
					    	</a>
					    </div>
						<div class="col-sm-8 col-xs-12">
					    	<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
					    		{!! $game->name !!}
					    	</a>
					    	<p>{!! str_limit(strip_tags($game->description), $limit = 100, $end = '...') !!}</p>
						</div>
						<div class="col-sm-2 col-xs-12 text-center">
					    	<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="btn btn-warning">
					    		Find Out More
					    	</a>
						</div>
					</div>
					<hr />
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection