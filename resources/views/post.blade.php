@extends('app')

@section('meta')
    <title>{{ $post->name }} | {{ $post->category->name }} | Oz Board Gamer</title>
    {!! $post->meta !!}
@endsection

@section('head')
	{!! $post->head !!}
	<style>
		.tooltip.right > .tooltip-inner {
			max-width: 350px!important;
			width: 350px!important;
		}
	</style>
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
	<div class="container">
		<div class="row">
			@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
				<div class="col-sm-12">
					@unless($post->image == null)
						<div class="row">
						  <div class="col-sm-12 hidden-xs">					
							<h1>{{ $post->name }}</h1>
							<div class="img-container">
								<div class="fill" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');" itemprop="image"></div>
							</div>
						  </div>
						</div>
					@endunless
					<div class="row">					
						<div class="col-sm-12 col-xs-12">				
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
									<hr />
					  <div class="row text-center">
						<div class="col-xs-12">
							<h4>Login/Signup Using:</h4>
							<div class="row text-center">
								<div class="col-xs-4"><a href="/facebook" class="btn btn-ocean text-uppercase btn-block" title="Login/Signup using Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></div>
								<div class="col-xs-4"><a href="/google" class="btn btn-hot text-uppercase btn-block" title="Login/Signup using Google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></div>
								<div class="col-xs-4"><a href="/twitter" class="btn btn-sky text-uppercase btn-block" title="Login/Signup using Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></div>
						   </div>
							<h6>to add comments</h6>
						</div>
					  </div>								</p>
							</div>
						  </div>
					</div>
				</div>
			@else	
				<div class="col-sm-12">
					@unless($post->image == null)
						<div class="row">
						  <div class="col-sm-12 hidden-xs">
							<div class="img-container">
								<div class="fill" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');"></div>
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
							<h1>{{ $post->name }}</h1>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
									<span class="glyphicon glyphicon-user"></span> <a href="/users/{{ $post->user->slug }}?page=1&amp;sort=published_at-desc">{!! $post->user->name !!}</a> | <span class="glyphicon glyphicon-calendar">
										</span>{!! date('F d, Y', strtotime($post->published_at)) !!}
								</div>
								<div class="col-sm-6 col-md-5 col-lg-4 col-xs-12" style="display: flex;padding-left: 30px;">					
									<div style="margin: 0 10px;">
										<div class="fb-share-button" data-href="https://ozboardgamer.com/{{ $post->category->slug }}/{{ $post->slug }}" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ozboardgamer.com/{{ $post->category->slug }}/{{ $post->slug }}">Share</a></div>
									</div>
									<div style="margin: 0 10px;">
										<a class="twitter-share-button" href="https://ozboardgamer.com/{{ $post->category->slug }}/{{ $post->slug }}">Tweet</a>
									</div>
									<div style="margin: 0 10px;">
										<div class="g-plusone" data-size="tall" data-annotation="none" data-href="https://ozboardgamer.com/{{ $post->category->slug }}/{{ $post->slug }}"></div>
									</div>
								</div>
							</div>
							@unless($post->video == null)
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="{{ $post->video }}" allowfullscreen></iframe>
								</div>
							@endunless
							<p>{!! $post->description !!}</p>
							<div class="row">
								<div class="col-xs-12" style="background: #333333;color: #9d9d9d;">
									<div class="profile-header-container pull-left" style="padding: 10px 0;margin-right: 15px;">
										<div class="profile-header-img">
											<a href="/users/{{ $post->user->slug }}?page=1&amp;sort=published_at-desc">
												<img src="{{ $post->user->image }}" alt="{{ $post->user->name }}" class="img-circle img-shadow" width="100px" height="auto" title="{{ strip_tags($post->user->description) }}">
											</a>
										</div>
									</div>
									<div style="padding: 8px 0;">
										<h4 style="margin-bottom: 5px;">{{ $post->user->name }}</h4>
										<p>{!! $post->user->description !!}</p>
									</div>
								</div>
							</div>
						</div>
					  </div>
					  @unless($games->isEmpty())
						<div class="col-sm-3 hidden-xs text-center">
							<br />
							<div id="child" class="scrollBox">
								@foreach($games as $game)
									<div class="row">
										<div class="col-xs-12">
											<div style="position: absolute;right: 14px;bottom: 15px;">
												<p class="blogHeading text-right"><strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="post-title" itemprop="name" title="{{ $game->name }}" style="color:white;">{!! str_limit($game->name, 14) !!}</a></strong></p>
												<p class="blogHeadingSml text-right"><strong style="color:white;">{{ $game->types()->first()->name }}</strong></p>	
											</div>
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
												<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive img-shadow" itemprop="image" />
											</a>
										</div>
									</div>
									<br />
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
							<div class="col-xs-12" id="disqus_thread"></div>
						  </div>
						 </div>
					@else
					  <hr />
					  <div class="row text-center">
						<div class="col-xs-12">
							<h4>Login/Signup Using:</h4>
							<div class="row text-center">
								<div class="col-sm-4 col-xs-12"><a href="/facebook" class="btn btn-ocean text-uppercase btn-block" title="Login/Signup using Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></div>
								<div class="col-sm-4 col-xs-12"><a href="/google" class="btn btn-hot text-uppercase btn-block" title="Login/Signup using Google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></div>
								<div class="col-sm-4 col-xs-12"><a href="/twitter" class="btn btn-sky text-uppercase btn-block" title="Login/Signup using Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></div>
						   </div>
							<h6>to add comments</h6>
						</div>
					  </div>
					@endif
					<hr />
					@unless($posts->isEmpty())
						<div class="row">
							<div class="col-xs-12">    
								<h3>You might also like:</h3>
								@foreach($posts as $blog)
									<div class="col-xs-12 col-sm-4 post" style="margin-bottom: 15px;">				
										<div class="row">
											<div class="col-xs-12" style="overflow: hidden;height: 175px;">
												<div style="position: absolute;right: 15px;bottom: 0;">
													<p class="blogHeading text-right">
														<strong>														
															@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($blog->published_at)))												
																<a href="#" class="post-title disabled" itemprop="name"title="Login for access" style="color:white;">
																	{{ $blog->name }}
																</a>
															@else
																<a href="/blogs/{{ $blog->slug }}" class="post-title" itemprop="name" title="{{ $blog->name }}" style="color:white;">
																	{{ $blog->name }}
																</a>
															@endif
														</strong>
													</p>
													@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($blog->published_at)))												
														<p class="blogHeadingSml text-right">
															<strong style="color:white;">													
																<i class="fa fa-lock" aria-hidden="true"></i> Members only post <i class="fa fa-lock" aria-hidden="true"></i>											
															</strong>
														</p>
													@else
														<p class="blogHeadingSml text-right">
															<strong style="color:white;">													
																Blog											
															</strong>
														</p>
													@endif										
												</div>
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($blog->published_at)))
													<div class="offer offer-radius offer-danger">
														<div class="shape">
															<div class="shape-text">
																<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
															</div>
														</div>
														<div class="offer-content">
															<img src="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;opacity: 0.5;" width="100%" />
														</div>
													</div>	
												@else
													<a href="/blogs/{{ $blog->slug }}" title="{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->name }}">
														<img src="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
													</a>	
												@endif		
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12 post-header-line">						
												<span class="glyphicon glyphicon-calendar"></span>{!! date('F d, Y', strtotime($blog->published_at)) !!} | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/blogs/{{ $blog->slug }}#disqus_thread" data-disqus-identifier="{{ camel_case($blog->name) }}"></a>																									
											</div>		
										</div>							
										<div class="row post-content">
											<div class="col-xs-12">
												<p itemprop="description">													                                                    
													@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($blog->published_at)))
														<a class="btn btn-hot text-uppercase pull-right btn-block" href="/login" style="margin-top: 15px!important;"><i class="fa fa-sign-in"></i> Login/Signup</a>																							
													@else
														<a class="btn btn-hot text-uppercase pull-right btn-block" href="/blogs/{{ $blog->slug }}" style="margin-bottom: 15px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>													
													@endif  											
												</p>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@endunless	
				</div>
			@endif
		</div>
	</div>
@endsection

@section('scripts')
	{!! $post->scripts !!}
  <script>
    $(document).ready(function() {
            $("#child").css("max-height",$("#parent").height() - 50);
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			});
     });
  </script>
  <script>
	fbq('track', 'ViewContent');
  </script>
@endsection
