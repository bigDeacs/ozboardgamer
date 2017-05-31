@extends('app')

@section('meta')
    <title>Buy Board Games | Oz Board Gamer</title>
    <meta name="description" content="Great games for amazing prices!">
@endsection

@section('head')
	<link rel="stylesheet" href="/css/flipclock.css">
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Buy Board Games</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
	      	<div class="col-sm-5 col-xs-12">
	      		<h1>Buy Board Games</h1>
	      	</div>
            <div class="col-sm-3 col-xs-12">
              	<span>Sort by: </span>
		      	<form id="sortForm">
		      		<input type="hidden" name="page" value="{{ isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1 }}">
		      		<select class="form-control" onchange="sortProducts()" name="sort" id="sort">
							<option value="savings-desc" {{ (Request::input('sort') == 'savings-desc') ? 'selected' : "" }}>Promotions</option>
					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
						  	<option value="price-asc" {{ (Request::input('sort') == 'price-asc') ? 'selected' : "" }}>Price ASC</option>
						  	<option value="price-desc" {{ (Request::input('sort') == 'price-desc') ? 'selected' : "" }}>Price DESC</option>						  	
					</select>
				</form>
				<script>
					function sortProducts() {
				        document.getElementById("sortForm").submit();
				    }
				</script>
      		</div>		
      		<div class="col-sm-4 col-xs-12">
				<span>Search for product: </span>
				  <form id="search" action="#" method="post" style="width: 100%;margin: 5px 0;" onsubmit="return false;">
					  <input type="text" name="search-products" id="search-products" class="form-control" placeholder="Find products..." style="top: -5px;">
				  </form>      
            </div>			      
    	</div>
		@if(Session::has('name'))
			@if(!empty($data['offers']))
				<div class="row hidden-xs">
					<div class="col-sm-12 text-center">
					   <div id="offerCarousel" class="vertical-slider carousel vertical slide row" data-ride="carousel" style="{{ (Request::url() == 'https://ozboardgamer.com') ? 'padding-bottom: 10px;margin-bottom: -10px;' : 'margin-bottom: -10px;' }}">
						  <!-- Carousel items -->
						  <div class="carousel-inner">
							<div class="item notice notice-danger active">							
								<strong>New Deals Every Tuesday!</strong>											
								<a class="btn btn-hot btn-xs text-uppercase" href="https://t.cfjump.com/33917/b/31466" target="_blank"><span class="fa fa-arrow-circle-right"></span> Read more</a>
							</div>
							@foreach($data['offers'] as $key => $offer)
								<div class="item notice notice-danger">
									<strong>{{ $offer->name }}</strong>
									@if($offer->code !== '' || $offer->code !== null)
										{{ $offer->code }}
									@endif										
									<a class="btn btn-hot btn-xs text-uppercase" href="{{ $offer->url }}" target="_blank"><span class="fa fa-arrow-circle-right"></span> Read more</a>
								</div>
							@endforeach
						  </div>
						</div>	    		
					</div>
				</div>		
				<br />
			@endif
		@endif		
  		<div class="row">
      	@foreach($products as $key => $product)
			<div class="col-md-3 col-sm-4 col-xs-12 text-center">
				<div class="thumbnail img-shadow">
					<a href="/shop/{!! $product->slug !!}">
						<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
					</a>
					<div class="caption text-center">
						<a href="/shop/{{ $product->slug }}" title="{!! $product->name !!}">											
							<p class="text-center" style="font-size: 16px;"><strong>{{ str_limit(strip_tags($product->name), $limit = 12, $end = '...') }}</strong><br /></p>
						</a>
						@if($product->sale > 0)
							<p><strong>${!! $product->saleDisplay !!}</strong></p>
							<p><s><small>${!! $product->priceDisplay !!}</small></s></p>
						@else
							<p><strong>${!! $product->priceDisplay !!}</strong></p>
							<p>&nbsp;</p>
						@endif
						<p class="text-center">
							<a class="btn btn-hot text-uppercase" href="/shop/{!! $product->slug !!}"><span class="fa fa-arrow-circle-right"></span> Read more</a>
						</p>
					</div>													
				</div>
			</div>
		@endforeach
		</div>
		<div class="row hidden-xs">
			<div class="col-xs-12 text-center">
				<h3>New Deals In:</h3>
				<br />
				<div class="clock" style="margin: 0 auto;width:625px;"></div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-xs-12">
				<div class="text-center">
      				@if(isset($_GET['sort']))
						{!! $products->appends(['sort' => $_GET['sort']])->render() !!}
					@else
						{!! $products->render() !!}
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="/js/flipclock.min.js"></script>
	<script type="text/javascript">		
		$(document).ready(function() {
			var clock = $('.clock').FlipClock({{ strtotime('Next Tuesday') - time() }}, {
				clockFace: 'DailyCounter',
				countdown: true
			});
		});
	</script>	
@endsection
