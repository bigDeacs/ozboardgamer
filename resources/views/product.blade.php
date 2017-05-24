@extends('app')

@section('meta')
    <title>{{ $product->name }} | Shop | Oz Board Gamer</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/shop">Shop</a></li>
				<li class="active"><span>{{ $product->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container" itemscope itemtype="http://schema.org/Product">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-sm-8 col-xs-12">
								<h1 itemprop="name">{{ $product->name }}</h1>
							</div>
							<div class="col-sm-4 col-xs-12">
								<span>Search for product: </span>
								<form id="search" action="#" method="post" style="width: 100%;margin: 5px 0;" onsubmit="return false;">
									<input type="text" name="search-products" id="search-products" class="form-control" placeholder="Find products..." style="top: -5px;">
								</form>  
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-3 col-xs-12">
								<div class="row">
									<div class="col-sm-12 col-xs-5">
										<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
										<p class="text-center" style="font-size: 20px;"><strong>{!! $product->brand !!}</strong></p>
									</div>
									<div class="col-sm-12 col-xs-7">
										@if($product->sale > 0)
											<p class="text-center"><strong style="font-size: 30px;">${!! $product->saleDisplay !!}</strong></p>
											<p class="text-center"><s><small style="font-size: 20px;">${!! $product->priceDisplay !!}</small></s></p>
										@else
											<p class="text-center"><strong style="font-size: 30px;">${!! $product->priceDisplay !!}</strong></p>
										@endif								
										<p class="text-center">
											<a class="btn btn-danger" href="{!! $product->externalURL !!}" target="_blank">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-9 col-xs-12">								
								<p>{{ $product->description }}</p>
							</div>
						</div>				
						<div class="row">
							<div class="col-xs-12">
								<h4>More Amazing Products</h4>
								<div class="jcarousel-wrapper">
									<div class="jcarousel">
										<ul>
											@foreach($products as $item)
												<li>
													<div class="thumbnail img-shadow">
														<a href="/shop/{{ $item->slug }}" title="{{ $item->name }}">
															<img src="{{ $item->thumb1x }}" srcset="{{ $item->thumb1x }} 1x, {{ $item->thumb2x }} 2x" class="img-responsive" width="300" height="auto" />
														</a>
														<div class="caption text-center">
															<a href="/shop/{{ $item->slug }}" title="{{ $item->name }}">											
																<p class="text-center" style="font-size: 15px;"><strong>{!! str_limit($item->name, 12) !!}</strong></p>
															</a>
														</div>
													</div>
												</li>
											@endforeach
										</ul>
									</div>

									<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
									<a href="#" class="jcarousel-control-next">&rsaquo;</a>
								</div>
							</div>
						</div>								
					</div>
			    </div>			

			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
        $(function() {
            $('.jcarousel').jcarousel({
                // Configuration goes here
            });
        });
    </script>
@endsection
