@extends('app')

@section('meta')
    <title>{{ $category->name }}</title>
	{!! $category->meta !!}
@endsection

@section('head')
	{!! $category->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>{{ $category->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">	
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-9 col-xs-12">
			      	<h1>{{ $category->name }}</h1>
			      </div>
			      <div class="col-sm-3 col-xs-12">
			      	<span>Sort by: </span>
			      	<form id="sortForm">
			      		<select class="form-control" onchange="sortPosts()" name="sort" id="sort">
					  		<option value="published_at-desc" {{ (Request::input('sort') == 'published_at-desc') ? 'selected' : "" }}>Publish Date DESC</option>
							<option value="published_at-asc" {{ (Request::input('sort') == 'published_at-asc') ? 'selected' : "" }}>Publish Date ASC</option>					  		
					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
						</select>
					</form>
					<script>
						function sortPosts() {
					        document.getElementById("sortForm").submit();
					    }
					</script>
			      </div>
			    </div>

				@foreach($posts as $post)
					<div class="row" itemscope itemtype="http://schema.org/Review">
		                <div class="col-sm-12 post">
		                    <div class="row">
		                        <div class="col-sm-12">
		                            <h4>
		                                <strong><a href="/{{ $category->slug }}/{{ $post->slug }}" class="post-title" itemprop="name">{!! $post->name !!}</a></strong></h4>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-sm-12 post-header-line">
		                            <span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $post->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
		                            </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><a href="/{{ $category->slug }}/{{ $post->slug }}#disqus_thread"></a>
		                        </div>
		                    </div>
		                    <div class="row post-content">
		                        <div class="col-sm-3 text-center">
		                            <a href="/{{ $category->slug }}/{{ $post->slug }}">
		                                <img src="{{ $post->thumb }}" alt="{!! $post->name !!}" class="img-responsive" width="263" height="auto" itemprop="image" />
		                            </a>
		                        </div>
		                        <div class="col-sm-9">
		                            <p itemprop="description">
		                                {!! str_limit(strip_tags($post->description), $limit = 100, $end = '...') !!}
		                            </p>
		                            <p>
		                                <a class="btn btn-dark" href="/{{ $category->slug }}/{{ $post->slug }}">Read more</a>
		                            </p>
		                        </div>
		                    </div>
		                </div>
		            </div>
				@endforeach
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $posts->render() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $category->scripts !!}
	<script id="dsq-count-scr" src="//ozboardgamer.disqus.com/count.js" async></script>
@endsection