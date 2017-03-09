@extends('app')

@section('meta')
    <title>Buy Board Games | Oz Board Gamer</title>
    <meta name="description" content="Great games for amazing prices!">
@endsection

@section('head')
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
					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
						  	<option value="price-asc" {{ (Request::input('sort') == 'price-asc') ? 'selected' : "" }}>Price ASC</option>
						  	<option value="price-desc" {{ (Request::input('sort') == 'price-desc') ? 'selected' : "" }}>Price DESC</option>
						  	<option value="savings-desc" {{ (Request::input('sort') == 'savings-desc') ? 'selected' : "" }}>Promotions</option>
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
    	@if(!empty($data['offers']))
  			<div class="row">
  				<div class="col-sm-12 hidden-xs text-center">
			       <div id="offerCarousel" class="vertical-slider carousel vertical slide row hidden-xs" data-ride="carousel" style="{{ (Request::url() == 'https://ozboardgamer.com') ? 'padding-bottom: 10px;margin-bottom: -10px;' : 'margin-bottom: -10px;' }}">
			          <!-- Carousel items -->
			          <div class="carousel-inner">
			            @foreach($data['offers'] as $key => $offer)
			                <div class="item alert alert-success {{ ($key == 0) ? 'active' : '' }}" style="margin-bottom: 0; padding: 20px 0 40px 0;">
			                  <div class="col-xs-12 text-center">
			                    <strong>
			                        {{ $offer->name }} 
			                        @if($offer->code !== '' || $offer->code !== null)
			                            | {{ $offer->code }}
			                        @endif
			                    </strong>					                    
			                  </div>
			                </div>
			            @endforeach
			          </div>
			        </div>	    		
	    		</div>
			</div>
			<br />
		@endif
  		<div class="row">
      	@foreach($products as $key => $product)
			<div class="col-sm-3 col-xs-12 text-center">
				<a href="{!! $product->slug !!}" target="_blank">
	    			<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
	    		</a>
		    	<p class="text-center">
		    		<strong><a href="{!! $product->slug !!}" target="_blank">{!! str_limit(strip_tags($product->name), $limit = 50, $end = '...') !!}</a></strong><br />
		    		@if($product->sale > 0)
		    			<strong>${!! $product->saleDisplay !!}</strong><br />
		    			<s><small>${!! $product->priceDisplay !!}</small></s>
		    		@else
		    			<strong>${!! $product->priceDisplay !!}</strong>
		    		@endif
		    	</p>
		    	<p class="text-center">
                    <a class="btn btn-danger" href="{!! $product->slug !!}" target="_blank">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </p>
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
@endsection
