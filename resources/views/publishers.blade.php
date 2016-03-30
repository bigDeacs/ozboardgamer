@extends('app')

@section('meta')
    <title>Publishers</title>
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
			      <div class="col-xs-12">
			      	<h1>Publishers</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($publishers as $publisher)
						<div class="col-sm-3 col-xs-12">
					    	<a href="/publishers/{{ $publisher->slug }}">
				    			<img src="{{ $publisher->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/publishers/{{ $publisher->slug }}">{!! $publisher->name !!}</a></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $publishers->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection