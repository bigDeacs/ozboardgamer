@extends('app')

@section('meta')
    <title>{{ $game->name }} | {{ $game->types()->first()->name }} | Oz Board Gamer</title>
    {!! $game->meta !!}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $game->name }} - Oz Board Gamer">
    <meta property="og:url" content="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
    <meta property="og:image" content="{{ secure_url('/') }}{{ $game->thumb }}">
@endsection

@section('head')
	{!! $game->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder hidden-lg hidden-md hidden-sm">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li><a href="/games/{{ $game->types()->first()->slug }}">{{ str_limit(strip_tags($game->types()->first()->name), $limit = 5, $end = '...') }}</a></li>
				<li class="active"><span>{{ str_limit(strip_tags($game->name), $limit = 10, $end = '...') }}</span></li>
			</ol>
		</div>
	</div>
	<div class="breadcrumb-holder hidden-xs">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li><a href="/games/{{ $game->types()->first()->slug }}">{{ $game->types()->first()->name }}</a></li>
				<li class="active"><span>{{ $game->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container" itemscope itemtype="http://schema.org/Game">
		<div class="row">
			<div class="col-xs-12">
					<h1 itemprop="name">{{ $game->name }}</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<div class="row">					
					<div class="col-md-4 col-xs-5 text-center">
						<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" class="img-responsive" itemprop="image" />
					</div>
					<div class="col-md-8 col-xs-7">						
						@unless($game->publishers->isEmpty())
							<div style="margin-bottom: 10px;">
								<small>
									@foreach($game->publishers as $key => $publisher)
										@if($key == (count($game->publishers) -1))
											<a href="/publishers/{{ $publisher->slug }}" itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">{{ $publisher->name }}</span></a>
										@else
											<a href="/publishers/{{ $publisher->slug }}" itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">{{ $publisher->name }}</span></a>,
										@endif
									@endforeach
									| Published: <span itemprop="datePublished">{{ $game->published }}</span>
								</small>
							</div>
						@endunless
						@unless($game->children->isEmpty())
							<div class="row hidden-xs" style="margin-bottom: 10px;">
								<div class="col-xs-12">
									<div class="label label-warning">HAS EXPANSIONS</div>
									@foreach($game->children as $key => $child)
										@if($key == (count($game->children) -1))
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $child->slug }}">{{ $child->name }}</a>
										@else
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $child->slug }}">{{ $child->name }}</a>,
										@endif
									@endforeach
								</div>
							</div>
						@endunless
						@unless($game->parent == null)	
							<div class="row hidden-xs" style="margin-bottom: 10px;">				
								<div class="col-xs-12">							
									<div class="label label-warning">EXPANSION FOR</div> <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->parent->slug }}">{{ $game->parent->name }}</a>								
								</div>
							</div>
						@endunless							
						<div class="row text-center">
							<div class="col-md-2 col-sm-3 col-xs-4">
								<div class="text-center" style="margin-bottom: 5px;">
									<p><i class="fa fa-users fa-3x" aria-hidden="true"></i></p>
									<p style="font-size: 20px;"><strong itemprop="numberOfPlayers">{{ $game->players }}</strong></p>
								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-xs-4">								
								<div class="text-center" style="margin-bottom: 5px;">
									<p><i class="fa fa-birthday-cake fa-3x" aria-hidden="true"></i></p>
									<p style="font-size: 20px;"><strong itemprop="typicalAgeRange">{{ $game->age }}</strong></p>
								</div>
							</div>
							<div class="col-md-2 col-sm-3 col-xs-4">								
								<div class="text-center" style="margin-bottom: 5px;">
									<p><i class="fa fa-clock-o fa-3x" aria-hidden="true"></i></p>
									<p style="font-size: 20px;"><strong itemprop="timeRequired">{{ $game->time }}</strong></p>
								</div>
							</div>
						</div>  
						<div class="row hidden-xs">
						  @if(Session::has('name'))
							<strong>Rate This Game</strong>
							<div style="clear:both;"></div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/1' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/1' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="1 Awful"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 1)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/1.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/2' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/2' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="2 Very Bad"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 2)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/2.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/3' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/3' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="3 Bad"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 3)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/3.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/4' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/4' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="4 Not Good"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 4)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/4.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/5' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/5' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="5 Mediocre"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 5)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/5.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/6' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/6' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="6 Okay"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 6)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/6.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/7' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/7' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="7 Good"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 7)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/7.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/8' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/8' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="8 Very Good"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 8)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/8.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/9' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/9' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="9 Excellent"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 9)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/9.png"
									   class="img-responsive" />
							  </a>
							</div>
							<div class="col-xs-1" style="padding:0;">
							  <a rel="nofollow" href="{{ $game->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('slug')).'/addGameRating/'.$game->id.'/rating/10' : '/users/'.str_slug(Session::get('slug')).'/updateGameRating/'.$game->id.'/rating/10' }}"
								 data-toggle="tooltip"
								 data-placement="bottom"
								 title="10 Perfect"
								 rel="nofollow">
								  <img style="{{ $game->users()->wherePivot('rating', 10)->where('slug', str_slug(Session::get('slug')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
									   src="{{ secure_url('/', $parameters = ['img']) }}/10.png"
									   class="img-responsive" />
							  </a>
							</div>
						  @else
							<strong>Login for more features!</strong>
							<div style="clear:both;"></div>
							@for ($i = 1; $i < 11; $i++)
							  <div class="col-xs-1" style="padding:0;">
								<img style="opacity: 0.5;filter: alpha(opacity=50);" src="/img/{{ $i }}.png" class="img-responsive" />
								</div>
							@endfor
							@endif
					  </div>
					</div>
				</div>			
          <br />
          <div class="row">
            <div class="btn-group btn-group-justified col-xs-12" role="group">
              @if(Session::has('name'))
                  @if($game->users()->wherePivot('type', 'owned')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty())
                    <a rel="nofollow" href="/users/{{ str_slug(Session::get('slug')) }}/addToOwned/{!! $game->id !!}" class="btn btn-success" style="font-size:13px;" rel="nofollow"><i class="fa fa-plus" aria-hidden="true"></i> Add<span class="hidden-xs hidden-sm"> to Owned</span></a>
                  @else
                    <a rel="nofollow" href="/users/{{ str_slug(Session::get('slug')) }}/removeFromOwned/{!! $game->id !!}" class="btn btn-danger" style="font-size:13px;" rel="nofollow"><i class="fa fa-minus" aria-hidden="true"></i> Remove<span class="hidden-xs hidden-sm"> from Owned</span></a>
                @endif
                @if($game->users()->wherePivot('type', 'wanted')->where('slug', str_slug(Session::get('slug')))->get()->isEmpty())
                    <a rel="nofollow" href="/users/{{ str_slug(Session::get('slug')) }}/addToWanted/{!! $game->id !!}" class="btn btn-success" style="font-size:13px;" rel="nofollow"><i class="fa fa-eye" aria-hidden="true"></i> Watch<span class="hidden-xs hidden-sm"> Game</span></a>
                  @else
                    <a rel="nofollow" href="/users/{{ str_slug(Session::get('slug')) }}/removeFromWanted/{!! $game->id !!}" class="btn btn-danger" style="font-size:13px;" rel="nofollow"><i class="fa fa-eye-slash" aria-hidden="true"></i> Unwatch<span class="hidden-xs hidden-sm"> Game</span></a>
                @endif             
              @endif
				<a href="/stores" class="btn btn-warning hidden-xs" style="font-size:13px;"><i class="fa fa-home" aria-hidden="true"></i> <span class="hidden-xs">Find </span>In Store</a>
				<a href="http://www.boardgamesearch.com.au/#!/search/{!! $game->name !!}" target="_blank" class="btn btn-primary hidden-xs" style="font-size:13px;" title="Search on Board Game Shopper"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="hidden-xs">Find </span>Online</a>
          </div>
        </div>
			    <br />
			    <div class="row">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><i class="fa fa-book" aria-hidden="true"></i> Game<span class="hidden-xs hidden-sm"> Description</span></a></li>
						<li role="presentation"><a href="#contents" aria-controls="contents" role="tab" data-toggle="tab"><i class="fa fa-diamond" aria-hidden="true"></i> Game<span class="hidden-xs hidden-sm"> Contents</span></a></li>
						@unless($posts->isEmpty())
							<li role="presentation" class="hidden-xs"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i><span class="hidden-sm"> Game Videos</span></a></li>
						@endunless
						<li role="presentation"><a href="#related" aria-controls="related" role="tab" data-toggle="tab"><i class="fa fa-link" aria-hidden="true"></i> Similar<span class="hidden-xs hidden-sm"> Games</span></a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="description">
							<div class="col-xs-12 panel panel-success" itemprop="description" style="min-height: 650px;">
								{!! $game->description !!}
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="contents">
							<div class="col-xs-12 panel panel-success" style="min-height: 650px;">
								{!! $game->contents !!}
							</div>
						</div>
						@unless($posts->isEmpty())
							<div role="tabpanel" class="tab-pane" id="videos">
								<div class="col-xs-12 panel panel-success" style="min-height: 650px;">
									<div class="row">
								    	@foreach($posts as $post)
								    		<div class="col-md-6 col-sm-12">
									    		@if($post->image == null || $post->image == '')
                            <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
                              <img src="{{ secure_url('/') }}/img/no_video.jpg" class="img-responsive" />
                            </a>
                          @else
                            <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
  									    			<img src="https://img.ozboardgamer.com/{{ $post->image }}" class="img-responsive" />
  									    		</a>
                          @endunless
									    		<p class="text-center"><a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">{{ $post->name }}</a></p>
									    	</div>
								    	@endforeach
								    </div>
							    </div>
							</div>
						@endunless
						<div role="tabpanel" class="tab-pane" id="related">
							<div class="col-xs-12 panel panel-success" style="min-height: 650px;">
								<div class="row">
							    	@foreach($related as $rel)
							    		<div class="row" itemscope itemtype="http://schema.org/Game" style="margin: 0 25px;">
							                <div class="col-md-12 post">
							                    <div class="row post-content">
							                        <div class="col-md-2 col-sm-3 col-xs-7">
							                            <a href="/games/{{ $rel->types()->first()->slug }}/{{ $rel->slug }}">
							                                <img src="https://img.ozboardgamer.com{{ $rel->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $rel->thumb1x }} 1x, https://img.ozboardgamer.com{{ $rel->thumb2x }} 2x" alt="{!! $rel->name !!}" class="img-responsive" itemprop="image" />
							                            </a>
							                        </div>
							                        <div class="col-md-2 col-md-push-8 col-sm-2 col-sm-push-7 col-xs-5">
														@if($rel->rating < 1)
															<img src="https://img.ozboardgamer.com/img/1.png" class="img-responsive" />
														@elseif($rel->rating < 2)
															<img src="https://img.ozboardgamer.com/img/2.png" class="img-responsive" />
														@elseif($rel->rating < 3)
															<img src="https://img.ozboardgamer.com/img/3.png" class="img-responsive" />
														@elseif($rel->rating < 4)
															<img src="https://img.ozboardgamer.com/img/4.png" class="img-responsive" />
														@elseif($rel->rating < 5)
															<img src="https://img.ozboardgamer.com/img/5.png" class="img-responsive" />
														@elseif($rel->rating < 6)
															<img src="https://img.ozboardgamer.com/img/6.png" class="img-responsive" />
														@elseif($rel->rating < 7)
															<img src="https://img.ozboardgamer.com/img/7.png" class="img-responsive" />
														@elseif($rel->rating < 8)
															<img src="https://img.ozboardgamer.com/img/8.png" class="img-responsive" />
														@elseif($rel->rating < 9)
															<img src="https://img.ozboardgamer.com/img/9.png" class="img-responsive" />
														@else
															<img src="https://img.ozboardgamer.com/img/10.png" class="img-responsive" />
														@endif
														<div class="text-center small-lead">
															<strong>{{ number_format((float)$rel->rating, 1, '.', '') }}/10</strong>
														</div>
							                        </div>
							                        <div class="col-md-8 col-md-pull-2 col-sm-7 col-sm-pull-2 col-xs-12">
							                            <h4 itemprop="name">
							                                <strong><a href="/games/{{ $rel->types()->first()->slug }}/{{ $rel->slug }}" class="post-title">{!! $rel->name !!}</a></strong></h4>
							                            <p itemprop="description">
							                                {!! str_limit(strip_tags($rel->description), $limit = 100, $end = '...') !!}
							                            </p>
							                            <p>
							                                <a class="btn btn-danger" href="/games/{{ $rel->types()->first()->slug }}/{{ $rel->slug }}">Read more</a>
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
	      <div class="col-md-3 col-sm-4 col-xs-12">
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
			<div class="text-center lead" itemscope itemtype="http://schema.org/Rating">
				<meta itemprop="worstRating" content = "0">
				<strong><span itemprop="ratingValue">{{ number_format((float)$game->rating, 1, '.', '') }}</span>/<span itemprop="bestRating">10</span></strong>
			</div>
      <hr />
			<div class="text-center">
			    <strong><i class="icon-luck"></i> Luck <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much luck is a part of gameplay"></span></strong>
			    <input id="luck" name="luck" value="{{ $game->luck }}" class="rating-loading">

			    <strong><i class="icon-strategy"></i> Strategy <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much strategy is a part of gameplay"></span></strong>
			    <input id="strategy" name="strategy" value="{{ $game->strategy }}" class="rating-loading">

			    <strong><i class="icon-complexity"></i> Complexity <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How many complex rules there are"></span></strong>
			    <input id="complexity" name="complexity" value="{{ $game->complexity }}" class="rating-loading">

			    <strong><i class="icon-replay"></i> Replay <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much replay value the game has"></span></strong>
			    <input id="replay" name="replay" value="{{ $game->replay }}" class="rating-loading">

			    <strong><i class="icon-components"></i> Components <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The quality of what comes in the box"></span></strong>
			    <input id="components" name="components" value="{{ $game->components }}" class="rating-loading">

			    <strong><i class="icon-learning"></i> Learning <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How easy the game is to learn"></span></strong>
			    <input id="learning" name="learning" value="{{ $game->learning }}" class="rating-loading">

			    <strong><i class="icon-theme"></i> Theme <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much story/flavour is in the game"></span></strong>
			    <input id="theming" name="theming" value="{{ $game->theming }}" class="rating-loading">

			    <strong><i class="icon-scaling"></i> Scaling <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How well the game scales between player counts"></span></strong>
			    <input id="scaling" name="scaling" value="{{ $game->scaling }}" class="rating-loading">
				<hr />
				@unless($game->family == null)
		      		<strong>Family</strong>
		      		<div class="row">
						<div class="col-sm-12">
					    	<a href="/families/{{ $game->family->slug }}">{{ $game->family->name }}</a>
						</div>
					</div>
		      	@endunless
				@unless($game->themes->isEmpty())
					<strong>Themes</strong>
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->themes as $key => $theme)
					    		@if($key == (count($game->themes) -1))
					    			<a href="/themes/{{ $theme->slug }}">{{ $theme->name }}</a>
					    		@else
					    			<a href="/themes/{{ $theme->slug }}">{{ $theme->name }}</a>,
					    		@endif
					    	@endforeach
						</div>
					</div>
				@endunless
				@unless($game->mechanics->isEmpty())
					<strong>Mechanics</strong>
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->mechanics as $key => $mechanic)
					    		@if($key == (count($game->mechanics) -1))
					    			<a href="/mechanics/{{ $mechanic->slug }}">{{ $mechanic->name }}</a>
					    		@else
					    			<a href="/mechanics/{{ $mechanic->slug }}">{{ $mechanic->name }}</a>,
					    		@endif
					    	@endforeach
						</div>
					</div>
				@endunless
				@unless($game->types->isEmpty())
					<strong>Game Types</strong>
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->types as $key => $type)
					    		@if($key == (count($game->types) -1))
					    			<a href="/games/{{ $type->slug }}?page=1&sort=name-asc">{{ $type->name }}</a>
					    		@else
					    			<a href="/games/{{ $type->slug }}?page=1&sort=name-asc">{{ $type->name }}</a>,
					    		@endif
					    	@endforeach
						</div>
					</div>
				@endunless
				@unless($game->designers->isEmpty())
					<strong>Designers</strong>
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->designers as $key => $designer)
					    		@if($key == (count($game->designers) -1))
					    			<a href="/designers/{{ $designer->slug }}" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{{ $designer->name }}</span></a>
					    		@else
					    			<a href="/designers/{{ $designer->slug }}" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name">{{ $designer->name }}</span></a>,
					    		@endif
					    	@endforeach
						</div>
					</div>
				@endunless
			</div>
	      </div>
	    </div>
		<div class="sharethis-inline-share-buttons"></div>
      @if(Session::has('name'))
        <hr />
        <div class="row">
          <script>

          /**
           *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
           *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
          var disqus_config = function () {
              this.page.remote_auth_s3 = '{{ $data["sso"]["message"] }} {{ $data["sso"]["hmac"] }} {{ $data["sso"]["timestamp"] }}';
              this.page.api_key = '{{ $data["sso"]["publickey"] }}';
              this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = '{{ camel_case($game->name) }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = '//ozboardgamer.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
          })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          <div id="disqus_thread"></div>
        </div>
      @else
        <hr />
		  <div class="row text-center">
			<div class="col-xs-12">
				<h4>Login/Signup Using:</h4>
				<div class="row text-center">
					<div class="col-xs-4"><a href="/facebook" class="btn btn-primary btn-block" title="Login/Signup using Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></div>
					<div class="col-xs-4"><a href="/google" class="btn btn-danger btn-block" title="Login/Signup using Google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></div>
					<div class="col-xs-4"><a href="/twitter" class="btn btn-info btn-block" title="Login/Signup using Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></div>
			   </div>
				<h6>to add comments</h6>
			</div>
		  </div>
      @endif
	</div>
@endsection

@section('scripts')
	<script>
        $(document).on('ready', function(){
              $('#luck').rating({displayOnly: true, size: 'xs'});
              $('#strategy').rating({displayOnly: true, size: 'xs'});
              $('#complexity').rating({displayOnly: true, size: 'xs'});
              $('#replay').rating({displayOnly: true, size: 'xs'});
              $('#components').rating({displayOnly: true, size: 'xs'});
              $('#learning').rating({displayOnly: true, size: 'xs'});
              $('#theming').rating({displayOnly: true, size: 'xs'});
              $('#scaling').rating({displayOnly: true, size: 'xs'});
        });
        $(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
  	</script>
	{!! $game->scripts !!}
  <script>
	fbq('track', 'ViewContent');
  </script>
@endsection
