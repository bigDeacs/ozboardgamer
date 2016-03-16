@extends('app')

@section('meta')
    <title>{{ $category->name }}</title>
	{!! $category->meta !!}
@endsection

@section('head')
	{!! $category->head !!}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>{{ $category->name }}</h1>
			      </div>
			    </div>

				@foreach($posts as $post)
					<div class="row">
						<div class="col-sm-2 col-xs-12">
							<a href="/{{ $category->slug }}/{{ $post->slug }}">
					    		<img src="{{ $post->image }}" class="img-responsive" />
					    	</a>
					    </div>
						<div class="col-sm-8 col-xs-12">
					    	<a href="/{{ $category->slug }}/{{ $post->slug }}">
					    		{!! $post->name !!}
					    	</a>
					    	<p>{!! str_limit(strip_tags($post->description), $limit = 100, $end = '...') !!}</p>
						</div>
						<div class="col-sm-2 col-xs-12 text-center">
					    	<a href="/{{ $category->slug }}/{{ $post->slug }}" class="btn btn-warning">
					    		Find Out More
					    	</a>
						</div>
					</div>
					<hr />
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $category->scripts !!}
@endsection