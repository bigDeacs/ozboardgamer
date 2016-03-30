@extends('app')

@section('meta')
    <title>Board Game Mechanics</title>
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
						<div class="col-sm-3 col-xs-12">
					    	<a href="/mechanics/{{ $mechanic->slug }}">
				    			<img src="{{ $mechanic->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/mechanics/{{ $mechanic->slug }}">{!! $mechanic->name !!}</a></p>
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
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection