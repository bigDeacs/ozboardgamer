@extends('app')

@section('meta')
    <title>{{ $user->name }} | Users | Oz Board Gamer</title>
@endsection

@section('head')
	<?php
		$countOwned = 0;
		foreach($total as $game) { if($game->users()->first()->pivot->type == 'owned') { $countOwned++; } }
		$countWanted = 0;
		foreach($total as $game) { if($game->users()->first()->pivot->type == 'wanted') { $countWanted++; } }
	?>
	<meta property="og:title"              content="Check out this Collection!" />
	<meta property="og:description"        content="{{ $user->name }} owns {{ $countOwned }} games and has {{ $countWanted }} on his Watch List! Track your own collection now on OzBoardGamer.com" />
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/users">Users</a></li>
				<li class="active"><span>{{ $user->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-9 col-xs-12">
			      	<h1>{{ $user->name }}</h1>
			      </div>
			      <div class="col-sm-3 col-xs-12">
			      	<span>Sort by: </span>
			      	<form id="sortForm">
			      		<input type="hidden" name="page" value="{{ isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1 }}">
			      		<select class="form-control" onchange="sortGames()" name="sort" id="sort">
					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
						  	<option value="rating-asc" {{ (Request::input('sort') == 'rating-asc') ? 'selected' : "" }}>Rating ASC</option>
						  	<option value="rating-desc" {{ (Request::input('sort') == 'rating-desc') ? 'selected' : "" }}>Rating DESC</option>
							<option value="published-asc" {{ (Request::input('sort') == 'published-asc') ? 'selected' : "" }}>Publish Date ASC</option>
							<option value="published-desc" {{ (Request::input('sort') == 'published-desc') ? 'selected' : "" }}>Publish Date DESC</option>
						</select>
					</form>
					<script>
						function sortGames() {
					        document.getElementById("sortForm").submit();
					    }
					</script>
			      </div>
			    </div>
          @if($user->description != '')
            <div class="row">
              <div class="col-xs-12">
                <p>{!! $user->description !!}</p>
              </div>
            </div>
          @endif
			    <div class="row">
			      <div class="col-sm-8 col-xs-12" id="parent">
              Games {{ $user->name }} Owns <span class="badge" style="background-color: #d9534f;">{{ $countOwned }}</span>
			      	@foreach($owned as $game)
						<div class="row" itemscope itemtype="http://schema.org/Game">
			                <div class="col-md-12 post">
			                    <div class="row post-content">
			                        <div class="col-md-2 col-sm-3 col-xs-7">
			                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
			                                <img src="https://img.ozboardgamer.com/{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive" itemprop="image" />
			                            </a>
			                        </div>
			                        <div class="col-md-2 col-md-push-8 col-sm-2 col-sm-push-7 col-xs-5">
										@if($game->rating < 1)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/1.png" class="img-responsive" />
										@elseif($game->rating < 2)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/2.png" class="img-responsive" />
										@elseif($game->rating < 3)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/3.png" class="img-responsive" />
										@elseif($game->rating < 4)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/4.png" class="img-responsive" />
										@elseif($game->rating < 5)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/5.png" class="img-responsive" />
										@elseif($game->rating < 6)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/6.png" class="img-responsive" />
										@elseif($game->rating < 7)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/7.png" class="img-responsive" />
										@elseif($game->rating < 8)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/8.png" class="img-responsive" />
										@elseif($game->rating < 9)
											<img src="{{ secure_url('/', $parameters = ['img']) }}/9.png" class="img-responsive" />
										@else
											<img src="{{ secure_url('/', $parameters = ['img']) }}/10.png" class="img-responsive" />
										@endif
										<div class="text-center small-lead">
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
			                                <a class="btn btn-danger" href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">Read more</a>
			                            </p>
			                        </div>

			                    </div>
			                </div>
			            </div>
					@endforeach
					<hr />
					<div class="row">
						<div class="col-xs-12">
							<div class="text-center">
								@if(isset($_GET['sort']))
									{!! $owned->appends(['sort' => $_GET['sort']])->render() !!}
								@else
									{!! $owned->render() !!}
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 hidden-xs">
					<div class="scrollBox" id="child">
				      	{{ $user->name }}'s Watchlist <span class="badge" style="background-color: #d9534f;">{{ $countWanted }}</span>
						@foreach($wanted as $game)
							<div class="row" itemscope itemtype="http://schema.org/Game">
				                <div class="col-md-12 post">
				                    <div class="row post-content">
				                        <div class="col-xs-7">
				                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
				                                <img src="https://img.ozboardgamer.com/{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive" itemprop="image" />
				                            </a>
				                        </div>
				                        <div class="col-xs-5">
											@if($game->rating < 1)
												<img src="https://img.ozboardgamer.com/img/1.png" class="img-responsive" />
											@elseif($game->rating < 2)
												<img src="https://img.ozboardgamer.com/img/2.png" class="img-responsive" />
											@elseif($game->rating < 3)
												<img src="https://img.ozboardgamer.com/img/3.png" class="img-responsive" />
											@elseif($game->rating < 4)
												<img src="https://img.ozboardgamer.com/img/4.png" class="img-responsive" />
											@elseif($game->rating < 5)
												<img src="https://img.ozboardgamer.com/img/5.png" class="img-responsive" />
											@elseif($game->rating < 6)
												<img src="https://img.ozboardgamer.com/img/6.png" class="img-responsive" />
											@elseif($game->rating < 7)
												<img src="https://img.ozboardgamer.com/img/7.png" class="img-responsive" />
											@elseif($game->rating < 8)
												<img src="https://img.ozboardgamer.com/img/8.png" class="img-responsive" />
											@elseif($game->rating < 9)
												<img src="https://img.ozboardgamer.com/img/9.png" class="img-responsive" />
											@else
												<img src="https://img.ozboardgamer.com/img/10.png" class="img-responsive" />
											@endif
											<div class="text-center small-lead">
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
				                                <a class="btn btn-danger" href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">Read more</a>
				                            </p>
				                        </div>

				                    </div>
				                </div>
				            </div>
						@endforeach
					</div>
			      </div>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
            $("#child").css("height",$("#parent").height());
     });
  </script>
@endsection
