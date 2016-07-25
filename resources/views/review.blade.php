@extends('app')

@section('meta')
    <title>{{ $post->name }}</title>
    {!! $post->meta !!}
    <meta property="og:title"              content="{{ $post->name }}" />
    <meta property="og:description"        content="{!! $post->description !!}" />
    <meta property="og:image"              content="{{ $post->image }}" />
@endsection

@section('head')
	{!! $post->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder hidden-lg hidden-md hidden-sm">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/{{ $post->category->slug }}">{{ str_limit(strip_tags($post->category->name), $limit = 5, $end = '...') }}</a></li>
				<li class="active"><span>{{ str_limit(strip_tags($post->name), $limit = 10, $end = '...') }}</span></li>
			</ol>
		</div>
	</div>
	<div class="breadcrumb-holder hidden-xs">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/{{ $post->category->slug }}">{{ $post->category->name }}</a></li>
				<li class="active"><span>{{ $post->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container" itemscope itemtype="http://schema.org/Review">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-12 hidden-xs">
			      	<div class="img-container">
				      	<div class="fill" style="background-image:url('{{ $post->image }}');" itemprop="image"></div>
				    </div>
			      </div>
			    </div>
				<div class="row">
				  @if($post->games->isEmpty())
				  	<div class="col-sm-12 col-xs-12">
				  @else
			      	<div class="col-sm-9 col-xs-12">
			      @endif
					@unless($post->video == null)			      	
			      		<div class="embed-responsive embed-responsive-16by9">
	      					<iframe class="embed-responsive-item" src="{{ $post->video }}" allowfullscreen itemprop="video"></iframe>
	      				</div>
			      	@endunless
			      	<div class="panel panel-success" style="padding: 0 10px;">
			      		<h1 itemprop="name">{{ $post->name }}</h1>
			      		<span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $post->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
		                            </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span>
			      		<p itemprop="reviewBody">{!! $post->description !!}</p>
			      	</div>
			      </div>
				  @unless($games->isEmpty())
				  	<div class="col-sm-3 col-xs-12 text-center lead" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
				  		<p><strong>Games mentioned:</strong></p>
				    	@foreach($games as $game)
							<div class="row">
								<div class="col-xs-12">
						    		<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
						    			<img src="{{ $game->image }}" class="img-responsive" />
						    		</a>
						    		<p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}"><span itemprop="name">{{ $game->name }}</span></a></p>
						    	</div>
						    </div>
				    	@endforeach
				    </div> 
				  @endunless
				</div>
			    <hr />
			    <div class="row">
			    	<div id="disqus_thread"></div>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
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
	{!! $post->scripts !!}
@endsection