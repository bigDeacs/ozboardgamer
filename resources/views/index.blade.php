@extends('app')

@section('content')
<!-- Header -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($featured as $key => $post)
                <div class="item {{ ($key == 0) ? 'active' : "" }}">
                    <div class="fill" style="background-image:url('{{ $post->image }}');"></div>
                    <div class="carousel-caption">
                        <h2>{{ $post->name }}</h2>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Reviews</h3>
                        @foreach($reviews as $review)
                            <a href="/reviews/{{ $review->slug }}">{!! $review->name !!}</a><br />
                            <hr />
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <h3>News</h3>
                        @foreach($news as $entry)
                            <a href="/news/{{ $entry->slug }}">{!! $entry->name !!}</a><br />
                            <hr />
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <h3>How To's</h3>
                        @foreach($howtos as $howto)
                            <a href="/howtos/{{ $howto->slug }}">{!! $howto->name !!}</a><br />
                            <hr />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <h3>Games</h3>
                @foreach($games as $game)
                    <a href="/games/{{ $game->types()->first()->slug }}/{!! $game->slug !!}">{!! $game->name !!}</a><br />
                    <hr />
                @endforeach
            </div>
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