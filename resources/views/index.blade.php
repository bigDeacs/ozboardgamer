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
							<p class="bigText">{{ $post->category()->first()->name }}</p>        
							<p class="smallText">{{ $post->name }}</p>
						</hgroup>       
						<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-hero btn-lg">Find Out More</a>
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
                                    <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
                                        <img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" style="margin: auto;" />
                                    </a>
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
										<div class="col-sm-3 col-xs-12" style="padding: 15px;overflow: hidden;height: 175px;">
											<a href="/reviews/{{ $review->slug }}" title="{{ $review->games()->first()->name }}">
												<img src="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $review->games()->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $review->games()->first()->thumb2x }} 2x" alt="{{ $review->games()->first()->name }}" class="img-responsive" itemprop="image" style="margin: auto;" />
											</a>
										</div>
										<div class="col-sm-9 col-xs-12">
									@endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="blogHeading">
                                                    <strong>
                                                        <a href="/reviews/{{ $review->slug }}" class="post-title" itemprop="name">
                                                            {!! $review->name !!}
                                                        </a>
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">											
                                            <div class="col-sm-12 post-header-line">
												<meta itemprop="author" content ="{!! $review->user->name !!}">
                                                <span class="glyphicon glyphicon-calendar">
                                                </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($review->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/reviews/{{ $review->slug }}#disqus_thread"></a>
                                                @unless($review->games->isEmpty())
                                                     | <span class="fa fa-trophy"></span>
                                                    <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
                                                        @foreach($review->games as $key => $game)
                                                            <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>{{ ($key == (count($review->games) -1)) ? '' : ',' }}
                                                        @endforeach
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
                                                    <a class="btn btn-danger pull-right" href="/reviews/{{ $review->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
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
										<div class="col-sm-3 col-xs-12" style="padding: 15px;overflow: hidden;height: 175px;">
											<a href="/top10s/{{ $top10->slug }}" title="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}">
												<img src="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" alt="{{ $top10->games()->orderBy(DB::raw('RAND()'))->first()->name }}" class="img-responsive" itemprop="image" style="margin: auto;" />
											</a>
										</div>
										<div class="col-sm-9 col-xs-12">
									@endif
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="blogHeading">
                                                    <strong>
                                                        <a href="/top10s/{{ $top10->slug }}" class="post-title">
                                                            {!! $top10->name !!}
                                                        </a>
                                                    </strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 post-header-line">
												<span class="glyphicon glyphicon-calendar">
                                                </span>{!! date('F d, Y', strtotime($top10->published_at)) !!} | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/top10s/{{ $top10->slug }}#disqus_thread"></a>
                                                @unless($top10->games->isEmpty())
                                                     | <span class="fa fa-trophy"></span>
                                                    @foreach($top10->games as $key => $game)
                                                        <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a>{{ ($key == (count($top10->games) -1)) ? '' : ',' }}
                                                    @endforeach
                                                @endunless
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-xs-12">
                                                <p>
                                                    {!! str_limit(strip_tags($top10->description), $limit = 250, $end = '...') !!}
                                                </p>
                                                <p>
                                                    <a class="btn btn-danger pull-right" href="/top10s/{{ $top10->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
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
						<a href="{!! $product->slug !!}" target="_blank" title="{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}">
							<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" alt="{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}" />
						</a>
						<p class="text-center">
							<strong><a href="{!! $product->slug !!}" target="_blank">{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}</a></strong><br />
							@if($product->sale > 0)
								<strong>${!! $product->saleDisplay !!}</strong><br />
								<s><small>${!! $product->priceDisplay !!}</small></s>
							@else
								<strong>${!! $product->priceDisplay !!}</strong>
							@endif
						</p>
						<p class="text-center">
							<a class="btn btn-danger" href="{!! $product->slug !!}" target="_blank">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
                                      <p class="blogHeadingSml">
                                          <strong><a href="/howtos/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
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
                                        <p class="blogHeadingSml">
                                            <strong><a href="/news/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
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
                                        <p class="blogHeadingSml">
                                            <strong><a href="/blogs/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></p>
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
            <div class="row hidden-xs">
                <div class="col-xs-12">
                    <h3>Top Rated Stores</h3>
                    <div class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul>
                                @foreach($stores as $store)
                                    <li>
                                        <a href="/stores/{{ $store->slug }}" title="{{ $store->name }}">
                                            <img src="https://img.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $store->thumb1x }} 1x, https://img.ozboardgamer.com{{ $store->thumb2x }} 2x" alt="{{ $store->name }}" class="img-responsive" width="300" height="auto" style="margin: auto;" />
                                        </a>
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
