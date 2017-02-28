@extends('app')

@section('meta')
    <title>Board Game Families | Oz Board Gamer</title>
    <meta name="description" content="Many games are designed with a universe in mind, sometimes this universe is shared!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Families</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Families</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($families as $family)
						<div class="col-sm-3 col-xs-12 text-center">
					    	<a href="/families/{{ $family->slug }}">
				    			<img src="https://assets-2.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://assets-2.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://assets-2.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/families/{{ $family->slug }}">{!! $family->name !!}</a></strong></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $families->render() !!}
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
		</div>
	</div>
@endsection

@section('scripts')
@endsection
