@extends('app')

@section('meta')
    <title>{{ $post->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<img src="{{ $post->image }}" class="img-responsive" />
			      </div>
			      <div class="col-sm-9 col-xs-12">
			      	<h1>{{ $post->name }}</h1>
					@unless($post->video == null)			      	
			      		<div class="embed-responsive embed-responsive-16by9">
	      					<iframe class="embed-responsive-item" src="{{ $post->video }}" allowfullscreen></iframe>
	      				</div>
			      	@endunless
			      	<p>{{ $post->description }}</p>
			      </div>
				  @unless($post->games->isEmpty())
				  	<div class="col-sm-3 col-xs-12">
				  		<p>Games in this video</p>
				    	@foreach($post->games as $game)
							<div class="row">
								<div class="col-md-6 col-sm-12">
						    		<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
						    			<img src="{{ $game->image }}" class="img-responsive" />
						    		</a>
						    		<p><a href="/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a></p>
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
@endsection