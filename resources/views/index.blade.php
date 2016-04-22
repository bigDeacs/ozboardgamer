@extends('app')

@section('meta')
    <title>Find the latest News, Reviews and More with Oz Board Gamer</title>
    <meta name="description" content="Want to know all the latest and greatest about Board Games? We have News, Reviews and much more!">
@endsection

@section('head')
@endsection

@section('content')
<!-- Header -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide hidden-xs">
        @unless($featured->isEmpty())
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($featured as $key => $post)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : "" }}"></li>
                @endforeach
            </ol>
        @endunless

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @if($featured->isEmpty())
                <div class="item active">
                    <div class="fill" style="background-image:url('/img/cover.jpg');"></div>
                </div>
            @else
                @foreach($featured as $key => $post)
                    <div class="item {{ ($key == 0) ? 'active' : "" }}">
                        <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}">
                            <div class="fill" style="background-image:url('{{ $post->image }}');"></div>
                        </a>
                        <div class="carousel-caption">
                            <a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-dark">
                                Find Out More
                            </a>
                        </div>
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
            <h3>Top Rated Games</h3>
            <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                        @foreach($games as $game)
                            <li itemscope itemtype="http://schema.org/Game">
                                <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
                                    <img src="{{ $game->thumb }}" class="img-responsive" width="300" height="auto" itemprop="image" />
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
        @endunless
        <div class="row">        
            <div class="col-sm-9 col-xs-12"> 
                @unless($reviews->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Latest Game Reviews</h3>
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
                                                <span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $review->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
                                                </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($review->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><a href="/reviews/{{ $review->slug }}#disqus_thread"></a>
                                                @unless($review->games->isEmpty())
                                                     | <span class="fa fa-trophy"></span>
                                                    <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
                                                        @foreach($review->games as $key => $game)
                                                            @if($key == (count($review->games) -1))
                                                                <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>
                                                            @else
                                                                <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>, 
                                                            @endif
                                                        @endforeach
                                                    </span> 
                                                @endunless
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-sm-3 text-center">
                                                <a href="/reviews/{{ $review->slug }}">
                                                    <img src="{{ $review->thumb }}" alt="{!! $review->name !!}" class="img-responsive" width="263" height="auto" itemprop="image" />
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
                @unless($news->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Latest News</h3>
                            @foreach($news as $entry)
                                <div class="row">
                                    <div class="col-sm-12 post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>
                                                    <strong><a href="/news/{{ $entry->slug }}" class="post-title">{!! $entry->name !!}</a></strong></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 post-header-line">
                                                <span class="glyphicon glyphicon-user"></span> {!! $entry->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
                                                </span>{!! date('F d, Y', strtotime($entry->published_at)) !!} | <span class="glyphicon glyphicon-comment"></span><a href="/news/{{ $entry->slug }}#disqus_thread"></a>
                                            </div>
                                        </div>
                                        <div class="row post-content">
                                            <div class="col-sm-3 text-center">
                                                <a href="/news/{{ $entry->slug }}">
                                                    <img src="{{ $entry->thumb }}" alt="{!! $entry->name !!}" class="img-responsive" width="263" height="auto" />
                                                </a>
                                            </div>
                                            <div class="col-sm-9">
                                                <p>
                                                    {!! str_limit(strip_tags($entry->description), $limit = 100, $end = '...') !!}
                                                </p>
                                                <p>
                                                    <a class="btn btn-dark" href="/news/{{ $entry->slug }}">Read more</a>
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
            <div class="col-sm-3 col-xs-12">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Advertisement 1 -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-5206537313688631"
                     data-ad-slot="2828464904"
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