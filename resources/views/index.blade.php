@extends('app')

@section('meta')
    <title>Helping you find your next favourite game - Oz Board Gamer</title>
    <meta name="description" content="Want to find new board games? We have news, reviews and can even help you find out where to buy (both online and in store!).">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Helping you find your next favourite game - Oz Board Gamer">
    <meta property="og:description" content="Want to find new board games? We have news, reviews and can even help you find out where to buy (both online and in store!).">
    <meta property="og:url" content="https://ozboardgamer.com">
    <meta property="og:image" content="https://ozboardgamer.com/img/logo.png">
@endsection

@section('head')
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endsection

@section('content')
<!-- Header -->
	<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
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
			  <div class="slide-1" style="background-image:url('https://assets.ozboardgamer.com/img/buy-online.jpg');"></div>
			  <div class="hero">
				<hgroup>
					<h1>Buy Games</h1>        
					<h3>Choose from thousands of Games and Accessories</h3>
				</hgroup>
				<a href="/shop?page=1&sort=savings-desc" class="btn btn-hero btn-lg">Start Shopping</a>
			  </div>
			</div>
            @unless($featured->isEmpty())
                @foreach($featured as $key => $post)
					<div class="item slides">
					  <!-- Overlay -->
					  <div class="overlay"></div>
					  <div class="slide-{{ ($key+2) }}" style="background-image:url('https://assets.ozboardgamer.com/{{ $post->image }}');"></div>
					  <div class="hero">        
						<hgroup>
							<h1>{{ $post->category()->first()->name }}</h1>        
							<h3>{{ $post->name }}</h3>
						</hgroup>       
						<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-hero btn-lg">Find Out More</a>
					  </div>
					</div>
                @endforeach
            @endunless
	  </div> 
	</div>


    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide" style="display:none;">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <a href="/shop?page=1&sort=savings-desc">
                    <div class="fill" style="background-image:url('https://assets.ozboardgamer.com/img/buy-online.jpg');"></div>
                </a>
            </div>
            @if($featured->isEmpty())
                <div class="item">
                    <div class="fill" style="background-image:url('https://assets.ozboardgamer.com/img/cover.jpg');"></div>
                </div>
            @else
                @foreach($featured as $key => $post)
                    <div class="item">
                        <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
                            <div class="fill" style="background-image:url('https://assets.ozboardgamer.com/{{ $post->image }}');"></div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        @unless($featured->isEmpty())
            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                 <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        @endunless
    </header>

    <!-- Page Content -->
    <div class="container">
        @unless($games->isEmpty())
        <div class="row hidden-xs">
            <div class="col-xs-12">
                <h1 style="margin-top: 10px;">Top Rated Games</h1>
                <div class="jcarousel-wrapper">
                    <div class="jcarousel">
                        <ul>
                            @foreach($games as $game)
                                <li itemscope itemtype="http://schema.org/Game">
                                    <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
                                        <img src="https://assets.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://assets.ozboardgamer.com{{ $game->thumb1x }} 1x, https://assets.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" style="margin: auto;" />
                                    </a>
                                    <p class="text-center"><strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{!! $game->name !!}</a></strong></p>
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
                <ins class="adsbygoogle hidden-xs"
                     style="display:block"
                     data-ad-client="ca-pub-5206537313688631"
                     data-ad-slot="9138550904"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
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
                                <div class="row" itemscope itemtype="http://schema.org/Review">
                                    <div class="col-sm-12 post">
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
                                                <span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $review->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
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
                                <div class="row">
                                    <div class="col-sm-12 post">
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
                                                <span class="glyphicon glyphicon-user"></span> {!! $top10->user->name !!} | <span class="glyphicon glyphicon-calendar">
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
            <div class="col-md-3 col-sm-4 col-xs-12">       
                <div class="fb-page hidden-xs" data-href="https://www.facebook.com/ozboardgamer/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ozboardgamer/"><a href="https://www.facebook.com/ozboardgamer/">Oz Board Gamer</a></blockquote></div></div>
                <hr class="hidden-xs" />              
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
                <!-- Home Page Tower Ad Right -->
                <ins class="adsbygoogle hidden-xs"
                     style="display:block"
                     data-ad-client="ca-pub-5206537313688631"
                     data-ad-slot="2828464904"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
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
                                            <img src="https://assets.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://assets.ozboardgamer.com{{ $store->thumb1x }} 1x, https://assets.ozboardgamer.com{{ $store->thumb2x }} 2x" alt="{{ $store->name }}" class="img-responsive" width="300" height="auto" style="margin: auto;" />
                                        </a>
                                        <p class="text-center"><strong><a href="/stores/{{ $store->slug }}">{!! $store->name !!}</a></strong></p>
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
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
        $(function() {
            $('.jcarousel').jcarousel({
                // Configuration goes here
            });
        });
    </script>
@endsection
