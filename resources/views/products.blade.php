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
	      		<h1>Buy Online</h1>
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
						  <div class="carousel-inner col-xs-12">
							<div class="item notice notice-lg notice-danger active">							
								<strong>New Amazing Deals</strong> Every Thursday!
								<a class="btn btn-hot text-uppercase" href="https://t.cfjump.com/33917/b/31466" target="_blank" style="margin-left: 25px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>
							</div>
							@foreach($data['offers'] as $key => $offer)
								<div class="item notice notice-lg notice-danger">
									<strong>{{ $offer->name }}</strong>
									@if($offer->code !== '' || $offer->code !== null)
										{{ $offer->code }}
									@endif										
									<a class="btn btn-hot btn-sm text-uppercase" href="{{ $offer->url }}" target="_blank" style="margin-left: 25px!important;"><span class="fa fa-arrow-circle-right"></span> Read more</a>
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
				<div class="thumbnail img-shadow" style="position: relative;">
					<div style="position: absolute;right: 4px;bottom: 135px;">
						<p class="blogHeading text-right"><strong><a href="/shop/{{ $product->slug }}" class="post-title" itemprop="name" title="{{ $product->name }}" style="color:white;">{!! str_limit($product->name, 16) !!}</a></strong></p>
						@if($product->sale > 0)
							<p class="blogHeadingSml text-right"><strong style="color:white;">Save ${!! number_format($product->price - $product->sale, 2, '.', '') !!}</strong></p>	
						@else
							<p class="blogHeadingSml text-right"><strong style="color:white;">{{ $product->brand }}</strong></p>	
						@endif						
					</div>
					<a href="/shop/{!! $product->slug !!}" rel="nofollow">
						<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
					</a>
					<div class="caption text-center" style="min-height: 125px;">
						@if($product->sale > 0)
							<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->saleDisplay !!}</strong></p>
							<p style="margin: 0;"><s><small>${!! $product->priceDisplay !!}</small></s></p>
						@else
							<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $product->priceDisplay !!}</strong></p>
							<p style="margin: 0;">&nbsp;</p>
						@endif
						<p class="text-center">
							<a class="btn btn-hot text-uppercase" href="/shop/{!! $product->slug !!}" rel="nofollow"><span class="fa fa-arrow-circle-right"></span> Read more</a>
						</p>
					</div>													
				</div>
			</div>
		@endforeach
		</div>
		<div class="row hidden-xs">
			<div class="col-xs-12 text-center">
				<p><strong>New Deals In:</strong></p>
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
			var clock = $('.clock').FlipClock({{ strtotime('Next Thursday') - time() }}, {
				clockFace: 'DailyCounter',
				countdown: true
			});
		});
	</script>	
@endsection
