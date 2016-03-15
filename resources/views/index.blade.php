@extends('app')

@section('content')
<!-- Header -->
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        @unless($featured->isEmpty())
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($featured as $key => $post)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" {{ ($key == 0) ? 'class="active"' : "" }}></li>
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
                            <h2>{{ $post->name }}</h2>
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
                    reviews
                @endunless
                @unless($news->isEmpty())
                    news
                @endunless
                @unless($howtos->isEmpty())
                    howtos
                @endunless
            </div>
            @unless($games->isEmpty())
                games
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