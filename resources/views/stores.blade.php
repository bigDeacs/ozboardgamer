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
			      <div class="col-sm-5 col-xs-12">
			      	<h1>Stores</h1>
			      </div>
            <div class="col-sm-3 col-xs-12">
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
			      <div class="col-sm-4 col-xs-12">
              <span>Search for store: </span>
              <form id="search" action="#" method="post" style="width: 100%;">
                  <input type="text" name="search-stores" id="search-stores" class="form-control" placeholder="Find your local store..." style="top: -5px;">
              </form>
            </div>
			    </div>
			    <div class="row">
			    	@foreach($stores as $key => $store)
						<div class="col-sm-3 col-xs-12">
							<a href="/stores/{{ $store->slug }}">
				    			<img src="https://assets.ozboardgamer.com/{{ $store->thumb }}" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/stores/{{ $store->slug }}">{!! $store->name !!}</a></strong></p>
						</div>
            @if(($key + 1) % 4 == 0)
              </div><div class="row">
            @endif
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
              @if(isset($_GET['sort']))
								{!! $stores->appends(['sort' => $_GET['sort']])->render() !!}
							@else
								{!! $stores->render() !!}
							@endif
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-xs-12">
		                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		                <!-- Footer Ad -->
		                <ins class="adsbygoogle"
		                     style="display:block"
		                     data-ad-client="ca-pub-5206537313688631"
		                     data-ad-slot="2769589305"
		                     data-ad-format="auto"></ins>
		                <script>
		                (adsbygoogle = window.adsbygoogle || []).push({});
		                </script>
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
