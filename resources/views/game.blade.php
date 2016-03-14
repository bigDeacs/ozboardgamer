@extends('app')

@section('meta')
    <title>{{ $game->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row">
				<div class="col-sm-9 col-xs-12">
					<div class="row">
				      <div class="col-sm-3 col-xs-12">
				      	<img src="{{ $game->image }}" class="img-responsive" />
				      	<div class="row">
					      <div class="col-sm-4 col-xs-12">
					      	<div class="well" style="padding: 0;">
								<img src="/img/players.png" class="img-responsive" />
								<div class="text-center lead" style="margin-bottom: 5px;">
									<strong>{{ $game->players }}</strong>
								</div>
							</div>
					      </div>
					      <div class="col-sm-4 col-xs-12">
					      	<div class="well" style="padding: 0;">
								<img src="/img/ages.png" class="img-responsive" />
								<div class="text-center lead" style="margin-bottom: 5px;">
									<strong>{{ $game->age }}</strong>
								</div>
							</div>
					      </div>
					      <div class="col-sm-4 col-xs-12">
					      	<div class="well" style="padding: 0;">
								<img src="/img/time.png" class="img-responsive" />
								<div class="text-center lead" style="margin-bottom: 5px;">
									<strong>{{ $game->time }}</strong>
								</div>
							</div>
					      </div>
					    </div>
				      </div>
				      <div class="col-sm-9 col-xs-12">
				      	<h1>{{ $game->name }}</h1>
						@unless($game->publisher == null)			      	
				      		<small><a href="">{{ $game->publisher->name }}</a> | Published: {{ $game->published }}</small>
				      	@endunless
				      	<div class="row">
					      <div class="col-sm-6 col-xs-12">
						      	@unless($game->children->isEmpty())
							    	<div class="label label-warning">HAS EXPANSIONS</div>
							    	@foreach($game->children as $child)
							    		<a href="">{{ $child->name }}</a>, 
							    	@endforeach
							    @endunless
							    @unless($game->parent == null)
							    	<div class="label label-warning">EXPANSION</div>
							    	for <a href="">{{ $game->parent->name }}</a>
							    @endunless
					      	</div>
					    </div>
				      </div>
				    </div>
				    <hr />
				    <div class="row">
				    	<div class="col-sm-9 col-xs-12">
					    	<strong>Game Description:</strong>
					    	<p>{{ $game->description }}</p>
					    </div>
					    <div class="col-sm-3 col-xs-12">
							<strong>Contents:</strong>
					    	<p>{{ $game->contents }}</p>
					    </div>
				    </div>
				    <hr />
				    <div class="row">
				    	<div id="disqus_thread"></div>
				    </div>
		      </div>
		      <div class="col-sm-3 col-xs-12">
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
				<div class="row text-center">
					<div class="col-xs-12">
					    <strong>Luck</strong>
					    <input id="luck" name="luck" value="{{ $game->luck }}" class="rating-loading">
					</div>
					<div class="col-xs-12">
					    <strong>Strategy</strong>
					    <input id="strategy" name="strategy" value="{{ $game->strategy }}" class="rating-loading">
					</div>
					<div class="col-xs-12">
					    <strong>Complexity</strong>
					    <input id="complexity" name="complexity" value="{{ $game->complexity }}" class="rating-loading">
					</div>
					<div class="col-xs-12">
					    <strong>Replay</strong>
					    <input id="replay" name="replay" value="{{ $game->replay }}" class="rating-loading">
					</div>
					<div class="col-xs-12">
					    <strong>Components</strong>
					    <input id="components" name="components" value="{{ $game->components }}" class="rating-loading">
					</div>
					<div class="col-xs-12">
					    <strong>Learning</strong>
					    <input id="learning" name="learning" value="{{ $game->learning }}" class="rating-loading">
					</div>
					<hr />
					@unless($game->themes->isEmpty())
						<strong>Themes</strong>
						<div class="row">
							<div class="col-sm-12">
						    	@foreach($game->themes as $theme)
						    		<a href="">{!! $theme->name !!}</a>, 
						    	@endforeach
							</div>
						</div>
					@endunless
					@unless($game->mechanics->isEmpty())
						<strong>Mechanics</strong>
						<div class="row">
							<div class="col-sm-12">
						    	@foreach($game->mechanics as $mechanic)
						    		<a href="">{!! $mechanic->name !!}</a>, 
						    	@endforeach
							</div>
						</div>
					@endunless
					@unless($game->types->isEmpty())
						<strong>Game Types</strong>
						<div class="row">
							<div class="col-sm-12">
						    	@foreach($game->types as $type)
						    		<a href="">{!! $type->name !!}</a>, 
						    	@endforeach
							</div>
						</div>
					@endunless
				</div>
		      </div>
		    </div>
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
        });
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
@endsection