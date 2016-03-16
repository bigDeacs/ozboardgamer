@extends('app')

@section('meta')
    <title>Publishers</title>
@endsection

@section('head')
@endsection

@section('content')
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
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection