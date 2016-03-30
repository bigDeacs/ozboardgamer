@extends('app')

@section('meta')
    <title>Board Game Designers</title>
    <meta name="description" content="The people that build up the worlds we dive into.">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Designers</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Designers</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($designers as $designer)
						<div class="col-sm-3 col-xs-12">
					    	<a href="/designers/{{ $designer->slug }}">
				    			<img src="{{ $designer->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/designers/{{ $designer->slug }}">{!! $designer->name !!}</a></p>
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