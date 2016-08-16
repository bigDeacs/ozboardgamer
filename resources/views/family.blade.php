@extends('app')

@section('meta')
    <title>{{ $family->name }} | Families | Oz Board Gamer</title>
    {!! $family->meta !!}
@endsection

@section('head')
	{!! $family->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="hidden-xs"><a href="/families">Families</a></li>
				<li class="active"><span>{{ $family->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>{{ $family->name }}</h1>
			      	<p>{{ $family->description }}</p>
			      </div>
			    </div>

				@foreach($games as $game)
					<div class="row">
		                <div class="col-md-12 post">
		                    <div class="row post-content">
		                        <div class="col-md-2 col-sm-3">
		                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
		                                <img src="{{ secure_url('/') }}{{ $game->image }}" alt="{!! $game->name !!}" class="img-responsive">
		                            </a>
		                        </div>
		                        <div class="col-md-8 col-sm-7">
		                            <h4>
		                                <strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="post-title">{!! $game->name !!}</a></strong></h4>
		                            <p>
		                                {!! str_limit(strip_tags($game->description), $limit = 100, $end = '...') !!}
		                            </p>
		                            <p>
		                                <a class="btn btn-dark" href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">Read more</a>
		                            </p>
		                        </div>
		                        <div class="col-sm-2 hidden-xs">
		                            <div class="well">
										@if($game->rating < 1)
											<img src="/img/1.png" class="img-responsive" />
										@elseif($game->rating < 2)
											<img src="/img/2.png" class="img-responsive" />
										@elseif($game->rating < 3)
											<img src="/img/3.png" class="img-responsive" />
										@elseif($game->rating < 4)
											<img src="/img/4.png" class="img-responsive" />
										@elseif($game->rating < 5)
											<img src="/img/5.png" class="img-responsive" />
										@elseif($game->rating < 6)
											<img src="/img/6.png" class="img-responsive" />
										@elseif($game->rating < 7)
											<img src="/img/7.png" class="img-responsive" />
										@elseif($game->rating < 8)
											<img src="/img/8.png" class="img-responsive" />
										@elseif($game->rating < 9)
											<img src="/img/9.png" class="img-responsive" />
										@else
											<img src="/img/10.png" class="img-responsive" />
										@endif
										<div class="text-center lead">
											<strong>{{ number_format((float)$game->rating, 1, '.', '') }}/10</strong>
										</div>
									</div>
		                        </div>
		                    </div>
		                </div>
		            </div>
				@endforeach
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $games->render() !!}
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-xs-12">
		                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		                <!-- Footer Ad -->
		                <ins class="adsbygoogle"
		                     style="display:block"
		                     data-ad-client="ca-pub-5206537313688631"
		                     data-ad-slot="2769589305"
		                     data-ad-format="auto"></ins>
		                <script>
		                (adsbygoogle = window.adsbygoogle || []).push({});
		                </script>
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $family->scripts !!}
@endsection
