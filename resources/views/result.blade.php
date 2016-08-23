@extends('app')

@section('meta')
    <title>{{ $result->name }} | {{ $result->quiz->name }} | Oz Board Gamer</title>
    {!! $result->meta !!}
@endsection

@section('head')
	{!! $result->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder hidden-lg hidden-md hidden-sm">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/{{ $result->quiz->slug }}">{{ str_limit(strip_tags($result->quiz->name), $limit = 5, $end = '...') }}</a></li>
				<li class="active"><span>{{ str_limit(strip_tags($result->name), $limit = 10, $end = '...') }}</span></li>
			</ol>
		</div>
	</div>
	<div class="breadcrumb-holder hidden-xs">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
        <li><a href="/quizzes">Quizzes</a></li>
        <li><a href="/{{ $result->quiz->slug }}">{{ $result->quiz->name }}</a></li>
				<li class="active"><span>{{ $result->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-12 hidden-xs">
			      	<div class="img-container">
				      	<div class="fill" style="background-image:url('{{ secure_url('/') }}{{ $result->image }}');"></div>
				    </div>
			      </div>
			    </div>
				<div class="row">
          @if($result->games->isEmpty())
				  	<div class="col-sm-12 col-xs-12">
				  @else
			      	<div class="col-sm-9 col-xs-12">
		      @endif
            <h1>{{ $result->name }}</h1>
            <p>{!! $result->description !!}</p>
          </div>
          @unless($games->isEmpty())
				  	<div class="col-sm-3 col-xs-12 text-center lead">
				  		<p><strong>Games mentioned:</strong></p>
				    	@foreach($games as $game)
							<div class="row">
								<div class="col-xs-12">
						    		<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
						    			<img src="{{ secure_url('/') }}{{ $game->thumb }}" class="img-responsive" />
						    		</a>
						    		<p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a></p>
						    	</div>
						    </div>
				    	@endforeach
				    </div>
				  @endunless
				</div>
        @if(Session::has('name'))
          <hr />
          <div class="row">
            <div class="fb-comments" data-numposts="10" data-width="100%"></div>
          </div>
        @else
          <hr />
          <div class="row text-center">
            <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a> to add comments
          </div>
        @endif
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
