@extends('app')

@section('meta')
    <title>Mechanics</title>
@endsection

@section('head')
@endsection

@section('content')
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
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection