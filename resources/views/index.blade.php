@extends('app')

@section('meta')
    <title>Oz Board Gamer - Board Game News, Reviews, Top 10s and More</title>
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
		</ol>
	  @endunless
	  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">			
			@unless($featured->isEmpty())
                @foreach($featured as $key => $post)
					<div class="item slides {{ ($key == 0) ? 'active' : '' }}">
					  <!-- Overlay -->
					  <div class="overlay"></div>
					  <div class="slide-{{ ($key+2) }}" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');"></div>
					  <div class="hero">        
						<hgroup>
							@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
								<p class="bigText"><i class="fa fa-lock" aria-hidden="true"></i> {{ $post->category()->first()->name }} <i class="fa fa-lock" aria-hidden="true"></i></p>     
								<p class="smallText">{{ $post->name }}</p>
							@else
								<p class="bigText">{{ $post->category()->first()->name }}</p>        
								<p class="smallText">{{ $post->name }}</p>
							@endif         							
						</hgroup>       
						@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))			
							<p class="smallText">Login/Signup for early access</p>						
						@else
							<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-hero btn-lg">Find Out More</a>
						@endif 						
					  </div>
					</div>
                @endforeach
            @endunless
			<div class="item slides {{ ($featured->isEmpty()) ? 'active' : '' }}">
			  <!-- Overlay -->
			  <div class="overlay"></div>
			  <div class="slide-1" style="background-image:url('https://img.ozboardgamer.com/img/buy-online.jpg');"></div>
			  <div class="hero">
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
        <div class="row hidden-xs">
            <div class="col-xs-12">
                <h1 style="margin-top: 10px;">Top Rated Board Games</h1>
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
												<p class="text-center" style="font-size: 13px;"><strong>{!! str_limit($game->name, 12) !!}</strong></p>
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
        <div class="row">
            <div class="col-xs-12">
                <!-- Home Page Horizon Ad -->
				<div class="text-center">
					<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508.gif" /></a>
				</div>
            </div>
        </div>
        @endunless
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">                               
                @unless($reviews->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Latest Game Reviews</h2>
                            @foreach($reviews as $review)
                                <div class="row post" itemscope itemtype="http://schema.org/Review" style="margin-bottom: 15px;">
									@if($review->games->isEmpty())
										<div class="col-sm-12">
									@else
										<div class="col-sm-4 col-md-3 col-xs-12" style="padding: 15px;">
											<div style="overflow: hidden;height: 175px;">
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
													<div class="offer offer-radius offer-danger">
														<div class="shape">
															<div class="shape-text">
																<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
															</div>
														</div>
														<div class="offer-content">
															<img src="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $review->games()->first()->thumb2x }} 2x" alt="{{ $review->games()->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />																						
														</div>													
													</div>	
												@else
													<a href="/reviews/{{ $review->slug }}" title="{{ $review->games()->first()->name }}">
														<img src="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $review->games()->first()->thumb2x }} 2x" alt="{{ $review->games()->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
													</a>																										
												@endif
											</div>
											<div id="socialShare" class="row hidden-xs" width="100%" style="margin-top: 10px;">
												<a data-toggle="dropdown" class="col-xs-10 col-xs-offset-1 btn btn-info">
													 <i class="fa fa-share-alt fa-inverse"></i> Share <span class="caret"></span>
												</a>													
												<ul class="dropdown-menu" style="padding: 5px 10px;top: 90%;">
													<li>
														<a data-original-title="Facebook" rel="tooltip" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://ozboardgamer.com/reviews/{{ $review->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-facebook" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-facebook"></i> Share on Facebook
														</a>
													</li>
													<li>
														<a data-original-title="Twitter" rel="tooltip" onclick="window.open('http://twitter.com/home?status=https://ozboardgamer.com/reviews/{{ $review->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-twitter" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-twitter"></i> Share on Twitter
														</a>
													</li>
													<li>
														<a data-original-title="Google+" rel="tooltip" onclick="window.open('https://plus.google.com/share?url=https://ozboardgamer.com/reviews/{{ $review->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-google" data-placement="left" style="width:100%;margin: 5px auto;">
															<i class="fa fa-google-plus"></i> Share on Google+
														</a>
													</li>														
												</ul>
											</div>
										</div>
										<div class="col-sm-8 col-md-9 col-xs-12">
									@endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="blogHeading">
                                                    <strong>														
														@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
															<a href="#" class="post-title disabled" itemprop="name" title="Login for access">
																{!! $review->name !!}
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
												@unless($review->games->isEmpty())
													<span class="hidden-xs">
														 | <span class="fa fa-trophy"></span>
														<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
															@foreach($review->games as $key => $game)
																<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>{{ ($key == (count($review->games) -1)) ? '' : ',' }}
															@endforeach
														</span>
													</span>
                                                @endunless
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-xs-12">
                                                <p itemprop="description">
                                                    {!! str_limit(strip_tags($review->description), $limit = 250, $end = '...') !!}
                                                </p>
                                                <p>												
													@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($review->published_at)))
														<a class="btn btn-danger pull-right disabled" href="#" title="Login for access">Read more <span class="fa fa-arrow-circle-right"></span></a>
													@else
														<a class="btn btn-danger pull-right" href="/reviews/{{ $review->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>													
													@endif    													
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr />
                        </div>
                    </div>
                @endunless
                @unless($top10s->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Latest Top 10's</h2>
                            @foreach($top10s as $top10)
                                <div class="row post" style="margin-bottom: 15px;">
									@if($top10->games->isEmpty())
										<div class="col-sm-12">
									@else										
										<div class="col-sm-4 col-md-3 col-xs-12" style="padding: 15px;">
											<div style="overflow: hidden;height: 175px;">
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))
													<div class="offer offer-radius offer-danger">
														<div class="shape">
															<div class="shape-text">
																<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
															</div>
														</div>
														<div class="offer-content">
															<img src="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
														</div>
													</div>	
												@else
													<a href="/top10s/{{ $top10->slug }}" title="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}">
														<img src="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
													</a>	
												@endif											
											</div>
											<div id="socialShare" class="row hidden-xs" width="100%" style="margin-top: 10px;">
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
														<a data-original-title="Twitter" rel="tooltip" onclick="window.open('http://twitter.com/home?status=https://ozboardgamer.com/top10s/{{ $top10->slug }}', '', ' scrollbars=yes,menubar=no,width=500,height=500, resizable=yes,toolbar=no,location=no,status=no')" class="btn btn-twitter" data-placement="left" style="width:100%;margin: 5px auto;">
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
										</div>
										<div class="col-sm-8 col-md-9 col-xs-12">
									@endif
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
                                                @unless($top10->games->isEmpty())
													<span class="hidden-xs">
														 | <span class="fa fa-trophy"></span>
														@foreach($top10->games as $key => $game)
															<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a>{{ ($key == (count($top10->games) -1)) ? '' : ',' }}
														@endforeach
													</span>
                                                @endunless
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-xs-12">
                                                <p>
                                                    {!! str_limit(strip_tags($top10->description), $limit = 250, $end = '...') !!}
                                                </p>
                                                <p>
													@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($top10->published_at)))												
														<a class="btn btn-danger pull-right disabled" href="#" title="Login for access">Read more <span class="fa fa-arrow-circle-right"></span></a>
													@else
														<a class="btn btn-danger pull-right" href="/top10s/{{ $top10->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
													@endif                                                     
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr />
                        </div>
                    </div>
                @endunless                
            </div>
            <div class="col-md-3 col-sm-4 hidden-xs">       
				@if($product)
					<h3>Featured Product</h3>
					<div class="text-center">		
						@if(Session::has('name'))		
							<a href="{!! $product->slug !!}" target="_blank" title="{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}">
								<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive img-shadow" alt="{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}" width="100%" />
							</a>							
						@else							
							<div class="offer offer-radius offer-danger">
								<div class="shape">
									<div class="shape-text">
										<a href="#" class="disabled" title="Login for access" style="color: #ffffff;"><i class="fa fa-lock" aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="offer-content">
									<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive img-shadow" alt="{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}" width="100%" />
								</div>
							</div>								
						@endif
						<p class="text-center">
							@if(Session::has('name'))		
								<strong><a href="{!! $product->slug !!}" target="_blank">{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}</a></strong><br />
							@else
								<strong><a href="#" class="disabled" title="Login for access">{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}</a></strong><br />
							@endif
							@if($product->sale > 0)
								<strong>${!! $product->saleDisplay !!}</strong><br />
								<s><small>${!! $product->priceDisplay !!}</small></s>
							@else
								<strong>${!! $product->priceDisplay !!}</strong>
							@endif
						</p>
						<p class="text-center">
							@if(Session::has('name'))		
								<a class="btn btn-danger" href="{!! $product->slug !!}" target="_blank">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
							@else
								<a class="btn btn-danger disabled" href="#" title="Login for access">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
							@endif							
						</p>
					</div>
					<hr class="hidden-xs" />
                @endif
				@unless($howtos->isEmpty())
                  <h3>Latest How To's</h3>
                  @foreach($howtos as $entry)
                      <div class="row">
                          <div class="col-sm-12 post">
                              <div class="row">
                                  <div class="col-sm-12">                                      
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($entry->published_at)))
											<p class="blogHeadingSml"><strong><a href="#" title="Login for access" class="post-title disabled"><i class="fa fa-lock" aria-hidden="true"></i> {!! $entry->name !!}</a></strong></p>
										@else
											<p class="blogHeadingSml"><strong><a href="/howtos/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
										@endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  <hr />
                @endunless
				<div class="fb-page" data-href="https://www.facebook.com/ozboardgamer" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ozboardgamer" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ozboardgamer">Oz Board Gamer</a></blockquote></div>			
                <hr class="hidden-xs" />              
                @unless($news->isEmpty())
                    <h3>Latest Game News</h3>
                    @foreach($news as $entry)
                        <div class="row">
                            <div class="col-sm-12 post">
                                <div class="row">
                                    <div class="col-sm-12">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($entry->published_at)))
											<p class="blogHeadingSml"><strong><a href="#" title="Login for access" class="post-title disabled"><i class="fa fa-lock" aria-hidden="true"></i> {!! $entry->name !!}</a></strong></p>
										@else
											<p class="blogHeadingSml"><strong><a href="/news/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
										@endif                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr />
                @endunless  
                <!-- Home Page Tower Ad Right -->
				<div class="text-center">
					<a href="https://t.cfjump.com/33917/b/26455" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy Games online from Oz Game Shop" src="https://img.ozboardgamer.com/img/95587c56-eb65-4254-aa84-7d7c09ff2dee.gif" /></a>
				</div>
				<hr />
				@unless($blogs->isEmpty())
                    <h3>Latest Blog Articles</h3>
                    @foreach($blogs as $entry)
                        <div class="row">
                            <div class="col-sm-12 post">
                                <div class="row">
                                    <div class="col-sm-12">
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($entry->published_at)))
											<p class="blogHeadingSml"><strong><a href="#" title="Login for access" class="post-title disabled"><i class="fa fa-lock" aria-hidden="true"></i> {!! $entry->name !!}</a></strong></p>
										@else
											<p class="blogHeadingSml"><strong><a href="/blogs/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
										@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr />
                @endunless  				
            </div>
        </div>
        @unless($stores->isEmpty())
			@if(Session::has('name'))		
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
														<p class="text-center" style="font-size: 13px;"><strong>{!! str_limit($store->name, 12) !!}</strong></p>
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
			@endif
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
