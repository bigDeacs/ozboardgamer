@extends('app')

@section('meta')
    <title>Themes</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Themes</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($themes as $theme)
						<div class="col-sm-3 col-xs-12">
					    	<a href="/themes/{{ $theme->slug }}">
				    			<img src="{{ $theme->games()->first()->image }}" class="img-responsive" />
				    		</a>
					    	<p><a href="/themes/{{ $theme->slug }}">{!! $theme->name !!}</a></p>
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