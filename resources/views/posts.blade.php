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
						<div class="row post">
							@if($post->games->isEmpty())
								<div class="col-sm-12">
							@else
								<?php 
									$game = $post->games()->orderBy(DB::raw('RAND()'))->first(); 
								?>
								<div class="col-sm-3 col-xs-12" style="padding: 15px;overflow: hidden;height: 175px;">
									@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
										<a href="" class="disabled" title="Login for access">
											<div class="offer offer-radius offer-danger">
												<div class="shape">
													<div class="shape-text">
														<i class="fa fa-lock" aria-hidden="true"></i>
													</div>
												</div>
												<div class="offer-content">
													<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;opacity: 0.5;" width="100%" />
												</div>
											</div>	
										</a>
									@else										
										<a href="/{{ $category->slug }}/{{ $post->slug }}" title="{{ $game->name }}">
											<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" width="100%" />
										</a>														
									@endif	
								</div>
								<div class="col-sm-9 col-xs-12">
							@endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="blogHeading">
                                            <strong>
												@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
													<a href="#" class="post-title disabled" itemprop="name" title="Login for access">
														<i class="fa fa-lock" aria-hidden="true"></i> Members only post <i class="fa fa-lock" aria-hidden="true"></i>
													</a>
												@else
													<a href="/{{ $category->slug }}/{{ $post->slug }}" class="post-title" itemprop="name">
														{!! $post->name !!}
													</a>
												@endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 post-header-line">
										<meta itemprop="author" content="{!! $post->user->name !!}">
                                        <span class="glyphicon glyphicon-calendar">
                                        </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span>
										@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
										@else
											 | <span class="glyphicon glyphicon-comment"></span><a href="{{ secure_url('/') }}/{{ $category->slug }}/{{ $post->slug }}#disqus_thread"></a>
											@unless($post->games->isEmpty())
												<span class="hidden-xs">
													 | <span class="fa fa-trophy"></span>
													<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
														@foreach($post->games as $key => $game)
															<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" itemprop="name">{{ $game->name }}</a>{{ ($key == (count($post->games) -1)) ? '' : ',' }}
														@endforeach
													</span>
												</span>
											@endunless
										@endif 											                                        
                                    </div>
                                </div>
                                <div class="row post-content">
                                    <div class="col-xs-12">
										<p itemprop="description">
											@if(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
												Login to gain early access to this post!
											@else
												{!! str_limit(strip_tags($post->description), $limit = 250, $end = '...') !!}
											@endif    													                                                    
										</p>
										<p>												
											@unless(Session::has('name') == false && date('F d, Y', strtotime("now")) == date('F d, Y', strtotime($post->published_at)))
												<a class="btn btn-danger pull-right" href="/{{ $category->slug }}/{{ $post->slug }}">Read more <span class="fa fa-arrow-circle-right"></span></a>
											@endunless   													
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
					<br />
					<div class="fb-page" data-href="https://www.facebook.com/ozboardgamer/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ozboardgamer/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ozboardgamer/">Oz Board Gamer</a></blockquote></div>
	                <br />
					<!-- Posts Page Tower Ad Right -->
	                <div class="text-center">
						<a href="https://t.cfjump.com/33917/b/26455" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy Board Games online from Oz Game Shop" src="https://img.ozboardgamer.com/img/tower-ad.jpg" /></a>						
					</div>
			      </div>
			    </div>
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
