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
			  <div class="slide-{{ ($featured->isEmpty()) ? '2' : '6' }}" style="background-image:url('https://ozboardgamer.com/img/buy-online.jpg');"></div>
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
					  <div class="slide-{{ ($key+2) }}" style="background-image:url('https://ozboardgamer.com/{{ $post->image }}');"></div>
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
				<h2>Helping gamers find their next favourite game!<h2>
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
												<img src="https://ozboardgamer.com{{ $game->thumb1x }}" srcset="https://ozboardgamer.com{{ $game->thumb1x }} 1x, https://ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" />
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
				<div class="col-12">
					<h4>Latest Board Game Reviews</h4>
					<p>Take a look at our collection reviews of new and old games!</p>
					<div class="row no-gutters">
						<?php $count = count($reviews); ?>
						@foreach($reviews as $key => $review)
							<meta itemprop="name" content = "{{ $review->games()->first()->name }}">
							@if ($key == 0)
								<div class="col-12 col-lg-6 p-0">
							@elseif ($key == 1)
								<div class="col-12 col-lg-6 px-4">
									<div class="row no-gutters">
							@endif
								@unless($key == 0)
									<div class="col-6 p-0">
								@endunless
										<div class="card border-0 rounded-0 text-white overflow zoom" itemscope itemtype="http://schema.org/Game">
											<!--thumbnail-->
											<div class="position-relative">
												<!--thumbnail img-->
												<div class="ratio_right-cover-2 image-wrapper">
													<a href="/reviews/{{ $review->slug }}" title="{{ $review->name }}">
														@if ($key == 0)
															<img src="https://ozboardgamer.com{{ $review->games()->first()->image }}"
																 alt="{{ $review->games()->first()->name }}"
																 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
														@else
															<img src="https://ozboardgamer.com{{ $review->games()->first()->image }}"
																 srcset="https://ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://ozboardgamer.com{{ $review->games()->first()->thumb2x }} 1.5x, https://ozboardgamer.com{{ $review->games()->first()->image }} 2x"
																 alt="{{ $review->games()->first()->name }}"
																 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
														@endif
													</a>
												</div>

												<!--title-->
												<div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
													<!-- category -->
													<a class="p-2 badge badge-success rounded-0" href="/reviews">Review</a>

													<!--title and description-->
													<a href="/reviews/{{ $review->slug }}">
														<h2 class="h5 text-white my-1">
                                                            <span itemprop="name">{{ $review->name }}</span>
                                                        </h2>
													</a>
												</div>
												<!--end title-->
											</div>
											<!--end thumbnail-->
										</div>
								@unless($key == 0)
									</div>
								@endunless
							@if ($key == 0)
								</div>
							@elseif ($key == $count-1)
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<p class="text-center my-4" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/reviews" class="btn btn-outline-success"><span class="fa fa-arrow-circle-right"></span> View More Board Game Reviews</a>
					</p>
				</div>
			</div>
		@endunless			
		@unless($top10s->isEmpty())
			<div class="row">
				<div class="col-12">
					<h4>Latest Board Game Top 10's</h4>
					<p>Everyone loves a good top 10, check out our favourite lists!</p>
					<div class="row no-gutters">
                        <?php $count = count($top10s); ?>
						@foreach($top10s as $key => $top10)
							<meta itemprop="name" content = "{{ $top10->games()->first()->name }}">
							@if ($key == 0)
								<div class="col-12 col-lg-6 p-0">
									@elseif ($key == 1)
										<div class="col-12 col-lg-6 px-4">
											<div class="row no-gutters">
												@endif
												@unless($key == 0)
													<div class="col-6 p-0">
														@endunless
														<div class="card border-0 rounded-0 text-white overflow zoom" itemscope itemtype="http://schema.org/Game">
															<!--thumbnail-->
															<div class="position-relative">
																<!--thumbnail img-->
																<div class="ratio_right-cover-2 image-wrapper">
																	<a href="/top10s/{{ $top10->slug }}" title="{{ $top10->name }}">
																		@if ($key == 0)
																			<img src="https://ozboardgamer.com{{ $top10->games()->first()->image }}"
																				 alt="{{ $top10->games()->first()->name }}"
																				 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																		@else
																			<img src="https://ozboardgamer.com{{ $top10->games()->first()->image }}"
																				 srcset="https://ozboardgamer.com{{ $top10->games()->first()->thumb1x }} 1x, https://ozboardgamer.com{{ $top10->games()->first()->thumb2x }} 1.5x, https://ozboardgamer.com{{ $top10->games()->first()->image }} 2x"
																				 alt="{{ $top10->games()->first()->name }}"
																				 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																		@endif
																	</a>
																</div>

																<!--title-->
																<div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
																	<!-- category -->
																	<a class="p-2 badge badge-success rounded-0" href="/top10s">Top 10</a>

																	<!--title and description-->
																	<a href="/top10s/{{ $top10->slug }}">
																		<h2 class="h5 text-white my-1">
																			<span itemprop="name">{{ $top10->name }}</span>
																		</h2>
																	</a>
																</div>
																<!--end title-->
															</div>
															<!--end thumbnail-->
														</div>
														@unless($key == 0)
													</div>
												@endunless
												@if ($key == 0)
											</div>
											@elseif ($key == $count-1)
										</div>
								</div>
							@endif
						@endforeach
					</div>
					<p class="text-center my-4" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/top10s" class="btn btn-outline-success"><span class="fa fa-arrow-circle-right"></span> View More Top 10 Lists</a>
					</p>
				</div>
			</div>
		@endunless	
		@unless($blogs->isEmpty())
			<div class="row">
				<div class="col-12">
					<h4>Latest Board Game Blogs &amp; News</h4>
					<p>We are always adding the latest news &amp; blogs from accross the web.</p>
					<div class="row no-gutters">
                        <?php $count = count($top10s); ?>
						@foreach($blogs as $key => $blog)
							<meta itemprop="name" content = "{{ $blog->games()->first()->name }}">
							@if ($key == 0)
								<div class="col-12 col-lg-6 p-0">
									@elseif ($key == 1)
										<div class="col-12 col-lg-6 px-4">
											<div class="row no-gutters">
												@endif
												@unless($key == 0)
													<div class="col-6 p-0">
														@endunless
														<div class="card border-0 rounded-0 text-white overflow zoom" itemscope itemtype="http://schema.org/Game">
															<!--thumbnail-->
															<div class="position-relative">
																<!--thumbnail img-->
																<div class="ratio_right-cover-2 image-wrapper">
																	<a href="/blogs/{{ $blog->slug }}" title="{{ $blog->name }}">
																		@if ($key == 0)
																			@if($blog->hasGames())
																				<img src="https://ozboardgamer.com{{ $blog->games()->first()->image }}"
																					 alt="{{ $blog->games()->first()->name }}"
																					 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																			@else
																				<img src="https://ozboardgamer.com{{ $blog->image }}"
																					 alt="{{ $blog->name }}"
																					 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																			@endif
																		@else
																			@if($blog->hasGames())
																				<img src="https://ozboardgamer.com{{ $blog->games()->first()->image }}"
																					 srcset="https://ozboardgamer.com{{ $blog->games()->first()->thumb1x }} 1x, https://ozboardgamer.com{{ $blog->games()->first()->thumb2x }} 1.5x, https://ozboardgamer.com{{ $blog->games()->first()->image }} 2x"
																					 alt="{{ $blog->games()->first()->name }}"
																					 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																			@else
																				<img src="https://ozboardgamer.com{{ $blog->image }}"
																					 alt="{{ $blog->name }}"
																					 class="img-fluid" itemprop="image" style="margin: auto;" width="100%" />
																			@endif
																		@endif
																	</a>
																</div>

																<!--title-->
																<div class="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">
																	<!-- category -->
																	<a class="p-2 badge badge-success rounded-0" href="/blogs">Blog</a>

																	<!--title and description-->
																	<a href="/blogs/{{ $blog->slug }}">
																		<h2 class="h5 text-white my-1">
																			<span itemprop="name">{{ $blog->name }}</span>
																		</h2>
																	</a>
																</div>
																<!--end title-->
															</div>
															<!--end thumbnail-->
														</div>
														@unless($key == 0)
													</div>
												@endunless
												@if ($key == 0)
											</div>
											@elseif ($key == $count-1)
										</div>
								</div>
							@endif
						@endforeach
					</div>
					<p class="text-center my-4" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;">
						<a href="/blogs" class="btn btn-outline-success"><span class="fa fa-arrow-circle-right"></span> View More Board Game Blogs</a>
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
												<p class="blogHeading text-right"><strong><a href="{{ $product->link }}" target="_blank" class="post-title" itemprop="name" title="{{ $product->name }}" style="color:white;">{!! str_limit($product->name, 16) !!}</a></strong></p>
												{{--@if($product->sale > 0)--}}
													{{--<p class="blogHeadingSml text-right"><strong style="color:white;">Save ${!! number_format($product->price - $product->sale, 2, '.', '') !!}</strong></p>	--}}
												{{--@else--}}
													{{--<p class="blogHeadingSml text-right"><strong style="color:white;">{{ $product->brand }}</strong></p>	--}}
												{{--@endif						--}}
											</div>
											<a href="{!! $product->link !!}" target="_blank" rel="nofollow">
												<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
											</a>
											<div class="caption text-center">
												{{--@if($product->sale > 0)--}}
													{{--<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->saleDisplay !!}</strong></p>--}}
													{{--<p style="margin: 0;"><s><small>${!! $product->priceDisplay !!}</small></s></p>--}}
												{{--@else--}}
													{{--<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->priceDisplay !!}</strong></p>--}}
													{{--<p style="margin: 0;">&nbsp;</p>--}}
												{{--@endif--}}
												<p class="text-center">
													<a class="btn btn-hot text-uppercase" href="{!! $product->link !!}" target="_blank" rel="nofollow"><span class="fa fa-arrow-circle-right"></span> Buy Now</a>
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
					{{--<div class="row hidden-xs" style="border-bottom: 1px solid #DDD;padding-bottom: 15px;margin-bottom: 15px;">--}}
						{{--<div class="col-xs-12 text-center">--}}
							{{--<p><strong>New Deals In:</strong></p>--}}
							{{--<br />--}}
							{{--<div class="clock" style="margin: 0 auto;width:625px;"></div>--}}
						{{--</div>--}}
					{{--</div>--}}
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
	{{--<script src="/js/flipclock.min.js"></script>--}}
	{{--<script type="text/javascript">		--}}
		{{--$(document).ready(function() {--}}
			{{--var clock = $('.clock').FlipClock({{ strtotime('Next Thursday') - time() }}, {--}}
				{{--clockFace: 'DailyCounter',--}}
				{{--countdown: true--}}
			{{--});--}}
		{{--});--}}
	{{--</script>	--}}
@endsection
