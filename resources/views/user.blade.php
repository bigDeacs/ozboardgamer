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
			      <div class="col-sm-9 col-xs-12">
			      	<div class="row">
                <div class="col-sm-6 col-xs-12">
                  Games {{ $user->name }} Owns <span class="badge">{{ $countOwned }}</span>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <!-- Buttons start here. Copy this ul to your document. -->
                  <ul class="rrssb-buttons clearfix">
                    <li class="rrssb-facebook">
                      <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header: https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
                      <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="popup">
                        <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg></span>
                        <span class="rrssb-text">facebook</span>
                      </a>
                    </li>
                    <li class="rrssb-googleplus">
                      <!-- Replace href with your meta and URL information.-->
                      <a href="https://plus.google.com/share?url={{ Request::url() }}" class="popup">
                        <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"></path></svg></span>
                        <span class="rrssb-text">google+</span>
                      </a>
                    </li>
                    <li class="rrssb-twitter">
                      <!-- Replace href with your Meta and URL information  -->
                      <a href="https://twitter.com/intent/tweet?text={{ Request::url() }}"
                      class="popup">
                        <span class="rrssb-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg></span>
                        <span class="rrssb-text">twitter</span>
                      </a>
                    </li>
                  </ul>
  			      	</div>
              </div>
			      	@foreach($owned as $game)
						<div class="row" itemscope itemtype="http://schema.org/Game">
			                <div class="col-md-12 post">
			                    <div class="row post-content">
			                        <div class="col-md-2 col-sm-3 col-xs-7">
			                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
			                                <img src="{{ secure_url('/') }}{{ $game->thumb }}" alt="{!! $game->name !!}" class="img-responsive" itemprop="image" />
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
				<div class="col-sm-3 hidden-xs">
					<div class="wantedBox">
				      	{{ $user->name }}'s Watchlist <span class="badge">{{ $countWanted }}</span>
						@foreach($wanted as $game)
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
						@endforeach
					</div>
			      </div>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
