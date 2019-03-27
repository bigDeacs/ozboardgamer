@extends('app')

@section('meta')
    <title>Board Game Stores | Oz Board Gamer</title>
    <meta name="description" content="Find your local today!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Stores</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-5 col-12">
			      	<h1>Stores</h1>
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
						</select>
    					</form>
    					<script>
    						function sortGames() {
    					        document.getElementById("sortForm").submit();
    					    }
    					</script>
			      </div>
			      <div class="col-sm-4 col-12">
						<span>Search for store: </span>
						<form id="search" action="#" method="post" style="width: 100%;margin: 5px 0;" onsubmit="return false;">
							<input type="text" name="search-stores" id="search-stores" class="form-control" placeholder="Find your local store..." style="top: -5px;">
						</form>
				</div>
			    </div>
			    <div class="row">
			    	@foreach($stores as $key => $store)			
						<div class="col-md-3 col-sm-4 col-12 text-center">
							<div class="thumbnail img-shadow" style="position: relative;">
								<div style="position: absolute;right: 4px;bottom: 15px;">
									<p class="blogHeading text-right"><strong><a href="/stores/{{ $store->slug }}" class="post-title" itemprop="name" title="{{ $store->name }}" style="color:white;">{!! str_limit($store->name, 14) !!}</a></strong></p>
								</div>
								<a href="/stores/{{ $store->slug }}">
									<img src="https://img.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $store->thumb1x }} 1x, https://img.ozboardgamer.com{{ $store->thumb2x }} 2x" class="img-responsive" />
								</a>
							</div>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-12">
						<div class="text-center">
							@if(isset($_GET['sort']))
								{!! $stores->appends(['sort' => $_GET['sort']])->render() !!}
							@else
								{!! $stores->render() !!}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
