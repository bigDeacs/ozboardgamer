@extends('app')

@section('meta')
    <title>Board Game Mechanics | Oz Board Gamer</title>
    <meta name="description" content="Dice Rolling, Bluffing, Deduction. There are so many different mechanics that make games great!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Mechanics</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Mechanics</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($mechanics as $mechanic)
						<div class="col-sm-3 col-xs-12 text-center">
					    	<a href="/mechanics/{{ $mechanic->slug }}">
				    			<img alt="{!! $mechanic->name !!}" src="https://img.ozboardgamer.com{{ $mechanic->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $mechanic->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $mechanic->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/mechanics/{{ $mechanic->slug }}">{!! $mechanic->name !!}</a></strong></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $mechanics->render() !!}
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-xs-12">
		                <!-- Horizon Ad -->
						<div class="text-center">
							<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508.gif" /></a>
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
