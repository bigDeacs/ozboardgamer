@extends('app')

@section('meta')
    <title>Families</title>
@endsection

@section('head')
@endsection

@section('content')
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