@extends('app')

@section('meta')
    <title>Contributors | Oz Board Gamer</title>
    <meta name="description" content="Card games, Board games, Party Games, Dice Games, there are so many different categories.">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Contributors</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Contributors</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($users as $user)
						<div class="col-sm-3 col-xs-12 text-center">
					    	<a href="/users/{{ $user->slug }}">
				    			<img src="https://img.ozboardgamer.com/{{ $user->thumb }}" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/users/{{ $user->slug }}">{!! $user->name !!}</a></strong></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $users->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-xs-12">
		                <!-- Horizon Ad -->
						<div class="text-center">
							<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508" /></a>
						</div>
            </div>
        </div>
	</div>
@endsection

@section('scripts')
@endsection
