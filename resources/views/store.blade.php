@extends('app')

@section('meta')
    <title>{{ $store->name }}</title>
   	{!! $store->meta !!}
@endsection

@section('head')
	{!! $store->head !!}
	<style>
      #map {
        height: 400px;
        width: 100%;
      }
    </style>
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/stores">Stores</a></li>
				<li class="active"><span>{{ $store->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<div class="row">
			      		<div class="col-sm-9 col-xs-12">
				      		<h1>{{ $store->name }}</h1>
				      	</div>
				      	<div class="col-sm-3 col-xs-12">
				      		<span>Search for store: </span>
					      	<form id="search" action="#" method="post" style="width: 100%;">
		                        <input type="text" name="search-stores" id="search-stores" class="form-control" placeholder="Enter search terms...">
		                    </form>
				      	</div>
				    </div>
			      	<div class="row">
			      		<div class="col-md-5 col-sm-4 col-xs-12">
			      			<h3>Store Info</h3>
			      			<p>{{ $store->street }}</p>
			      			<p>{{ $store->suburb }}, {{ $store->state }} {{ $store->postcode }}</p>
			      			<p>{{ $store->phone }}</p>
			      			<p><a href="mailto:{{ $store->email }}">{{ $store->email }}</a></p>
			      			<p><a href="{{ $store->link }}" target="_blank">Go To Site</a></p>
			      			<div class="row">
					      		@if(Session::has('name'))
									<div class="col-xs-1" style="padding:0;"></div>		
									<strong>Rate This Store</strong>
									<div style="clear:both;"></div>
									<div class="col-xs-1" style="padding:0;"></div>
									@for ($i = 1; $i < 11; $i++)				
										<div class="col-xs-1" style="padding:0;">
											@if($store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty())
												<a href="/users/{{ str_slug(Session::get('name')) }}/addStoreRating/{!! $store->id !!}/rating/{{ $i }}" data-toggle="tooltip" data-placement="bottom" title="{{ $i }}/10"><img style="opacity: 0.5;filter: alpha(opacity=50);" src="/img/{{ $i }}.png" class="img-responsive" /></a>										
											@else
												@if($store->users()->wherePivot('rating', $i)->where('slug', str_slug(Session::get('name')))->get()->isEmpty())
										    		<a href="/users/{{ str_slug(Session::get('name')) }}/updateStoreRating/{!! $store->id !!}/rating/{{ $i }}" data-toggle="tooltip" data-placement="bottom" title="{{ $i }}/10"><img style="opacity: 0.5;filter: alpha(opacity=50);" src="/img/{{ $i }}.png" class="img-responsive" /></a>
										    	@else
										    		<a href="/users/{{ str_slug(Session::get('name')) }}/updateStoreRating/{!! $store->id !!}/rating/{{ $i }}" data-toggle="tooltip" data-placement="bottom" title="{{ $i }}/10"><img src="/img/{{ $i }}.png" class="img-responsive" /></a>
										    	@endif
										    @endif
									    </div>
									@endfor
								@else						
									<div class="col-xs-1" style="padding:0;"></div>		
									<strong>Login To Rate This Store</strong>
									<div style="clear:both;"></div>
									<div class="col-xs-1" style="padding:0;"></div>						
									@for ($i = 1; $i < 11; $i++)				
										<div class="col-xs-1" style="padding:0;">
											<img style="opacity: 0.5;filter: alpha(opacity=50);" src="/img/{{ $i }}.png" class="img-responsive" />								
									    </div>
									@endfor						
							    @endif
						    </div>
			      		</div>
			      		<div class="col-md-4 col-sm-4 col-xs-12">
			      			<h3>Trading Hours</h3>
			      			<p>{!! $store->hours !!}</p>
			      		</div>
			      		<div class="col-md-3 col-sm-4 col-xs-12">
				      		@if($store->rating < 1)
								<img src="/img/1.png" class="img-responsive" />
							@elseif($store->rating < 2)
								<img src="/img/2.png" class="img-responsive" />
							@elseif($store->rating < 3)
								<img src="/img/3.png" class="img-responsive" />
							@elseif($store->rating < 4)
								<img src="/img/4.png" class="img-responsive" />
							@elseif($store->rating < 5)
								<img src="/img/5.png" class="img-responsive" />
							@elseif($store->rating < 6)
								<img src="/img/6.png" class="img-responsive" />
							@elseif($store->rating < 7)
								<img src="/img/7.png" class="img-responsive" />
							@elseif($store->rating < 8)
								<img src="/img/8.png" class="img-responsive" />
							@elseif($store->rating < 9)
								<img src="/img/9.png" class="img-responsive" />
							@else
								<img src="/img/10.png" class="img-responsive" />
							@endif
							<div class="text-center lead">
								<strong>{{ number_format((float)$store->rating, 1, '.', '') }}/10</strong>
							</div>							
						</div>
			      	</div>
			      	
			      	<div class="row"> 
		            	<div class="col-xs-12">
			      			<div id="map"></div>
			      			<br />
			      		</div>
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
	<script>
		var map;
	    function initMap() {
	    	var myLatLng = { lat: {{ $store->latitude }}, lng: {{ $store->longitude }} };
	    	map = new google.maps.Map(document.getElementById('map'), {
	          center: myLatLng,
	          zoom: 16
	        });

	        var marker = new google.maps.Marker({
	          position: myLatLng,
	          map: map,
	          title: '{{ $store->name }}'
	        });
	    }
    </script>  
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC52ck_jrm_AsqBe5CDNXIh7xrW6tmMyMQ&callback=initMap"></script>
	{!! $store->scripts !!}
@endsection