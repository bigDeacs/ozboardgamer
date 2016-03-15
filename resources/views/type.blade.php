@extends('app')

@section('meta')
    <title>{{ $type->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>{{ $type->name }}</h1>
			      </div>
			    </div>

				@foreach($games as $game)
					<div class="row">
						<div class="col-sm-2 col-xs-12">
							<a href="/games/{{ $type->slug }}/{{ $game->slug }}">
					    		<img src="{{ $game->image }}" class="img-responsive" />
					    	</a>
					    </div>
						<div class="col-sm-8 col-xs-12">
					    	<a href="/games/{{ $type->slug }}/{{ $game->slug }}">
					    		{!! $game->name !!}
					    	</a>
					    	<p>{!! str_limit(strip_tags($game->description), $limit = 100, $end = '...') !!}</p>
						</div>
						<div class="col-sm-2 col-xs-12 text-center">
					    	<a href="/games/{{ $type->slug }}/{{ $game->slug }}" class="btn btn-warning">
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