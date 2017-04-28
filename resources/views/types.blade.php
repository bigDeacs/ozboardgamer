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
							<div class="thumbnail">
								<a href="/games/{{ $type->slug }}?page=1&sort=name-asc">
									<img alt="{!! $type->name !!}" src="https://img.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb1x }} 1x, https://img.ozboardgamer.com{{ $type->games()->orderBy(DB::raw('RAND()'))->first()->thumb2x }} 2x" class="img-responsive img-shadow" />
								</a>
								<div class="caption text-center">
									<a href="/games/{{ $type->slug }}" title="{!! $type->name !!}">											
										<p class="text-center" style="font-size: 13px;"><strong>{!! $type->name !!}</strong></p>
									</a>
								</div>
							</div>
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
					<!-- Horizon Ad -->
					<div class="text-center">
						<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508.gif" /></a>
					</div>
            </div>
        </div>
	</div>
@endsection

@section('scripts')
@endsection
