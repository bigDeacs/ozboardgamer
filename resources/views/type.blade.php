@extends('app')

@section('meta')
    <title>{{ $type->name }} | Types | Oz Board Gamer</title>
    {!! $type->meta !!}
@endsection

@section('head')
	{!! $type->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>{{ $type->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-9 col-12">
			      	<h1>{{ $type->name }}</h1>
			      </div>
			      <div class="col-sm-3 col-12">
			      	<span>Sort by: </span>
			      	<form id="sortForm">
			      		<input type="hidden" name="page" value="{{ isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1 }}">
			      		<select class="form-control" onchange="sortGames()" name="sort" id="sort">
					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
						  	<option value="rating-asc" {{ (Request::input('sort') == 'rating-asc') ? 'selected' : "" }}>Rating ASC</option>
						  	<option value="rating-desc" {{ (Request::input('sort') == 'rating-desc') ? 'selected' : "" }}>Rating DESC</option>
							<option value="published-asc" {{ (Request::input('sort') == 'published-asc') ? 'selected' : "" }}>Publish Date ASC</option>
							<option value="published-desc" {{ (Request::input('sort') == 'published-desc') ? 'selected' : "" }}>Publish Date DESC</option>
						</select>
					</form>
					<script>
						function sortGames() {
					        document.getElementById("sortForm").submit();
					    }
					</script>
			      </div>
			    </div>
          @if($type->description != '')
            <div class="row">
              <div class="col-12">
                <p>{!! $type->description !!}</p>
              </div>
            </div>
          @endif
				@foreach($games as $game)
					<div class="row" itemscope itemtype="http://schema.org/Game">
		                <div class="col-md-12 post">
		                    <div class="row post-content">
		                        <div class="col-md-2 col-sm-3 col-7">
		                            <a href="/games/{{ $type->slug }}/{{ $game->slug }}">
		                                <img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{!! $game->name !!}" class="img-responsive img-shadow" itemprop="image" />
		                            </a>
		                        </div>
		                        <div class="col-md-2 col-md-push-8 col-sm-2 col-sm-push-7 col-5">
									@if($game->rating < 1)
  										<img src="https://img.ozboardgamer.com/img/1.png" class="img-responsive" />
  									@elseif($game->rating < 2)
  										<img src="https://img.ozboardgamer.com/img/2.png" class="img-responsive" />
  									@elseif($game->rating < 3)
  										<img src="https://img.ozboardgamer.com/img/3.png" class="img-responsive" />
  									@elseif($game->rating < 4)
  										<img src="https://img.ozboardgamer.com/img/4.png" class="img-responsive" />
  									@elseif($game->rating < 5)
  										<img src="https://img.ozboardgamer.com/img/5.png" class="img-responsive" />
  									@elseif($game->rating < 6)
  										<img src="https://img.ozboardgamer.com/img/6.png" class="img-responsive" />
  									@elseif($game->rating < 7)
  										<img src="https://img.ozboardgamer.com/img/7.png" class="img-responsive" />
  									@elseif($game->rating < 8)
  										<img src="https://img.ozboardgamer.com/img/8.png" class="img-responsive" />
  									@elseif($game->rating < 9)
  										<img src="https://img.ozboardgamer.com/img/9.png" class="img-responsive" />
  									@else
  										<img src="https://img.ozboardgamer.com/img/10.png" class="img-responsive" />
  									@endif
									<div class="text-center lead">
										<strong>{{ number_format((float)$game->rating, 1, '.', '') }}/10</strong>
									</div>
		                        </div>
		                        <div class="col-md-8 col-md-pull-2 col-sm-7 col-sm-pull-2 col-12">
		                            <h4 itemprop="name">
		                                <strong><a href="/games/{{ $type->slug }}/{{ $game->slug }}" class="post-title">{!! $game->name !!}</a></strong></h4>
		                            <p itemprop="description">
		                                {!! str_limit(strip_tags($game->description), $limit = 150, $end = '...') !!}
		                            </p>
		                            <p>
		                                <a class="btn btn-hot text-uppercase" href="/games/{{ $type->slug }}/{{ $game->slug }}"><span class="fa fa-arrow-circle-right"></span> Read more</a>
		                            </p>
		                        </div>

		                    </div>
		                </div>
		            </div>
				@endforeach
				<div class="row">
					<div class="col-12">
						<div class="text-center">
							@if(isset($_GET['sort']))
								{!! $games->appends(['sort' => $_GET['sort']])->render() !!}
							@else
								{!! $games->render() !!}
							@endif
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-12">
		                <!-- Horizon Ad -->
						<div class="text-center">
							<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508.gif" /></a>
						</div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $type->scripts !!}
@endsection
