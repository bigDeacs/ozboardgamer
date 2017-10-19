@extends('app')

@section('meta')
    <title>Oz Board Gamer - Board Games News, Reviews, Top 10s and More</title>
    <meta name="description" content="Helping you find your next favourite game! We have all the latests and greatest on board games. Check out our News, Reviews, Top 10s and more!">
	<meta name="keywords" content="Games,Game,Play,News,Reviews,Board,Online,Geek,Cards,Buy">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Oz Board Gamer - Board Games News, Reviews and More">
    <meta property="og:description" content="Want to find new board games? We have news, reviews and can even help you find out where to buy (both online and in store!).">
    <meta property="og:url" content="https://ozboardgamer.com">
    <meta property="og:image" content="https://ozboardgamer.com/img/logo.png">
@endsection

@section('head')
	<link rel="stylesheet" href="/css/flipclock.css">
@endsection

@section('content')
<!-- Header -->
	<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="5000" id="bs-carousel">
	  @unless($featured->isEmpty())
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
			@foreach($featured as $key => $post)
				<li data-target="#bs-carousel" data-slide-to="{{ ($key+1) }}"></li>
			@endforeach					
		</ol>
	  @endunless
	  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">		
			<div class="item slides active">
			  <!-- Overlay -->
			  <div class="overlay"></div>
			  <div class="slide-{{ ($featured->isEmpty()) ? '2' : '6' }}" style="background-image:url('https://img.ozboardgamer.com/img/buy-online.jpg');"></div>
			  <div class="hero" width="100%;">
				<hgroup>
					<p class="bigText">Buy Games</p>        
					<p class="smallText">Choose from thousands of Games and Accessories</p>
				</hgroup>
				<a href="/shop" class="btn btn-hero btn-lg">Start Shopping</a>
			  </div>
			</div>
			@unless($featured->isEmpty())
                @foreach($featured as $key => $post)
					<div class="item slides">
					  <!-- Overlay -->
					  <div class="overlay"></div>
					  <div class="slide-{{ ($key+2) }}" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');"></div>
					  <div class="hero" width="100%;">    
						<hgroup>
							@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
								<p class="bigText"><i class="fa fa-lock" aria-hidden="true"></i> {{ $post->category()->first()->name }} <i class="fa fa-lock" aria-hidden="true"></i></p>     
								<p class="smallText">Login/Signup for early access</p>	
							@else
								<p class="bigText">{{ $post->category()->first()->name }}</p>        
								<p class="smallText">{{ $post->name }}</p>
							@endif         							
						</hgroup>       
						@unless(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))			
							<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-hero btn-lg">Find Out More</a>
						@endunless 						
					  </div>
					</div>
                @endforeach
            @endunless			
	  </div> 
	</div>		
    <!-- Page Content -->
    <div class="container">
		<div class="row hidden-xs" style="border-bottom: 1px solid #DDD;">
			<div class="col-xs-12 text-center">
				<h1 style="margin-top: 10px;">Board Games News, Reviews, Top 10s and More</h1>		
				<h2>Helping you find your next favourite game!<h2>
			</div>
		</div>   
        @unless($games->isEmpty())
			<div class="row hidden-xs" style="border-bottom: 1px solid #DDD;">
				<div class="col-xs-12">
					<h3 style="margin-top: 10px;">Top Rated Board Games</h3>
					<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
								@foreach($games as $game)
									<li itemscope itemtype="http://schema.org/Game">
										<div class="thumbnail img-shadow" style="position: relative;">
											<div style="position: absolute;right: 4px;bottom: 15px;">
												<p class="blogHeading text-right"><strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" class="post-title" itemprop="name" title="{{ $game->name }}" style="color:white;">{!! str_limit($game->name, 14) !!}</a></strong></p>
												<p class="blogHeadingSml text-right"><strong style="color:white;">{{ $game->types()->first()->name }}</strong></p>	
											</div>
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
												<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" />
											</a>
										</div>
									</li>								
								@endforeach
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
					<p class="text-center" style="border-top: 1px solid #DDD;padding-top: 10px;">
						<a href="/games" class="btn btn-sm btn-fresh"><span class="fa fa-arrow-circle-right"></span> View More Board Games</a>
					</p>
				</div>
			</div>        
        @endunless
		@unless($reviews->isEmpty())
			<div class="row">
				<div class="col-xs-12">    
					<h4>Latest Board Game Reviews</h4>
					@foreach($reviews as $review)
						<div class="col-xs-12 col-sm-4 post" itemscope itemtype="http://schema.org/Review" style="margin-bottom: 15px;">
							<div class="row">
								<div class="col-xs-12" style="overflow: hidden;height: 175px;">
									<div style="position: absolute;right: 15px;bottom: 0;">
										<p class="blogHeading text-right">
											<strong>														
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))												
													<a href="#" class="post-title disabled" itemprop="name"title="Login for access" style="color:white;">
														{{ $review->name }}
													</a>
												@else
													<a href="/reviews/{{ $review->slug }}" class="post-title" itemprop="name" title="{{ $review->name }}" style="color:white;">
														{{ $review->name }}
													</a>
												@endif
											</strong>
										</p>
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))												
											<p class="blogHeadingSml text-right">
												<strong style="color:white;">													
													<i class="fa fa-lock" aria-hidden="true"></i> Members only post <i class="fa fa-lock" aria-hidden="true"></i>											
												</strong>
											</p>
										@else
											<p class="blogHeadingSml text-right">
												<strong style="color:white;">													
													Review											
												</strong>
											</p>
										@endif										
									</div>
									@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
										<div class="offer offer-radius offer-danger">
											<div class="shape">
												<div class="shape-text">
													<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
												</div>
											</div>
											<div class="offer-content">
												<img src="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $review->games()->first()->thumb2x }} 2x" alt="{{ $review->games()->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;opacity: 0.5;" width="100%" />																						
											</div>													
										</div>	
									@else
										<a href="/reviews/{{ $review->slug }}" title="{{ $review->games()->first()->name }}">
											<img src="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $review->games()->first()->thumb2x }} 2x" alt="{{ $review->games()->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
										</a>																										
									@endif
								</div>
							</div>							
							<div class="row">
								<div class="col-sm-12 post-header-line">
									<meta itemprop="author" content ="{!! $review->user->name !!}">
									<span class="glyphicon glyphicon-calendar"></span><span itemprop="datePublished">{!! date('F d, Y', strtotime($review->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/reviews/{{ $review->slug }}#disqus_thread" data-disqus-identifier="{{ camel_case($review->name) }}"></a>                               											
								</div>
							</div>
							<div class="row post-content">
								<div class="col-xs-12">
									<p itemprop="description" class="textbox-height">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
											This is a members only post, for early access to this post login or signup today!
										@else
											{!! str_limit(strip_tags($review->description), $limit = 250, $end = '...') !!}
										@endif    		
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/login" style="margin-top: 15px!important;"><i class="fa fa-sign-in"></i> Login/Signup</a>													
										@else
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/reviews/{{ $review->slug }}" style="margin-bottom: 15px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>													
										@endif  
									</p>
								</div>
							</div>
						</div>
					@endforeach
					<p class="text-center" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/reviews" class="btn btn-sm btn-fresh"><span class="fa fa-arrow-circle-right"></span> View More Board Game Reviews</a>
					</p>
				</div>
			</div>
		@endunless			
		@unless($top10s->isEmpty())
			<div class="row">
				<div class="col-xs-12">    
					<h4>Latest Board Game Top 10's</h4>
					@foreach($top10s as $top10)
						<div class="col-xs-12 col-sm-4 post" style="margin-bottom: 15px;">				
							<div class="row">
								<div class="col-xs-12" style="overflow: hidden;height: 175px;">
									<div style="position: absolute;right: 15px;bottom: 0;">
										<p class="blogHeading text-right">
											<strong>														
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))												
													<a href="#" class="post-title disabled" itemprop="name"title="Login for access" style="color:white;">
														{{ $top10->name }}
													</a>
												@else
													<a href="/top10s/{{ $top10->slug }}" class="post-title" itemprop="name" title="{{ $top10->name }}" style="color:white;">
														{{ $top10->name }}
													</a>
												@endif
											</strong>
										</p>
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))												
											<p class="blogHeadingSml text-right">
												<strong style="color:white;">													
													<i class="fa fa-lock" aria-hidden="true"></i> Members only post <i class="fa fa-lock" aria-hidden="true"></i>											
												</strong>
											</p>
										@else
											<p class="blogHeadingSml text-right">
												<strong style="color:white;">													
													Top 10's												
												</strong>
											</p>
										@endif										
									</div>
									@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
										<div class="offer offer-radius offer-danger">
											<div class="shape">
												<div class="shape-text">
													<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
												</div>
											</div>
											<div class="offer-content">
												<img src="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;opacity: 0.5;" width="100%" />
											</div>
										</div>	
									@else
										<a href="/top10s/{{ $top10->slug }}" title="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}">
											<img src="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
										</a>	
									@endif											
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 post-header-line">						
									<span class="glyphicon glyphicon-calendar"></span>{!! date('F d, Y', strtotime($top10->published_at)) !!} | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/top10s/{{ $top10->slug }}#disqus_thread" data-disqus-identifier="{{ camel_case($top10->name) }}"></a>																								
								</div>		
							</div>							
							<div class="row post-content">
								<div class="col-xs-12">
									<p itemprop="description" class="textbox-height">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
											This is a members only post, for early access to this post login or signup today!
										@else
											{!! str_limit(strip_tags($top10->description), $limit = 250, $end = '...') !!}
										@endif    													                                                        
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/login" style="margin-top: 15px!important;"><i class="fa fa-sign-in"></i> Login/Signup</a>													
										@else
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/top10s/{{ $top10->slug }}" style="margin-bottom: 15px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>													
										@endif  										
									</p>
								</div>
							</div>
						</div>
					@endforeach
					<p class="text-center" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/top10s" class="btn btn-sm btn-fresh"><span class="fa fa-arrow-circle-right"></span> View More Top 10 Lists</a>
					</p>
				</div>
			</div>
		@endunless	
		@unless($blogs->isEmpty())
			<div class="row">
				<div class="col-xs-12">    
					<h4>Latest Board Game Blogs</h4>					
					@foreach($blogs as $blog)
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
												@if($blog->hasGames())
													<img src="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;opacity: 0.5;" width="100%" />
												@else
													<img src="https://img.ozboardgamer.com/{{ $blog->image }}" alt="{{ $blog->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />													
												@endif												
											</div>
										</div>	
									@else
										<a href="/blogs/{{ $blog->slug }}" title="{{ $blog->name }}">
											@if($blog->hasGames())
												<img src="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $blog->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
											@else
												<img src="https://img.ozboardgamer.com/{{ $blog->image }}" alt="{{ $blog->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />													
											@endif													
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
									<p itemprop="description" class="textbox-height">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($blog->published_at)))
											This is a members only post, for early access to this post login or signup today!
										@else
											{!! str_limit(strip_tags($blog->description), $limit = 250, $end = '...') !!}
										@endif    													                                                    
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
					<p class="text-center" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/blogs" class="btn btn-sm btn-fresh"><span class="fa fa-arrow-circle-right"></span> View More Board Game Blogs</a>
					</p>
				</div>
			</div>
		@endunless	
		@unless($products->isEmpty())
			<div class="row hidden-xs">
				<div class="col-xs-12">
					<h4>Featured Products</h4>
					<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
								@foreach($products as $product)
									<li>										
										<div class="thumbnail img-shadow" style="position: relative;">
											<div style="position: absolute;right: 4px;bottom: 135px;">
												<p class="blogHeading text-right"><strong><a href="/shop/{{ $product->slug }}" class="post-title" itemprop="name" title="{{ $product->name }}" style="color:white;">{!! str_limit($product->name, 16) !!}</a></strong></p>
												@if($product->sale > 0)
													<p class="blogHeadingSml text-right"><strong style="color:white;">Save ${!! number_format($product->price - $product->sale, 2, '.', '') !!}</strong></p>	
												@else
													<p class="blogHeadingSml text-right"><strong style="color:white;">{{ $product->brand }}</strong></p>	
												@endif						
											</div>
											<a href="/shop/{!! $product->slug !!}" rel="nofollow">
												<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
											</a>
											<div class="caption text-center" style="min-height: 125px;">
												@if($product->sale > 0)
													<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->saleDisplay !!}</strong></p>
													<p style="margin: 0;"><s><small>${!! $product->priceDisplay !!}</small></s></p>
												@else
													<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->priceDisplay !!}</strong></p>
													<p style="margin: 0;">&nbsp;</p>
												@endif
												<p class="text-center">
													<a class="btn btn-hot text-uppercase" href="/shop/{!! $product->slug !!}" rel="nofollow"><span class="fa fa-arrow-circle-right"></span> Read more</a>
												</p>
											</div>													
										</div>										
									</li>
								@endforeach
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
					<div class="row hidden-xs" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;margin-bottom: 15px;">
						<div class="col-xs-12 text-center">
							<p><strong>New Deals In:</strong></p>
							<br />
							<div class="clock" style="margin: 0 auto;width:625px;"></div>
						</div>
					</div>
					<p class="text-center" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/shop" class="btn btn-sm btn-fresh"><span class="fa fa-arrow-circle-right"></span> View More Products</a>
					</p>
				</div>
			</div>
        @endunless				
    </div>

    </div>
    <!-- /.banner -->
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.jcarousel').jcarousel({
                // Configuration goes here
            });
        });
    </script>
	<script src="/js/flipclock.min.js"></script>
	<script type="text/javascript">		
		$(document).ready(function() {
			var clock = $('.clock').FlipClock({{ strtotime('Next Thursday') - time() }}, {
				clockFace: 'DailyCounter',
				countdown: true
			});
		});
	</script>	
@endsection
