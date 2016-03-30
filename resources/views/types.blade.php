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
					    	<a href="/games/{{ $type->slug }}">
				    			<img src="{{ $type->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/games/{{ $type->slug }}">{!! $type->name !!}</a></p>
						</div>
					@endforeach
				</div>
				<hr />
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection