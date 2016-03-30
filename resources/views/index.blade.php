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
                        <div class="fill" style="background-image:url('{{ $post->image }}');"></div>
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
        <div class="row">
            @if($games->isEmpty())
                <div class="col-xs-12">
            @else
                <div class="col-sm-9 col-xs-12">
            @endif
                
                @unless($reviews->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Latest Game Reviews</h3>
                            @foreach($reviews as $review)
                                <div class="row">
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <a href="/reviews/{{ $review->slug }}">
                                            <img src="{{ $review->image }}" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <a href="/reviews/{{ $review->slug }}">
                                            <h4>{!! $review->name !!}</h4>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                        <a href="/reviews/{{ $review->slug }}" class="btn btn-dark">
                                            Find Out More
                                        </a>
                                    </div>
                                </div>
                                <hr />
                            @endforeach
                        </div>
                    </div>
                @endunless
                @unless($news->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Latest News</h3>
                            @foreach($news as $entry)
                                <div class="row">
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <a href="/news/{{ $entry->slug }}">
                                            <img src="{{ $entry->image }}" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <a href="/news/{{ $entry->slug }}">
                                            <h4>{!! $entry->name !!}</h4>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 text-center">
                                        <a href="/news/{{ $entry->slug }}" class="btn btn-dark">
                                            Find Out More
                                        </a>
                                    </div>
                                </div>
                                <hr />
                            @endforeach
                        </div>
                    </div>
                @endunless
                @unless($howtos->isEmpty())
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Latest How To's</h3>
                            @foreach($howtos as $howto)
                                <div class="row">
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <a href="/howtos/{{ $howto->slug }}">
                                            <img src="{{ $howto->image }}" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <a href="/howtos/{{ $howto->slug }}">
                                            <h4>{!! $howto->name !!}</h4>
                                        </a>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 text-center">
                                        <a href="/howtos/{{ $howto->slug }}" class="btn btn-dark">
                                            Find Out More
                                        </a>
                                    </div>
                                </div>
                                <hr />
                            @endforeach
                        </div>
                    </div>
                @endunless
            </div>
            @unless($games->isEmpty())
                <div class="col-sm-3 col-xs-12 text-center lead">
                    <h3>Top Rated Games</h3>
                    @foreach($games as $game)
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
                                    <img src="{{ $game->image }}" class="img-responsive" />
                                </a>
                                <p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{{ $game->name }}</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endunless
        </div>
    </div>

    <!--<div class="banner">

        <div class="container">

            <div class="row">
                
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>-->

    </div>
    <!-- /.banner -->
@endsection

@section('scripts')
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>
@endsection