@extends('app')

@section('meta')
    <title>Types</title>
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
						<div class="col-sm-3 col-xs-12">
					    	<a href="/games/{{ $type->slug }}?page=1&sort=name-asc">
				    			<img src="{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb }}" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/games/{{ $type->slug }}?page=1&sort=name-asc">{!! $type->name !!}</a></strong></p>
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