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
							<div class="col-md-3 col-sm-3 col-xs-12">
								<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
							</div>
							<div class="col-md-9 col-sm-9 col-xs-12">
								@if($product->sale > 0)
									<strong>${!! $product->saleDisplay !!}</strong><br />
									<s><small>${!! $product->priceDisplay !!}</small></s>
								@else
									<strong>${!! $product->priceDisplay !!}</strong>
								@endif
								{!! $product->brand !!}
								<p class="text-center">
									<a class="btn btn-danger" href="/shop/{!! $product->slug !!}" target="_blank">Buy now <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
								</p>
							</div>
						</div>		
						<div class="row">
							<div class="col-xs-12">								
								<p>{!! $product->description !!}</p>
							</div>
						</div>						
					</div>
			    </div>			

			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
