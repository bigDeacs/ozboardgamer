@extends('app')

@section('meta')
    <title>Publishers | Oz Board Gamer</title>
    <meta name="description" content="Designers may think of the game, but its the Publishers that bring it to life.">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Publishers</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-12">
			      	<h1>Publishers</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($publishers as $publisher)
						<div class="col-md-3 col-sm-4 col-12 text-center">
							<div class="thumbnail img-shadow" style="position: relative;">
								<div style="position: absolute;right: 4px;bottom: 15px;">
									<p class="blogHeading text-right"><strong><a href="/publishers/{{ $publisher->slug }}" class="post-title" itemprop="name" title="{{ $publisher->name }}" style="color:white;">{!! str_limit($publisher->name, 14) !!}</a></strong></p>
								</div>
								<a href="/publishers/{{ $publisher->slug }}">
									<img alt="{!! $publisher->name !!}" src="https://img.ozboardgamer.com{{ $publisher->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $publisher->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $publisher->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive img-shadow" />
								</a>
							</div>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-12">
						<div class="text-center">
							{!! $publishers->render() !!}
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-12">
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
