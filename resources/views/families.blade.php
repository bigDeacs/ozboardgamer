@extends('app')

@section('meta')
    <title>Board Game Families</title>
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
						<div class="col-sm-3 col-xs-12">
					    	<a href="/families/{{ $family->slug }}">
				    			<img src="{{ $family->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/families/{{ $family->slug }}">{!! $family->name !!}</a></p>
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