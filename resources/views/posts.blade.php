@extends('app')

@section('meta')
    <title>{{ $category->name }} | Oz Board Gamer</title>
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
			      	@foreach($posts as $post)
						<div class="row" itemscope itemtype="http://schema.org/Review">
                            <div class="col-sm-12 post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="blogHeading">
                                            <strong>
                                                <a href="/{{ $category->slug }}/{{ $post->slug }}" class="post-title" itemprop="name">
                                                    {!! $post->name !!}
                                                </a>
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 post-header-line">
                                        <span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $post->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
                                        </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span> | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/reviews/{{ $post->slug }}#disqus_thread"></a>
                                        @unless($post->games->isEmpty())
                                             | <span class="fa fa-trophy"></span>
                                            <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
                                                @foreach($post->games as $key => $game)
                                                    <a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>{{ ($key == (count($post->games) -1)) ? '' : ',' }}
                                                @endforeach
                                            </span>
                                        @endunless
                                    </div>
                                </div>
                                <div class="row post-content">
                                    <div class="col-xs-12">
                                        <p itemprop="description">
                                            {!! str_limit(strip_tags($post->description), $limit = 250, $end = '...') !!}
                                        </p>
                                        <p>
                                            <a class="btn btn-danger pull-right" href="/{{ $category->slug }}/{{ $post->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
					@endforeach
			      </div>
			      <div class="col-sm-3 col-xs-12">
			      	<span>Sort by: </span>
			      	<form id="sortForm">
			      		<input type="hidden" name="page" value="{{ isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1 }}">
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
	                <hr class="hidden-xs" />   
					<div class="fb-page" data-href="https://www.facebook.com/ozboardgamer" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ozboardgamer" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ozboardgamer">Oz Board Gamer</a></blockquote></div>	                
	                <hr class="hidden-xs" />    
					<!-- Home Page Tower Ad Right -->
	                <ins class="adsbygoogle hidden-xs"
	                     style="display:block"
	                     data-ad-client="ca-pub-5206537313688631"
	                     data-ad-slot="2828464904"
	                     data-ad-format="auto"></ins>
	                <script>
	                (adsbygoogle = window.adsbygoogle || []).push({});
	                </script>    
			      </div>
			    </div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							@if(isset($_GET['sort']))
								{!! $posts->appends(['sort' => $_GET['sort']])->render() !!}
							@else
								{!! $posts->render() !!}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $category->scripts !!}
@endsection
