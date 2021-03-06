@extends('app')

@section('meta')
    <title>Login | Oz Board Gamer</title>
    <meta name="description" content="">
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					@if(Session::has('name'))
						<div class="col-12">
							<h1>Welcome {{ Session::get('name') }}!</h1>
							We are so happy you stopped by, while you're here, why don't you check out our latests gaming articles, search our database of games, check out our online store and dont forget to follow us on  <a href="https://www.facebook.com/ozboardgamer/" target="_blank">Facebook</a>, <a href="https://twitter.com/OzBoardGamer" target="_blank">Twitter</a>, <a href="https://www.instagram.com/ozboardgamer/" target="_blank">Instagram</a> and <a href="https://plus.google.com/b/113009055075693721367/+Ozboardgamer?hl=en" target="_blank">Google+</a>!
							<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="5000" id="bs-carousel" style="margin-top: 20px;">
							  @unless($featured->isEmpty())
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
									@foreach($featured as $key => $post)
										<li data-target="#bs-carousel" data-slide-to="{{ ($key+1) }}"></li>
									@endforeach
								</ol>
							  @endunless
							  
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">			
									@unless($featured->isEmpty())
										@foreach($featured as $key => $post)
											<div class="item slides {{ ($key == 0) ? 'active' : '' }}">
											  <!-- Overlay -->
											  <div class="overlay"></div>
											  <div class="slide-{{ ($key+2) }}" style="background-image:url('https://img.ozboardgamer.com/{{ $post->image }}');"></div>
											  <div class="hero">        
												<hgroup>
													<p class="bigText">{{ $post->category()->first()->name }}</p>        
													<p class="smallText">{{ $post->name }}</p>
												</hgroup>       
												<a href="/{{ $post->category()->first()->slug }}/{{ $post->slug }}" class="btn btn-hero btn-lg"><span class="fa fa-arrow-circle-right"></span> Find Out More</a>
											  </div>
											</div>
										@endforeach
									@endunless
									<div class="item slides {{ ($featured->isEmpty()) ? 'active' : '' }}">
									  <!-- Overlay -->
									  <div class="overlay"></div>
									  <div class="slide-1" style="background-image:url('https://img.ozboardgamer.com/img/buy-online.jpg');"></div>
									  <div class="hero">
										<hgroup>
											<p class="bigText">Buy Games</p>        
											<p class="smallText">Choose from thousands of Games and Accessories</p>
										</hgroup>
										<a href="/shop" class="btn btn-hero btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Start Shopping</a>
									  </div>
									</div>
							  </div> 
							</div>
							 
							   @unless($games->isEmpty())
								<div class="row hidden-xs">
									<div class="col-12">
										<h1 style="margin-top: 10px;">Top Rated Board Games</h1>
										<div class="jcarousel-wrapper">
											<div class="jcarousel">
												<ul>
													@foreach($games as $game)
														<li itemscope itemtype="http://schema.org/Game">
															<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}" title="{{ $game->name }}">
																<img src="https://img.ozboardgamer.com{{ $game->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $game->thumb1x }} 1x, https://img.ozboardgamer.com{{ $game->thumb2x }} 2x" alt="{{ $game->name }}" class="img-responsive img-shadow" itemprop="image" style="margin: auto;" />
															</a>
														</li>
													@endforeach
												</ul>
											</div>

											<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
											<a href="#" class="jcarousel-control-next">&rsaquo;</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<!-- Home Page Horizon Ad -->
										<div class="text-center">
											<a href="https://t.cfjump.com/33917/b/26467" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="Buy amazing Board Games from Oz Game Shop" src="https://img.ozboardgamer.com/img/d2b546c6-bf54-41c4-bdc9-d5f64bd45508.gif" /></a>
										</div>
									</div>
								</div>
								@endunless
							   @unless($stores->isEmpty())
									<div class="row hidden-xs">
										<div class="col-12">
											<h3>Top Rated Stores</h3>
											<div class="jcarousel-wrapper">
												<div class="jcarousel">
													<ul>
														@foreach($stores as $store)
															<li>
																<a href="/stores/{{ $store->slug }}" title="{{ $store->name }}">
																	<img src="https://img.ozboardgamer.com{{ $store->thumb1x }}" srcset="https://img.ozboardgamer.com{{ $store->thumb1x }} 1x, https://img.ozboardgamer.com{{ $store->thumb2x }} 2x" alt="{{ $store->name }}" class="img-responsive img-shadow" width="300" height="auto" style="margin: auto;" />
																</a>
															</li>
														@endforeach
													</ul>
												</div>

												<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
												<a href="#" class="jcarousel-control-next">&rsaquo;</a>
											</div>
										</div>
									</div>
								@endunless
						</div>
					 @else
						<div class="col-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
							<div class="panel panel-default" style="margin: 75px 0;">
								<div class="panel-heading"></div>
								<div class="panel-body">									
									<h1 class="text-center">Login Using:</h1>		
									<div class="row text-center">
										<div class="col-4"><a href="/facebook" class="btn btn-ocean text-uppercase btn-block" title="Login using Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></div>
										<div class="col-4"><a href="/google" class="btn btn-hot text-uppercase btn-block" title="Login using Google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></div>
										<div class="col-4"><a href="/twitter" class="btn btn-sky text-uppercase btn-block" title="Login using Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></div>
								   </div>
								   <br />
									<div class="row text-center">
										<div class="col-5"><hr></div>
										<div class="col-2"><h4>OR</h4></div>
										<div class="col-5"><hr></div>
									</div>
									<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
										   <div class="col-12">
											   <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
													<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
												</div>												
											</div>
										</div>
										<div class="form-group">
										   <div class="col-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
													<input type="password" class="form-control" name="password" placeholder="Password">
												</div>												
											</div>
										</div>
										<div class="form-group">
										   <div class="col-12">
												<button type="submit" class="btn btn-ocean text-uppercase btn-block">Login</button>
											</div>
										</div>
								   </form>
								   @if($errors->any())
									   <div class="col-12 alert alert-danger">
										 <strong>Whoops!</strong> There were some problems with your input.<br><br>
										 <ul>
											 <li>{{$errors->first()}}</li>
										 </ul>
									   </div>
									 @endif	
									<br />
									<div class="row text-center">
										<div class="col-5"><hr></div>
										<div class="col-2"><h4>OR</h4></div>
										<div class="col-5"><hr></div>
									</div>		
									<p class="text-center">Not a member? <a href="/signup">Signup Here</a></p>									 
								</div>
							</div>							
						</div>
					@endif
			    </div>
               </div>
             </div>
	</div>
@endsection

@section('scripts')
@endsection
