@extends('app')

@section('meta')
    <title>{{ $store->name }} | Stores | Oz Board Gamer</title>
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
	<div class="container" itemscope itemtype="http://schema.org/Store">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<div class="row">
			      		<div class="col-sm-8 col-xs-12">
				      		<h1 itemprop="name">{{ $store->name }}</h1>
				      	</div>
				      	<div class="col-sm-4 col-xs-12">
				      		<span>Search for store: </span>
					      	<form id="search" action="#" method="post" style="width: 100%;">
		                        <input type="text" name="search-stores" id="search-stores" class="form-control" placeholder="Enter search terms..." style="top: -5px;">
		                    </form>
				      	</div>
				    </div>
			      	<div class="row">
			      		<div class="col-md-5 col-sm-4 col-xs-12">
			      			<h2>Store Info</h2>
			      			<span itemprop="address">
                    <p>{{ $store->street }}</p>
			      			  <p>{{ $store->suburb }}, {{ $store->state }} {{ $store->postcode }}</p>
                  </span>
			      			<p itemprop="telephone">{{ $store->phone }}</p>
			      			@if($store->email !== null)
			      				<p itemprop="email"><a href="mailto:{{ $store->email }}">{{ $store->email }}</a></p>
			      			@endif
			      			@if($store->link !== null)
			      				<p itemprop="sameAs"><a href="{{ $store->link }}" target="_blank">Go To Site</a></p>
			      			@endif
			      			<div class="row">
					      		@if(Session::has('name'))
									    <div class="col-xs-1" style="padding:0;"></div>
									    <strong>Rate This Store</strong>
									    <div style="clear:both;"></div>
									    <div class="col-xs-1" style="padding:0;"></div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/1' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/1' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="1 Awful">
                            <img style="{{ $store->users()->wherePivot('rating', 1)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/1.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/2' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/2' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="2 Very Bad">
                            <img style="{{ $store->users()->wherePivot('rating', 2)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/2.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/3' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/3' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="3 Bad">
                            <img style="{{ $store->users()->wherePivot('rating', 3)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/3.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/4' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/4' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="4 Not Good">
                            <img style="{{ $store->users()->wherePivot('rating', 4)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/4.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/5' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/5' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="5 Mediocre">
                            <img style="{{ $store->users()->wherePivot('rating', 5)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/5.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/6' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/6' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="6 Okay">
                            <img style="{{ $store->users()->wherePivot('rating', 6)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/6.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/7' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/7' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="7 Good">
                            <img style="{{ $store->users()->wherePivot('rating', 7)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/7.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/8' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/8' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="8 Very Good">
                            <img style="{{ $store->users()->wherePivot('rating', 8)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/8.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/9' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/9' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="9 Excellent">
                            <img style="{{ $store->users()->wherePivot('rating', 9)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/9.png"
                                 class="img-responsive" />
                        </a>
                      </div>
                      <div class="col-xs-1" style="padding:0;">
                        <a href="{{ $store->users()->wherePivot('type', 'rating')->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? '/users/'.str_slug(Session::get('name')).'/addStoreRating/'.$store->id.'/rating/10' : '/users/'.str_slug(Session::get('name')).'/updateStoreRating/'.$store->id.'/rating/10' }}"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="10 Perfect">
                            <img style="{{ $store->users()->wherePivot('rating', 10)->where('slug', str_slug(Session::get('name')))->get()->isEmpty() ? 'opacity: 0.5;filter: alpha(opacity=50);' : 'opacity: 1.0;filter: alpha(opacity=100);' }}"
                                 src="{{ secure_url('/', $parameters = ['img']) }}/10.png"
                                 class="img-responsive" />
                        </a>
        							</div>
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
			      			<h2>Trading Hours</h2>
			      			<p itemprop="openingHours">{!! $store->hours !!}</p>
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
                  <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                    <meta itemprop="latitude" content="{{ $store->latitude }}" />
                    <meta itemprop="longitude" content="{{ $store->longitude }}" />
                  </div>
                  @if($store->widget)
                    <div class="col-sm-9 col-xs-12">
                  @else
                    <div class="col-xs-12">
                  @endif
			      			  <div id="map"></div>
			      			  <br />
			      		  </div>
                  @if($store->widget)
                    <div class="col-sm-3 col-xs-12">
                      {!! $store->widget !!}
                    </div>
                  @endif
			      	</div>
			      </div>
			    </div>

          @if(Session::has('name'))
            <hr />
            <div class="row">
              <div class="getsocial gs-reaction-button"></div>
              <script>

              /**
               *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
               *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
              var disqus_config = function () {
                  this.page.remote_auth_s3 = '{{ $data["sso"]["message"] }} {{ $data["sso"]["hmac"] }} {{ $data["sso"]["timestamp"] }}';
                  this.page.api_key = '{{ $data["sso"]["publickey"] }}';
                  this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                  this.page.identifier = '{{ camel_case($store->name) }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              (function() { // DON'T EDIT BELOW THIS LINE
                  var d = document, s = d.createElement('script');
                  s.src = '//ozboardgamer.disqus.com/embed.js';
                  s.setAttribute('data-timestamp', +new Date());
                  (d.head || d.body).appendChild(s);
              })();
              </script>
              <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
              <div id="disqus_thread"></div>
            </div>
          @else
            <hr />
            <div class="row text-center">
              <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a> or
              <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a> to add comments
            </div>
          @endif

			</div>
		</div>
	</div>
@endsection

@section('scripts')
  <script>
    $(document).on('ready', function(){
          $('#luck').rating({displayOnly: true, size: 'xs'});
          $('#strategy').rating({displayOnly: true, size: 'xs'});
          $('#complexity').rating({displayOnly: true, size: 'xs'});
          $('#replay').rating({displayOnly: true, size: 'xs'});
          $('#components').rating({displayOnly: true, size: 'xs'});
          $('#learning').rating({displayOnly: true, size: 'xs'});
          $('#theming').rating({displayOnly: true, size: 'xs'});
          $('#scaling').rating({displayOnly: true, size: 'xs'});
    });
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
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
