@extends('app')

@section('meta')
    <title>{{ $store->name }}</title>
   	{!! $store->meta !!}
@endsection

@section('head')
	{!! $store->head !!}
	<style>
      #map {
        height: 100%;
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
			      	<h1>{{ $store->name }}</h1>
			      	<div class="row">
			      		<div class="col-sm-6 col-xs-12">
			      			<p>{{ $store->street }}</p>
			      			<p>{{ $store->suburb }}, {{ $store->state }} {{ $store->postcode }}</p>
			      			<p>{{ $store->phone }}</p>
			      			<p><a href="mailto:{{ $store->email }}"></a></p>
			      			<p><a href="{{ $store->link }}" target="_blank">Go To Site</a></p>
			      		</div>
			      		<div class="col-sm-6 col-xs-12">
			      			<p>{!! $store->hours !!}</p>
			      		</div>
			      	</div>
			      	<div class="row"> 
		            	<div class="col-xs-12">
			      			<div id="map"></div>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC52ck_jrm_AsqBe5CDNXIh7xrW6tmMyMQ&callback=initMap" async defer></script>
	{!! $store->scripts !!}
	<script>
		var map;
	    function initMap() {
	    	map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: -34.397, lng: 150.644},
	          zoom: 8
	        });
	    }
    </script>    
@endsection