@extends('app')

@section('meta')
    <title>Types | Oz Board Gamer</title>
    <meta name="description" content="Card games, Board games, Party Games, Dice Games, there are so many different categories.">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Games</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Games</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($types as $type)
						<div class="col-sm-3 col-xs-12 text-center">
					    	<a href="/games/{{ $type->slug }}?page=1&sort=name-asc">
				    			<img src="https://assets.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://assets.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://assets.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/games/{{ $type->slug }}">{!! $type->name !!}</a></strong></p>
					    	<p class="text-center">
			                    <a class="btn btn-danger" href="/games/{{ $type->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
			                </p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $types->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
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
@endsection

@section('scripts')
@endsection
