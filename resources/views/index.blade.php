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
    <!-- Header Carousel -->
    <header>
        <!-- Wrapper for slides -->
        <div class="fade">
            <div">
                <a href="/shop?page=1&sort=savings-desc">
                    <img href="https://assets.ozboardgamer.com/img/buy-online.jpg');" class="img-responsive" />
                </a>
            </div>
            @if($featured->isEmpty())
                <div>
                    <img href="https://assets.ozboardgamer.com/img/cover.jpg');" class="img-responsive" />
                </div>
            @else
                @foreach($featured as $key => $post)
                    <div>
                        <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
                            <img href="https://assets.ozboardgamer.com/{{ $post->image }}');" class="img-responsive" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">
        @unless($games->isEmpty())
        <div class="row hidden-xs">
            <div class="col-xs-12">
                <h1 style="margin-top: 10px;">Top Rated Games</h1>
                <div class="jcarousel-wrapper">
                    <div class="responsive">
                        @foreach($games as $game)
                            <li itemscope itemtype="http://schema.org/Game">
                                <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
                                    <img src="https://assets.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://assets.ozboardgamer.com{{ $game->thumb1x }} 1x, https://assets.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive" itemprop="image" style="margin: auto; padding: 0 5px!important;" />
                                </a>
                                <p class="text-center"><strong><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{!! $game->name !!}</a></strong></p>
                            </li>
                        @endforeach
                    </div>
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
                @unless($blogs->isEmpty())
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
                        <div class="responsive">                        
                            @foreach($stores as $store)
                                <div>
                                    <a href="/stores/{{ $store->slug }}" title="{{ $store->name }}">
                                        <img src="https://assets.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://assets.ozboardgamer.com{{ $store->thumb1x }} 1x, https://assets.ozboardgamer.com{{ $store->thumb2x }} 2x" alt="{{ $store->name }}" class="img-responsive" width="300" height="auto" style="margin: auto; padding: 0 5px!important;" />
                                    </a>
                                    <p class="text-center"><strong><a href="/stores/{{ $store->slug }}">{!! $store->name !!}</a></strong></p>
                                </div>
                            @endforeach
                        </div>
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
        $('.fade').slick({
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
        });        
        $('.responsive').slick({
          infinite: true,
          speed: 500,
          slidesToShow: 5,
          slidesToScroll: 5,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    </script>
@endsection
