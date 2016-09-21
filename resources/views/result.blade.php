@extends('app')

@section('meta')
    <title>{{ $result->name }} | {{ $result->quiz->name }} | Oz Board Gamer</title>
    {!! $result->meta !!}
    <meta property="og:title"              content="{{ $result->name }} | What Type of Gamer are you?" />
  	<meta property="og:description"        content="I just took this quiz and got {{ $result->name }}! Take it yourself at https://ozboardgamer.com/quizzes/{{ $result->quiz->slug }}" />
    <meta property="og:url"                content="https://ozboardgamer.com/results/{{ $result->slug }}" />
    <meta property="og:image"              content="{{ secure_url('/') }}{{ $result->image }}" />
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
            <div class="pull-right hidden-xs" style="margin-top: 10px;">
              <div class="fb-share-button" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse">Share</a></div>
            </div>
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
            <div class="getsocial gs-reaction-button"></div>
            <div id="disqus_thread"></div>
            <script>

            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
            var disqus_config = function () {
                this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = '{{ camel_case($result->name) }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//ozboardgamer.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        @else
          <hr />
          <div class="row text-center">
            <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a> or
            <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a> to add comments
          </div>
        @endif
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
