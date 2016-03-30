@extends('app')

@section('meta')
    <title>Themes</title>
    <meta name="description" content="Espionage, Renaissance, Fantasy or Sci-Fi. Themes take a game from monotonous to magical!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Themes</span></li>
			</ol>
		</div>
	</div>
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
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $themes->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection