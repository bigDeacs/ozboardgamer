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
							<div class="thumbnail img-shadow" style="position: relative;">
								<div style="position: absolute;right: 4px;bottom: 15px;">
									<p class="blogHeading text-right"><strong><a href="/families/{{ $family->slug }}" class="post-title" itemprop="name" title="{{ $family->name }}" style="color:white;">{!! str_limit($family->name, 14) !!}</a></strong></p>
								</div>
								<a href="/families/{{ $family->slug }}">
									<img src="https://img.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $family->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive img-shadow" />
								</a>
							</div>
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
