@extends('app')

@section('meta')
    <title>Buy Board Games | Oz Board Gamer</title>
    <meta name="description" content="Find your local today!">
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
			<div class="col-sm-12">
				<div class="row">
			      	<div class="col-sm-9 col-xs-12">
			      		<h1>Buy Board Games</h1>
				      	@foreach($products as $product)
							<div class="col-sm-3 col-xs-12">
								<a href="{!! $product->slug !!}" target="_blank">
					    			<img src="{{ $product->thumb1x }}" srcset="{{ $product->thumb1x }} 1x, {{ $product->thumb2x }} 2x" class="img-responsive" />
					    		</a>
						    	<p class="text-center"><strong><a href="{!! $product->slug !!}" target="_blank">{!! $product->name !!}</a></strong></p>
						    	<p class="text-center"><strong>{!! $product->price !!}</strong></p>
							</div>
				            @if(($key + 1) % 4 == 0)
				              </div><div class="row">
				            @endif
						@endforeach
			      	</div>
	            	<div class="col-sm-3 col-xs-12">
	              		<span>Sort by: </span>
				      	<form id="sortForm">
				      		<input type="hidden" name="page" value="{{ isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1 }}">
				      		<select class="form-control" onchange="sortProducts()" name="sort" id="sort">
	  					  		<option value="name-asc" {{ (Request::input('sort') == 'name-asc') ? 'selected' : "" }}>Name ASC</option>
	  					  		<option value="name-desc" {{ (Request::input('sort') == 'name-desc') ? 'selected' : "" }}>Name DESC</option>
	  						  	<option value="rating-asc" {{ (Request::input('sort') == 'price-asc') ? 'selected' : "" }}>Price ASC</option>
	  						  	<option value="rating-desc" {{ (Request::input('sort') == 'price-desc') ? 'selected' : "" }}>Price DESC</option>
    						</select>
    					</form>
    					<script>
    						function sortProducts() {
    					        document.getElementById("sortForm").submit();
    					    }
    					</script>
    					<hr class="hidden-xs" />   					
		                <div class="fb-page hidden-xs" data-href="https://www.facebook.com/ozboardgamer/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ozboardgamer/"><a href="https://www.facebook.com/ozboardgamer/">Oz Board Gamer</a></blockquote></div></div>   
						<hr class="hidden-xs" /> 
						<!-- Home Page Tower Ad Right -->
		                <ins class="adsbygoogle hidden-xs"
		                     style="display:block"
		                     data-ad-client="ca-pub-5206537313688631"
		                     data-ad-slot="2828464904"
		                     data-ad-format="auto"></ins>
		                <script>
		                (adsbygoogle = window.adsbygoogle || []).push({});
		                </script>        
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
		</div>
	</div>
@endsection

@section('scripts')
@endsection
