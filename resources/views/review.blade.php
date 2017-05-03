@extends('app')

@section('meta')
    <title>{{ $post->name }} | {{ $post->category->name }} | Oz Board Gamer</title>
    {!! $post->meta !!}
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
			@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
				<div class="col-sm-12">
					@unless($post->image == null)
						<div class="row">
						  <div class="col-sm-12 hidden-xs">
							<div class="img-container">
								<div class="fill" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');" itemprop="image"></div>
							</div>
						  </div>
						</div>
					@endunless
					<div class="row">
						@if($post->games->isEmpty())
							<div class="col-sm-12 col-xs-12">
						  @else
							<div class="col-sm-9 col-xs-12">
						  @endif					
							<div class="panel panel-success" style="padding: 0 10px;" id="parent">
								<h1 itemprop="name"><i class="fa fa-lock" aria-hidden="true"></i> Uh oh!</h1>
								<span class="glyphicon glyphicon-user"></span> <a href="/users/{{ $post->user->slug }}" itemprop="author">{!! $post->user->name !!}</a> | <span class="glyphicon glyphicon-calendar">
											</span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span>							
								<p itemprop="reviewBody">
									Sorry friend, but it looks like you stumbled upon a members only article. These will be open to the public 1 day after being published.<br />
									<br />
									If you would like to gain early access simply Login or Signup to OzBoardGamer. We promise you won't regret it!<br />
									<br />
									By signing up you will have access to amazing savings, early access to the latest articles, rate your favourite games and even keep track of your own game collection and watchlist online!<br />
									<br />
									It's easy, you can even Login with your Facebook or Google account with just a click of a button!
								</p>
							</div>
						  </div>
						  @unless($games->isEmpty())
							<div class="col-sm-3 hidden-xs text-center lead" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
								<p><strong>Games mentioned:</strong></p>
								<div id="child" class="scrollBox">
									@foreach($games as $game)
										<div class="row">
											<div class="col-xs-12">
												<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
													<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive img-shadow" itemprop="image" />
												</a>
												<p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}"><span itemprop="name">{{ $game->name }}</span></a></p>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						  @endunless
					</div>
				</div>
			@else										
				<div class="col-sm-12">
					@unless($post->image == null)
						<div class="row">
						  <div class="col-sm-12 hidden-xs">
							<div class="img-container">
								<div class="fill" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');" itemprop="image"></div>
							</div>
						  </div>
						</div>
					@endunless
					<div class="row">
					  @if($post->games->isEmpty())
						<div class="col-sm-12 col-xs-12">
					  @else
						<div class="col-sm-9 col-xs-12">
					  @endif					
						<div class="panel panel-success" style="padding: 0 10px;" id="parent">
							<h1 itemprop="name">{{ $post->name }}</h1>
							<span class="glyphicon glyphicon-user"></span> <a href="/users/{{ $post->user->slug }}" itemprop="author">{!! $post->user->name !!}</a> | <span class="glyphicon glyphicon-calendar">
										</span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span>
										<div id="socialShare" class="row hidden-xs" width="100%">
												<a data-toggle="dropdown" class="col-xs-10 col-xs-offset-1 btn btn-info">
													 <i class="fa fa-share-alt fa-inverse"></i> Share <span class="caret"></span>
												</a>													
												<ul class="dropdown-menu" style="padding: 5px 10px;top: 90%;">
													<li>
														<a data-original-title="Facebook" rel="tooltip" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://ozboardgamer.com/top10s/{{ $top10->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-facebook" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-facebook"></i> Share on Facebook
														</a>
													</li>
													<li>
														<a data-original-title="Twitter" rel="tooltip" onclick="window.open('http://twitter.com/home?status={{ $top10->name }}%0Ahttps://ozboardgamer.com/top10s/{{ $top10->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-twitter" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-twitter"></i> Share on Twitter
														</a>
													</li>
													<li>
														<a data-original-title="Google+" rel="tooltip" onclick="window.open('https://plus.google.com/share?url=https://ozboardgamer.com/top10s/{{ $top10->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-google" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-google-plus"></i> Share on Google+
														</a>
													</li>														
												</ul>
											</div>
							@unless($post->video == null)
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="{{ $post->video }}" allowfullscreen itemprop="video"></iframe>
								</div>
							@endunless
							<p itemprop="reviewBody">{!! $post->description !!}</p>
						</div>
					  </div>
					  @unless($games->isEmpty())
						<div class="col-sm-3 hidden-xs text-center lead" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
							<p><strong>Games mentioned:</strong></p>
							<div id="child" class="scrollBox">
								@foreach($games as $game)
									<div class="row">
										<div class="col-xs-12">
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
												<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive img-shadow" itemprop="image" />
											</a>
											<p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}"><span itemprop="name">{{ $game->name }}</span></a></p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					  @endunless
					</div>
					<div class="sharethis-inline-share-buttons"></div>
					@if(Session::has('name'))
					  <hr />
					  <div class="row">        
						<div class="col-xs-12">		  
							<script>

							/**
							 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
							var disqus_config = function () {
								this.page.remote_auth_s3 = '{{ $data["sso"]["message"] }} {{ $data["sso"]["hmac"] }} {{ $data["sso"]["timestamp"] }}';
								this.page.api_key = '{{ $data["sso"]["publickey"] }}';
								this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
								this.page.identifier = '{{ camel_case($post->name) }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
					  </div>
					@else
					  <hr />
					  <div class="row text-center">
						<a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>
						or <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a> <span class="hidden-xs">to add comments</span>
					  </div>
					@endif
				</div>	
			@endif
		</div>
	</div>
@endsection

@section('scripts')
	{!! $post->scripts !!}
	<script>
    $(document).ready(function() {
            $("#child").css("height",$("#parent").height() - 50);
     });
  </script>
  <script>
	fbq('track', 'ViewContent');
  </script>
@endsection
