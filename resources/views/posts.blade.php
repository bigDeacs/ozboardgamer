@extends('app')

@section('meta')
    <title>{{ $category->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>View</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div style="clear:both;"></div>
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>{{ $category->name }}</h1>
			      </div>
			    </div>
			    @foreach($posts as $post)
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	<a href="/{{ $category->slug }}/{{ $post->slug }}">{!! $post->name !!}</a>
						</div>
					</div>
					<hr />
				@endforeach
			  </div>
			</div>
		</div>
	</div>
@endsection