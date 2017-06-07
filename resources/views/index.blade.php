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
			@if($featured->isEmpty())
				<li data-target="#bs-carousel" data-slide-to="1" class="active"></li>
			@else
				<li data-target="#bs-carousel" data-slide-to="5" class="active"></li>
			@endif
		</ol>
	  @endunless
	  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">		
			<div class="item slides active">
			  <!-- Overlay -->
			  <div class="overlay"></div>
			  <div class="slide-1" style="background-image:url('https://img.ozboardgamer.com/img/welcome.jpg');"></div>
			  <div class="hero" width="100%;">
				<hgroup>
					<h1 class="bigText">Oz Board Gamer</h1>        
					<p class="smallText">Helping you find your next favourite game!</p>
				</hgroup>
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
			<div class="item slides">
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
	  </div> 
	</div>		
    <!-- Page Content -->
    <div class="container">
        @unless($games->isEmpty())
			<div class="row hidden-xs" style="border-bottom: 1px solid #DDD;">
				<div class="col-xs-12">
					<h2 style="margin-top: 10px;">Top Rated Board Games</h2>
					<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
								@foreach($games as $game)
									<li itemscope itemtype="http://schema.org/Game">
										<div class="thumbnail img-shadow">
											<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
												<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" />
											</a>
											<div class="caption text-center">
												<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">											
													<p class="text-center" style="font-size: 15px;"><strong>{!! str_limit($game->name, 14) !!}</strong></p>
												</a>
											</div>
										</div>
									</li>								
								@endforeach
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
				</div>
			</div>        
        @endunless
		@unless($reviews->isEmpty())
			<div class="row">
				<div class="col-xs-12">    
					<h3>Latest Board Game Reviews</h3>
					@foreach($reviews as $review)
						<div class="col-xs-12 col-sm-4 post" itemscope itemtype="http://schema.org/Review" style="margin-bottom: 15px;">
							<div>
								<div style="overflow: hidden;height: 175px;">
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
								<div class="col-sm-12">
									<p class="blogHeading">
										<strong>														
											@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
												<a href="#" class="post-title disabled" itemprop="name" title="Login for access">
													<i class="fa fa-lock" aria-hidden="true"></i> Members only post <i class="fa fa-lock" aria-hidden="true"></i>
												</a>
											@else
												<a href="/reviews/{{ $review->slug }}" class="post-title" itemprop="name">
													{!! $review->name !!}
												</a>
											@endif
										</strong>
									</p>			
								</div>
							</div>							
							<div class="row">
								<div class="col-sm-12 post-header-line">
									<meta itemprop="author" content ="{!! $review->user->name !!}">
									<span class="glyphicon glyphicon-calendar">
									</span><span itemprop="datePublished">{!! date('F d, Y', strtotime($review->published_at)) !!}</span>
									@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
									@else
										 | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/reviews/{{ $review->slug }}#disqus_thread"></a>
									@endif                                                											
								</div>
							</div>
							<div class="row post-content">
								<div class="col-xs-12">
									<p itemprop="description" class="textbox-height">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
											Login to gain early access to this post!
										@else
											{!! str_limit(strip_tags($review->description), $limit = 250, $end = '...') !!}
										@endif    													                                                    
									</p>
									<p>												
										@unless(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/reviews/{{ $review->slug }}" style="margin-bottom: 15px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>													
										@endunless   													
									</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endunless	
		@unless($stores->isEmpty())
			<div class="row hidden-xs">
				<div class="col-xs-12">
					<h3>Top Rated Stores</h3>
					<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
								@foreach($stores as $store)
									<li>
										<div class="thumbnail img-shadow">
											<a href="/stores/{{ $store->slug }}" title="{{ $store->name }}">
												<img src="https://img.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $store->thumb1x }} 1x, https://img.ozboardgamer.com{{ $store->thumb2x }} 2x" alt="{{ $store->name }}" class="img-responsive" width="300" height="auto" />
											</a>
											<div class="caption text-center">
												<a href="/stores/{{ $store->slug }}" title="{{ $store->name }}">											
													<p class="text-center" style="font-size: 15px;"><strong>{!! str_limit($store->name, 12) !!}</strong></p>
												</a>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
				</div>
			</div>
        @endunless
		@unless($top10s->isEmpty())
			<div class="row">
				<div class="col-xs-12">    
					<h3>Latest Board Game Top 10's</h3>
					@foreach($top10s as $top10)
						<div class="col-xs-12 col-sm-4 post" style="margin-bottom: 15px;">				
							<div>
								<div style="overflow: hidden;height: 175px;">
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
								<div class="col-sm-12">
									<p class="blogHeading">
										<strong>
											@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
												<a href="#" class="post-title disabled" itemprop="name" title="Login for access">
													{!! $top10->name !!}
												</a>
											@else
												 <a href="/top10s/{{ $top10->slug }}" class="post-title">
													{!! $top10->name !!}
												</a>
											@endif
										</strong>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 post-header-line">						
									<span class="glyphicon glyphicon-calendar">
									</span>{!! date('F d, Y', strtotime($top10->published_at)) !!}
									@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
									@else
										 | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/top10s/{{ $top10->slug }}#disqus_thread"></a>
									@endif   																									
								</div>		
							</div>							
							<div class="row post-content">
								<div class="col-xs-12">
									<p itemprop="description" class="textbox-height">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
											Login to gain early access to this post!
										@else
											{!! str_limit(strip_tags($top10->description), $limit = 250, $end = '...') !!}
										@endif    													                                                    
									</p>                                                
									<p>
										@unless(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))																										
											<a class="btn btn-hot text-uppercase pull-right btn-block" href="/top10s/{{ $top10->slug }}" style="margin-bottom: 15px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>
										@endunless                                                     
									</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endunless		
		@unless($products->isEmpty())
			<div class="row hidden-xs">
				<div class="col-xs-12">
					<h3>Featured Products</h3>
					<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
								@foreach($products as $product)
									<li>
										<div class="thumbnail img-shadow">
											<a href="/shop/{{ $product->slug }}" title="{{ $product->name }}">
												<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" alt="{{ $product->name }}" class="img-responsive" width="300" height="auto" />
											</a>
											<div class="caption text-center">
												<a href="/shop/{{ $product->slug }}" title="{{ $product->name }}">											
													<p class="text-center" style="font-size: 15px;"><strong>{!! str_limit($product->name, 12) !!}</strong></p>
												</a>
												<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->priceDisplay !!}</strong></p>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
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
@endsection
