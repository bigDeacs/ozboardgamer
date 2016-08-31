@extends('app')

@section('meta')
    <title>Oz Board Gamer | Find the latest Board Game News, Reviews and More</title>
    <meta name="description" content="Want to know all the latest and greatest about Board Games? We have News, Reviews and much more!">
@endsection

@section('head')
@endsection

@section('content')
<!-- Header -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @if($featured->isEmpty())
                <div class="item active">
                    <div class="fill" style="background-image:url('{{ secure_url('/', $parameters = ['img']) }}/cover.jpg');"></div>
                </div>
            @else
                @foreach($featured as $key => $post)
                    <div class="item {{ ($key == 0) ? 'active' : "" }}">
                        <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
                            <div class="fill" style="background-image:url('{{ secure_url('/') }}{{ $post->image }}');"></div>
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
        <div class="row">
            <div class="col-xs-12">
                <h1>Top Rated Games</h1>
                <div class="jcarousel-wrapper">
                    <div class="jcarousel">
                        <ul>
                            @foreach($games as $game)
                                <li itemscope itemtype="http://schema.org/Game">
                                    <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
                                        <img src="{{ secure_url('/') }}{{ $game->thumb }}" alt="{{ $game->name }}" class="img-responsive" width="300" height="auto" itemprop="image" style="margin: auto;" />
                                    </a>
                                    <h5 class="text-center"><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a></h5>
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
        <div class="row">
            <div class="col-md-8 col-sm-7 col-xs-12">
              <div class="row hidden-xs">
                  <div class="col-sm-6 col-xs-12" style="padding: 15px;">
                    <a href="/games">
                      <img src="{{ secure_url('/', $parameters = ['img']) }}/find-new-games.jpg" class="img-responsive" height="200" width="auto" style="width:100%;" />
                    </a>
                  </div>
                  <div class="col-sm-6 col-xs-12" style="padding: 15px;">
                    <a href="/reviews">
                        <img src="{{ secure_url('/', $parameters = ['img']) }}/read-our-articles.jpg" class="img-responsive" height="200" width="auto" style="width:100%;" />
                    </a>
                  </div>
                  <div class="col-sm-6 col-xs-12" style="padding: 15px;">
                    <a href="/quizzes">
                        <img src="{{ secure_url('/', $parameters = ['img']) }}/board-game-quiz.jpg" class="img-responsive" height="200" width="auto" style="width:100%;" />
                    </a>
                  </div>
                  <div class="col-sm-6 col-xs-12" style="padding: 15px;">
                    <a href="/stores">
                        <img src="{{ secure_url('/', $parameters = ['img']) }}/find-game-stores.jpg" class="img-responsive" height="200" width="auto" style="width:100%;" />
                    </a>
                  </div>
                </div>
                @unless($reviews->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Latest Game Reviews</h2>
                            @foreach($reviews as $review)
                                <div class="row" itemscope itemtype="http://schema.org/Review">
                                    <div class="col-sm-12 post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>
                                                    <strong>
                                                        <a href="/reviews/{{ $review->slug }}" class="post-title" itemprop="name">
                                                            {!! $review->name !!}
                                                        </a>
                                                    </strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 post-header-line">
                                                <span class="glyphicon glyphicon-user"></span> <a href="/users/{{ $post->user->slug }}?page=1&sort=published_at-desc" itemprop="author">{!! $review->user->name !!}</a> | <span class="glyphicon glyphicon-calendar">
                                                </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($review->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><span class="fb-comments-count" data-href="{{ secure_url('/') }}/reviews/{{ $review->slug }}"></span>
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
                                            <div class="col-sm-3 text-center">
                                                <a href="/reviews/{{ $review->slug }}">
                                                    <img src="{{ secure_url('/') }}{{ $review->thumb }}" alt="{!! $review->name !!}" class="img-responsive" width="263" height="auto" itemprop="image" />
                                                </a>
                                            </div>
                                            <div class="col-sm-9">
                                                <p itemprop="description">
                                                    {!! str_limit(strip_tags($review->description), $limit = 100, $end = '...') !!}
                                                </p>
                                                <p>
                                                    <a class="btn btn-dark" href="/reviews/{{ $review->slug }}">Read more</a>
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
                                                <h4>
                                                    <strong>
                                                        <a href="/top10s/{{ $top10->slug }}" class="post-title">
                                                            {!! $top10->name !!}
                                                        </a>
                                                    </strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 post-header-line">
                                                <span class="glyphicon glyphicon-user"></span> {!! $top10->user->name !!} | <span class="glyphicon glyphicon-calendar">
                                                </span>{!! date('F d, Y', strtotime($top10->published_at)) !!} | <span class="glyphicon glyphicon-comment"></span><span class="fb-comments-count" data-href="{{ secure_url('/') }}/top10s/{{ $top10->slug }}"></span>
                                                @unless($top10->games->isEmpty())
                                                     | <span class="fa fa-trophy"></span>
                                                    @foreach($top10->games as $key => $game)
                                                        <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a>{{ ($key == (count($top10->games) -1)) ? '' : ',' }}
                                                    @endforeach
                                                @endunless
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-sm-3 text-center">
                                                <a href="/top10s/{{ $top10->slug }}">
                                                    <img src="{{ secure_url('/') }}{{ $top10->thumb }}" alt="{!! $top10->name !!}" class="img-responsive" width="263" height="auto" />
                                                </a>
                                            </div>
                                            <div class="col-sm-9">
                                                <p>
                                                    {!! str_limit(strip_tags($top10->description), $limit = 100, $end = '...') !!}
                                                </p>
                                                <p>
                                                    <a class="btn btn-dark" href="/top10s/{{ $top10->slug }}">Read more</a>
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
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
                @unless($news->isEmpty())
                    <h3>Latest News</h3>
                    @foreach($news as $entry)
                        <div class="row">
                            <div class="col-sm-12 post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>
                                            <strong><a href="/news/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr />
                @endunless
                @unless($howtos->isEmpty())
                  <h3>Latest How To's</h3>
                  @foreach($howtos as $entry)
                      <div class="row">
                          <div class="col-sm-12 post">
                              <div class="row">
                                  <div class="col-sm-12">
                                      <h5>
                                          <strong><a href="/howtos/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></h5>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  <hr />
                @endunless
                @unless($blogs->isEmpty())
                    <h3>Latest Blogs</h3>
                    @foreach($blogs as $entry)
                        <div class="row">
                            <div class="col-sm-12 post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>
                                            <strong><a href="/blogs/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr />
                @endunless
                <div class="fb-page hidden-xs" data-href="https://www.facebook.com/ozboardgamer/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ozboardgamer/"><a href="https://www.facebook.com/ozboardgamer/">Oz Board Gamer</a></blockquote></div></div>
                <hr class="hidden-xs" />
                <div id="instafeed" class="row hidden-xs"></div>
                <hr class="hidden-xs" />
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
            <div class="row">
                <div class="col-xs-12">
                    <h3>Top Rated Stores</h3>
                    <div class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul>
                                @foreach($stores as $store)
                                    <li>
                                        <a href="/stores/{{ $store->slug }}">
                                            <img src="{{ secure_url('/') }}{{ $store->thumb }}" alt="{{ $store->name }}" class="img-responsive" width="300" height="auto" style="margin: auto;" />
                                        </a>
                                        <h5 class="text-center"><a href="/stores/{{ $store->slug }}">{{ $store->name }}</a></h5>
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
        <div class="row">
            <div class="col-xs-12">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Footer Ad -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5206537313688631"
                     data-ad-slot="2769589305"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>

    </div>
    <!-- /.banner -->
@endsection

@section('scripts')
    <script type="text/javascript">
        var userFeed  = new Instafeed({
            get: 'user',
            userId: '3016144355',
            accessToken: '3016144355.b43e804.5755f9c7f8f44ad79b68515f74b9c6da',
            template: '<a href="@{{link}}" target="_blank" class="col-md-4 col-sm-6" style="padding:0;"><img src="@{{image}}" class="img-responsive" style="width:100%;" /></a>',
            limit: 9
        });
        userFeed.run();
    </script>
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
    <script id="dsq-count-scr" src="//ozboardgamer.disqus.com/count.js" async></script>
@endsection
