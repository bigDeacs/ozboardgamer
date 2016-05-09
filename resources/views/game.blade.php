@extends('app')

@section('meta')
    <title>{{ $game->name }}</title>
    {!! $game->meta !!}
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
				<li><a href="/games/{{ $game->types()->first()->slug }}?page=1&sort=name-asc">{{ str_limit(strip_tags($game->types()->first()->name), $limit = 5, $end = '...') }}</a></li>
				<li class="active"><span>{{ str_limit(strip_tags($game->name), $limit = 10, $end = '...') }}</span></li>
			</ol>
		</div>
	</div>
	<div class="breadcrumb-holder hidden-xs">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li><a href="/games/{{ $game->types()->first()->slug }}?page=1&sort=name-asc">{{ $game->types()->first()->name }}</a></li>
				<li class="active"><span>{{ $game->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container" itemscope itemtype="http://schema.org/Game">
		<div class="row">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<div class="row">
			      <div class="col-sm-4 col-xs-12">
			      	<img src="{{ $game->thumb }}" class="img-responsive" itemprop="image" />
			      </div>
			      <div class="col-sm-8 col-xs-12">
			      	<h1 itemprop="name">{{ $game->name }}</h1>
			      	@unless($game->publishers->isEmpty())
				    	<small>
				    		@foreach($game->publishers as $key => $publisher)
					    		@if($key == (count($game->publishers) -1))
					    			<a href="/publishers/{{ $publisher->slug }}" itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">{{ $publisher->name }}</span></a>
					    		@else
					    			<a href="/publishers/{{ $publisher->slug }}" itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><span itemprop="name">{{ $publisher->name }}</span></a>, 
					    		@endif
					    	@endforeach
					     | Published: <span itemprop="datePublished">{{ $game->published }}</span></small>
					@endunless
			      	<div class="row">
				      <div class="col-xs-12">
					      	@unless($game->children->isEmpty())
						    	<div class="label label-warning">HAS EXPANSIONS</div>
						    	@foreach($game->children as $key => $child)
						    		@if($key == (count($game->children) -1))
						    			<a href="/games/{{ $game->types()->first()->slug }}/{{ $child->slug }}">{{ $child->name }}</a>
						    		@else
						    			<a href="/games/{{ $game->types()->first()->slug }}/{{ $child->slug }}">{{ $child->name }}</a>, 
						    		@endif
						    	@endforeach
						    @endunless
						    @unless($game->parent == null)
						    	<div class="label label-warning">EXPANSION</div>
						    	for <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->parent->slug }}">{{ $game->parent->name }}</a>
						    @endunless
				      	</div>
				    </div>
				    <div class="row text-center">
				      <div class="col-md-2 col-sm-3 col-xs-4">
						<img src="/img/players.png" class="img-responsive" />
						<div class="text-center lead" style="margin-bottom: 5px;">
							<strong itemprop="numberOfPlayers">{{ $game->players }}</strong>
						</div>
				      </div>
				      <div class="col-md-2 col-sm-3 col-xs-4">
						<img src="/img/ages.png" class="img-responsive" />
						<div class="text-center lead" style="margin-bottom: 5px;">
							<strong itemprop="typicalAgeRange">{{ $game->age }}</strong>
						</div>
				      </div>
				      <div class="col-md-2 col-sm-3 col-xs-4">
						<img src="/img/time.png" class="img-responsive" />
						<div class="text-center lead" style="margin-bottom: 5px;">
							<strong itemprop="timeRequired">{{ $game->time }}</strong>
						</div>
				      </div>
				    </div>
			      </div>
			    </div>
			    <br />
			    <div class="row">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><span class="hidden-xs">Game </span>Description</a></li>
						<li role="presentation"><a href="#contents" aria-controls="contents" role="tab" data-toggle="tab"><span class="hidden-xs">Game </span>Contents</a></li>
						@unless($posts->isEmpty())
							<li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab"><span class="hidden-xs">Game </span>Videos</a></li>
						@endunless
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
									    		<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
									    			<img src="{{ $post->image }}" class="img-responsive" />
									    		</a>
									    		<p><a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">{{ $post->name }}</a></p>
									    	</div>
								    	@endforeach
								    </div>
							    </div>
							</div>
						@endunless
					</div>
			    </div>
	      </div>
	      <div class="col-md-3 col-sm-4 col-xs-12">
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
			<div class="text-center">
			    <strong>Luck <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much luck is a part of gameplay"></span></strong>
			    <input id="luck" name="luck" value="{{ $game->luck }}" class="rating-loading">

			    <strong>Strategy <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much strategy is a part of gameplay"></span></strong>
			    <input id="strategy" name="strategy" value="{{ $game->strategy }}" class="rating-loading">
			
			    <strong>Complexity <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How many complex rules there are"></span></strong>
			    <input id="complexity" name="complexity" value="{{ $game->complexity }}" class="rating-loading">
			
			    <strong>Replay <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much replay value the game has"></span></strong>
			    <input id="replay" name="replay" value="{{ $game->replay }}" class="rating-loading">
			
			    <strong>Components <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="The quality of what comes in the box"></span></strong>
			    <input id="components" name="components" value="{{ $game->components }}" class="rating-loading">
			
			    <strong>Learning <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How easy the game is to learn"></span></strong>
			    <input id="learning" name="learning" value="{{ $game->learning }}" class="rating-loading">

			    <strong>Theme <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How much story/flavour is in the game"></span></strong>
			    <input id="theming" name="theming" value="{{ $game->theming }}" class="rating-loading">

			    <strong>Scaling <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="How well the game scales between player counts"></span></strong>
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
					    			<a href="/games/{{ $type->slug }}">{{ $type->name }}</a>
					    		@else
					    			<a href="/games/{{ $type->slug }}">{{ $type->name }}</a>, 
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
	    <hr />
	    <div class="row">
	    	<div class="col-xs-12" id="disqus_thread"></div>
	    </div>
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
  	<script>
		/**
		* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
		*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');

		s.src = '//ozboardgamer.disqus.com/embed.js';

		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
	{!! $game->scripts !!}
@endsection