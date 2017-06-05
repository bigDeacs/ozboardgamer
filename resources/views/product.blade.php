@extends('app')

@section('meta')
    <title>{{ $product->name }} | Shop | Oz Board Gamer</title>
@endsection

@section('head')
	<link rel="stylesheet" href="/css/flipclock.css">
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
						<div class="post" style="padding-bottom: 10px;margin-bottom: 10px;">
							<div class="row">
								<div class="col-md-3 col-sm-4 col-xs-12">
									<div class="row">
										<div class="col-sm-12 col-xs-6">
											<p class="text-center"><img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" /></p>
										</div>
										<div class="col-sm-12 col-xs-6">
											@if($product->sale > 0)
												<p class="text-center"><small style="font-size: 15px;"><s>Was ${!! $product->price !!}</s></small></p>
												<p class="text-center"><small style="font-size: 15px;">Save ${!! number_format($product->price - $product->sale, 2, '.', '') !!}</small></p>
												<p class="text-center"><strong style="font-size: 30px;color: #db5566;">${!! $product->saleDisplay !!}</strong></p>
											@else
												<p class="text-center"><strong style="font-size: 30px;color: #db5566;">${!! $product->priceDisplay !!}</strong></p>	
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-9 col-sm-8 col-xs-12">				
									<p><strong>Published by:</strong> {{ $product->brand }}</p>								
									<article>{{ $product->description }}</article>
									<br />
									<p class="text-center">
										<a class="btn btn-hot text-uppercase btn-block btn-lg" href="{!! $product->externalURL !!}" target="_blank"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy now</a>
									</p>
								</div>
							</div>		
						</div>		
						<div class="row hidden-xs">
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
															<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $item->priceDisplay !!}</strong></p>
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
	<script src="/js/readmore.min.js"></script>
	<script>
		$('article').readmore({
		  speed: 100,
		  collapsedHeight: 350,
		  lessLink: '<a href="#" class="text-right">Read less</a>',
		  moreLink: '<a href="#" class="text-right">Read more</a>',
		});
        $(function() {
            $('.jcarousel').jcarousel({
                // Configuration goes here
            });
        });
    </script>
@endsection
