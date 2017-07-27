@extends('app')

@section('meta')
    <title>{{ $product->name }} | Shop | Oz Board Gamer</title>
	<meta property="og:url"                content="https://ozboardgamer.com/shop/{{ $product->slug }}" />
	@if($product->sale > 0)
		<meta property="og:title" content="{{ $product->name }} On Sale Now - ${!! $product->saleDisplay !!}" />
	@else
		<meta property="og:title" content="{{ $product->name }} - ${!! $product->priceDisplay !!}" />
	@endif	
	<meta property="og:description" content="{!! str_limit(strip_tags($product->description), $limit = 250, $end = '...') !!}" />
	<meta property="og:image" content="{{ $product->thumb1x }}" />
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
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
											<p><strong>Published by:</strong> {{ $product->brand }}</p>	
										</div>
										<div class="col-sm-6 col-md-5 col-lg-4 col-xs-12" style="display: flex;padding-left: 30px;">					
											<div style="margin: 0 10px;">
												<div class="fb-share-button" data-href="https://ozboardgamer.com/shop/{{ $product->slug }}" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://ozboardgamer.com/shop/{{ $product->slug }}">Share</a></div>
											</div>
											<div style="margin: 0 10px;">
												<a class="twitter-share-button" href="https://ozboardgamer.com/shop/{{ $product->slug }}">Tweet</a>
											</div>
											<div style="margin: 0 10px;">
												<div class="g-plusone" data-size="tall" data-annotation="none" data-href="https://ozboardgamer.com/shop/{{ $product->slug }}"></div>
											</div>
										</div>
									</div>
									
																
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
													<div class="thumbnail img-shadow" style="position: relative;">
														<div style="position: absolute;right: 4px;bottom: 60px;">
															<p class="blogHeading text-right"><strong><a href="/shop/{{ $item->slug }}" class="post-title" itemprop="name" title="{{ $item->name }}" style="color:white;">{!! str_limit($item->name, 14) !!}</a></strong></p>
															<p class="blogHeadingSml text-right"><strong style="color:white;">Save ${!! number_format($item->price - $item->sale, 2, '.', '') !!}</strong></p>	
														</div>
														<a href="/shop/{{ $item->slug }}" title="{{ $item->name }}">
															<img src="{{ $item->thumb1x }}" srcset="{{ $item->thumb1x }} 1x, {{ $item->thumb2x }} 2x" alt="{{ $item->name }}" class="img-responsive" width="300" height="auto" />
														</a>
														<div class="caption text-center">
															<p style="margin: 0;font-size: 20px;color: #db5566;"><strong>${!! $item->saleDisplay !!}</strong></p>
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
						<hr />
						<div class="row hidden-xs">
							<div class="col-xs-12 text-center">
								<p><strong>New Deals In:</strong></p>
								<br />
								<div class="clock" style="margin: 0 auto;width:625px;"></div>
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
