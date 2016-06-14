@extends('app')

@section('meta')
    <title>{{ $user->name }}</title>
@endsection

@section('head')
	
@endsection

@section('content')
	<?php 
		$owned = 0; 
		foreach($total as $game) { if($game->users()->first()->pivot->type == 'owned') { $owned++; } }
		$wanted = 0; 
		foreach($total as $game) { if($game->users()->first()->pivot->type == 'wanted') { $wanted++; } }
	?>
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/users">Contributors</a></li>
				<li class="active"><span>{{ $user->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">	
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>{{ $user->name }}</h1>
			      	<p>{!! $user->description !!}</p>	
			      </div>
			    </div>		 
			    <div class="row">
			      <div class="col-sm-9 col-xs-12">     
			      	Games {{ $user->name }} Owns <span class="badge">{{ $owned }}</span>
			      	@foreach($games as $game)
			      		@if($game->users()->first()->pivot->type == 'owned')
							<div class="row" itemscope itemtype="http://schema.org/Game">
				                <div class="col-md-12 post">
				                    <div class="row post-content">
				                        <div class="col-md-2 col-sm-3 col-xs-7">
				                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
				                                <img src="{{ $game->thumb }}" alt="{!! $game->name !!}" class="img-responsive" itemprop="image" />
				                            </a>
				                        </div>
				                        <div class="col-md-2 col-md-push-8 col-sm-2 col-sm-push-7 col-xs-5">
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
				                        <div class="col-md-8 col-md-pull-2 col-sm-7 col-sm-pull-2 col-xs-12">
				                            <h4 itemprop="name">
				                                <strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="post-title">{!! $game->name !!}</a></strong></h4>
				                            <p itemprop="description">
				                                {!! str_limit(strip_tags($game->description), $limit = 100, $end = '...') !!}
				                            </p>
				                            <p>
				                                <a class="btn btn-dark" href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">Read more</a>
				                            </p>
				                        </div>
				                        
				                    </div>
				                </div>
				            </div>
				        @endif
					@endforeach
					<hr />
					<div class="row">
						<div class="col-xs-12">
							<div class="text-center">
								{!! $games->appends(['sort' => $_GET['sort']])->render() !!}
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-12">     
			      	Games {{ $user->name }} Wants <span class="badge">{{ $wanted }}</span>
					@foreach($games as $game)
			      		@if($game->users()->first()->pivot->type == 'wanted')
							<div class="row" itemscope itemtype="http://schema.org/Game">
				                <div class="col-md-12 post">
				                    <div class="row post-content">
				                        <div class="col-xs-7">
				                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
				                                <img src="{{ $game->thumb }}" alt="{!! $game->name !!}" class="img-responsive" itemprop="image" />
				                            </a>
				                        </div>
				                        <div class="col-xs-5">
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
				                        <div class="col-xs-12">
				                            <h4 itemprop="name">
				                                <strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="post-title">{!! $game->name !!}</a></strong></h4>
				                            <p itemprop="description">
				                                {!! str_limit(strip_tags($game->description), $limit = 100, $end = '...') !!}
				                            </p>
				                            <p>
				                                <a class="btn btn-dark" href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">Read more</a>
				                            </p>
				                        </div>
				                        
				                    </div>
				                </div>
				            </div>
				        @endif
					@endforeach
			      </div>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script id="dsq-count-scr" src="//ozboardgamer.disqus.com/count.js" async></script>
	<script>
            $('#owned_list').select2({
            	placeholder: 'Choose your owned games',
            	tags: true
            });
            $('#wanted_list').select2({
            	placeholder: 'Choose your wanted games',
            	tags: true
            });
            $(document).ready(function() {
              $(".searchable-select").select2();
            });
      </script>
@endsection