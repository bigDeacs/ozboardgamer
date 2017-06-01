<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#222222">
    <meta property="fb:app_id" content="256969058009917" />
	<link rel=”publisher” href=”https://plus.google.com/+Ozboardgamer”>
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@OzBoardGamer">
	<meta name="twitter:title" content="@OzBoardGamer">
	<meta name="twitter:description" content="Want to find new board games? We have news, reviews and can even help you find out where to buy (both online and in store!).">
	<meta name="twitter:image" content="https://img.ozboardgamer.com/img/logo.png">
	<meta name="twitter:image:alt" content="Oz Board Gamer Logo">
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Website",
		"publisher": {
			"@type": "Organization",
			"name": "OzBoardGamer",
			"logo": "https://img.ozboardgamer.com/img/logo.png"
		},
		"url": "https://ozboardgamer.com/",
		"mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "https://ozboardgamer.com"
		},
		"description": "Helping you find your next favourite game! We have all the latests and greatest on board games. Check out our News, Reviews, Top 10s and more!"
	}
    </script>
    @yield('meta')
    @yield('head')
    <script type="text/javascript">if(window.location.hash == '#_=_' || window.location.hash == '#') { window.location.hash = ''; history.pushState('', document.title, window.location.pathname); }</script>
    <link href="https://css.ozboardgamer.com/css/style.min.css?v=82" rel="stylesheet">
	<!--<link href="https://ozboardgamer.com/css/fonts.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" href="https://ozboardgamer.com/css/font-awesome.min.css">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://css.ozboardgamer.com/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Facebook Plugin -->
	<div id="fb-root"></div>
	<script data-cfasync="false">(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1586488208343901";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- End Facebook Plugin -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<!-- Twitter Plugin -->
	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);

	  t._e = [];
	  t.ready = function(f) {
		t._e.push(f);
	  };

	  return t;
	}(document, "script", "twitter-wjs"));</script>
	<!-- End Twitter Plugin -->
	<!--  Hiding Script -->
	<style>.async-hide { opacity: 0 !important} </style>
	<script data-cfasync="false">(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
	h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
	(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
	})(window,document.documentElement,'async-hide','dataLayer',4000,
	{'GTM-MFDVG9R':true});</script>
	<!-- End Hiding Script -->
	<!-- Optimize + Analytics Plugin -->
	<script data-cfasync="false">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-75788516-1', 'auto');
	  ga('require', 'GTM-MFDVG9R');
	  ga('send', 'pageview');
	</script>
	<!-- End Optimize + Analytics Plugin -->
  </head>
  <body>	
	<div id="wrap">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
			<div class="container topnav">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand topnav" href="/" title="Click to go to home page">
						<img src="https://img.ozboardgamer.com/img/logo.png" class="img-responsive" height="95" width="auto" alt="OzBoardGamer Logo" />
					</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-right" style="margin: 32px 0;">
						<div class="navbar-right">
							<ul class="nav navbar-nav">                            								
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games <span class="caret"></span></a>
								  <ul class="dropdown-menu">
									
									<li class="text-center"><a href="/games">Games Types</a></li>
									<li class="text-center"><a href="/mechanics">Game Mechanics</a></li>
									<li class="text-center"><a href="/publishers">Game Publishers</a></li>
									<li class="text-center"><a href="/designers">Game Designers</a></li>
									<li class="text-center"><a href="/themes">Game Themes</a></li>
									<li class="text-center"><a href="/families">Game Families</a></li>
								  </ul>
								</li>
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Game Articles <span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="text-center"><a href="/reviews">Reviews</a></li>
									<li class="text-center"><a href="/top10s">Top 10's</a></li>
									<li class="text-center"><a href="/howtos">How To's</a></li>
									<li class="text-center"><a href="/news">News</a></li>
									<li class="text-center"><a href="/blogs">Blog</a></li>
								  </ul>
								</li>								
								<li class="dropdown hidden-sm">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Buy Games <span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li class="text-center"><a href="/shop">Buy Online</a></li>
									<li class="text-center"><a href="/stores">Find a Store</a></i></li>
								  </ul>
								</li>
								<li class="text-center hidden-sm"><a href="/quizzes">Quizzes</a></li>
								<li class="dropdown">
									@if(Session::has('name'))
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
										<ul class="dropdown-menu">
											 <div class="row" style="min-width: 300px;">
												<div class="hidden-xs col-sm-4 text-center">												
													<img src="{!! Session::get('thumb') !!}" class="img-responsive" style="margin: 5px 10px;"/>
												</div>
												<div class="col-xs-12 col-sm-8 text-center">
													<span class="hidden-xs">{{ Session::get('name') }}</span>
													<p class="hidden-xs"><small>{{ Session::get('email') }}</small></p>
													<a href="/users/{{ Session::get('slug') }}?page=1" class="btn btn-ocean text-uppercase"><i class="fa fa-user"></i> View Profile</a></li>												
												</div>
											 </div>
											<div class="row" style="background: #222222;color: #9d9d9d;margin: 10px auto 0;">
												<div class="col-xs-6 hidden-xs text-center">
													<a href="mailto:ozboardgamer@gmail.com" class="btn btn-sunny text-uppercase" style="margin: 10px;"><i class="fa fa-question-circle" aria-hidden="true"></i> Trouble?</a></li>    
												</div>
												<div class="col-xs-12 col-sm-6 text-center">
													<a href="/logout" class="btn btn-hot text-uppercase" style="margin: 10px;"><i class="fa fa-sign-out"></i> Logout</a></li>    
												</div>
											</div>
										</ul>
									@else									
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Signup <span class="caret"></span></a>
										 <ul class="dropdown-menu">
											<li class="text-center"><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
											<li class="text-center"><a href="/signup"><i class="fa fa-user-plus"></i> Signup</a></li>
											<div class="row" style="background: #222222;color: #9d9d9d;margin: 10px auto 0;padding: 5px 0;">
												<li class="text-center col-xs-12">Login Using:</li>
												<li class="text-center col-xs-4"><a href="/facebook" title="Login/Signup using Facebook"><i class="fa fa-facebook-official fa-2x"></i></a></li>
												<li class="text-center col-xs-4"><a href="/google" title="Login/Signup using Google"><i class="fa fa-google-plus-official fa-2x"></i></a></li>
												<li class="text-center col-xs-4"><a href="/twitter" title="Login/Signup using Twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
											</div>
										 </ul>									
									@endif
								</li> 
								<li><a type="button" data-toggle="modal" data-target="#searchWrapper" style="padding: 10px 10px;cursor: pointer;" title="Search Games"><i class="fa fa-search" aria-hidden="true" style="color: #008751;font-size: 20px;"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>    

		@yield('content')

		<a id="back-to-top" href="#" class="btn btn-ocean text-uppercase btn-lg back-to-top" role="button" title="Click to return on the top page" style="z-index: 100;"><span class="glyphicon glyphicon-chevron-up"></span></a>

		<!-- Footer -->
		<footer class="navbar-inverse navbar-footer">
			<div class="container">
				<div class="row">                                
					<div class="col-sm-6 col-md-4 col-xs-12">
						<div class="row">
							<div class="col-xs-6">
								<ul class="nav navbar-nav" style="padding-left: 0;">
									<li style="width:100%;">
										<a href="/">Home</a>
									</li>
									<li style="width:100%;">
										<a href="/games">Games</a>
									</li>
									<li style="width:100%;">
										<a href="/news">News</a>
									</li>
									<li style="width:100%;">
										<a href="/reviews">Reviews</a>
									</li>
									<li style="width:100%;">
										<a href="/howtos">How To's</a>
									</li>
								</ul>
							</div>
							<div class="col-xs-6">
								<ul class="nav navbar-nav" style="padding-left: 0;">                    
									<li style="width:100%;">
										<a href="/top10s">Top 10's</a>
									</li>
									<li style="width:100%;">
										<a href="/blogs">Blogs</a>
									</li>
									<li style="width:100%;">
										<a href="/stores">Stores</a>
									</li>
									<li style="width:100%;">
										<a href="/quizzes">Quizzes</a>
									</li>
									<li style="width:100%;">
										<a href="/shop">Shop</a>
									</li>
								</ul>
							</div>
						</div>                    
					</div>                
					<div class="col-md-4 col-xs-12 hidden-sm hidden-xs">
						<!-- Above Footer Ad -->
						<div class="text-center">
							<a href="https://t.cfjump.com/33917/b/31466" rel="noindex,nofollow" target="_blank"><img style="border: none; vertical-align: middle;" class="img-responsive" alt="" src="https://img.ozboardgamer.com/img/845b6d7d-2206-43a4-8302-6b925caa11ee.jpg" /></a>             
						</div>
					</div>
					<div class="col-sm-6 col-md-4 col-xs-12 hidden-xs">
						<ul class="text-center" style="padding-left: 0;">
							<li>
								<a href="https://www.facebook.com/ozboardgamer/" target="_blank" title="Like us on Facebook">
									<i class="fa fa-facebook-official fa-fw"></i> Like Us On Facebook
								</a>
							</li>
							<br />
							<li>
								<a href="https://twitter.com/OzBoardGamer" target="_blank" title="Follow us on Twitter">
									<i class="fa fa-twitter fa-fw"></i> Follow Us On Twitter
								</a>
							</li>
							<br />
							<!--<li>
								<a href="https://www.youtube.com/channel/UCWlXZAmZ21awymg9OqbCf2Q" class="btn btn-hot text-uppercase btn-lg" target="_blank" title="Subscribe to our Youtube channel">
									<i class="fa fa-youtube fa-fw"></i>
								</a>
							</li>-->
							<li>
								<a href="https://plus.google.com/b/113009055075693721367/113009055075693721367?hl=en" target="_blank" title="Follow us on Google+">
									<i class="fa fa-google-plus-official fa-fw"></i> Follow Us On Google+
								</a>
							</li> 
							<br />
							<li>
								<a href="https://www.instagram.com/ozboardgamer/" target="_blank" title="Follow us on Instagram">
									<i class="fa fa-instagram fa-fw"></i> Follow Us On Instagram
								</a>
							</li>
						</ul>    
						<p class="copyright text-muted text-center small">Copyright &copy; OzBoardGamer 2017. <br />All Rights Reserved</p>
						<br />
						<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=pv2OKsYrittSMzLZSe28rYwYxcBBibyRXxK39sTOxgo8IYEWAVxJqvpg4G0b"></script></span>                
					</div>
				</div>
			</div>
		</footer>
	</div>	
	
<div class="modal fade" id="searchWrapper" tabindex="-1" role="dialog" aria-labelledby="searchWrapperLabel" aria-hidden="true">
	 <div class="container modal-dialog modal-lg">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12 text-center">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
				<br><br>
				<form id="search" action="#" method="post" style="width: 100%;" onsubmit="return false;">
					<input type="text" name="search-terms" id="search-terms" class="form-control" placeholder="Find your next game..." style="height: 70px;font-size: 20px;">
				</form>
			</div>
		</div>
	 </div>
</div>

@unless(Session::has('name'))
	<div class='modal fade' id='loginWrapper'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class='modal-title'>
					  <strong>Signup today for amazing extras</strong>
					</h4>
				</div>
				<!-- / modal-header -->
				<div class='modal-body'>
					<img src="/img/signup-header.jpg" class="img-responsive" alt="Signup" style="margin-bottom: 15px;"/>
					@if (count($errors) > 0)
					   <div class="col-xs-12 col-sm-10 col-sm-offset-1 alert alert-danger">
						 <strong>Whoops!</strong> There were some problems with your input.<br><br>
						 <ul>
						   @foreach ($errors->all() as $error)
							 <li>{{ $error }}</li>
						   @endforeach
						 </ul>
					   </div>
					 @endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/signup') }}">
						 <input type="hidden" name="_token" value="{{ csrf_token() }}">

						 <div class="form-group">
						   <div class="col-xs-12 col-sm-10 col-sm-offset-1">
							 <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
						   </div>
						 </div>

						 <div class="form-group">
						   <div class="col-xs-12 col-sm-10 col-sm-offset-1">
							 <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
						   </div>
						 </div>

						 <div class="form-group">
						   <div class="col-xs-12 col-sm-10 col-sm-offset-1">
							 <input type="password" class="form-control" name="password" placeholder="Password">
						   </div>
						 </div>

						 <div class="form-group">
						   <div class="col-xs-12 col-sm-10 col-sm-offset-1">
							 <button type="submit" class="btn btn-ocean text-uppercase btn-block" onclick="completeRegistration()">
							   Signup
							 </button>
						   </div>
						 </div>
					</form>
					<hr />
					<div class="row text-center">
						<a href="/facebook" class="btn btn-ocean text-uppercase"><i class="fa fa-facebook-official" aria-hidden="true"></i> Signup with Facebook</a>
						<a href="/google" class="btn btn-hot text-uppercase"><i class="fa fa-google" aria-hidden="true"></i> Signup with Google</a>
					</div>
					<hr />
				</div>
				<!-- / modal-body -->
			   <div class='modal-footer'>
				   <div class="checkbox pull-right">
						<label>
						  <input class='modal-check' name='modal-check' type="checkbox"> Don't Show This Popup Again.
						</label>
					</div>
					<!--/ checkbox -->
			  </div>
			  <!--/ modal-footer -->
			</div>
			<!-- / modal-content -->
	  </div>
	  <!--/ modal-dialog -->
	</div>
	<!-- / modal -->
@endunless

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdn.jsdelivr.net/hogan.js/3.0/hogan.min.js"></script>
    <script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="https://js.ozboardgamer.com/js/scripts.js?ver=13"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://js.ozboardgamer.com/js/ie10-viewport-bug-workaround.js"></script>
    <script id="dsq-count-scr" src="//ozboardgamer.disqus.com/count.js" async></script>	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover({
          // see next for specifications
        });
    </script>    
	@if(Session::has('name') || Request::is('login') || Request::is('signup'))
		<script>
			$(document).ready(function(){
				$(window).scroll(function () {
					if ($(this).scrollTop() > 50) {
						$('#back-to-top').fadeIn();
					} else {
						$('#back-to-top').fadeOut();
					}
				});
				// scroll body to 0px on click
				$('#back-to-top').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});   			
				$('#searchWrapper').on('shown.bs.modal', function() {
				  $(this).find('input:first').focus();
				});
			});
		</script>
	@else
		<script>
			$(document).ready(function(){
				 $(window).scroll(function () {
					if ($(this).scrollTop() > 50) {
						$('#back-to-top').fadeIn();
					} else {
						$('#back-to-top').fadeOut();
					}
				});
				// scroll body to 0px on click
				$('#back-to-top').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});   			
				$('#searchWrapper').on('shown.bs.modal', function() {
				  $(this).find('input:first').focus();
				});				
				// Cookie Set
				var my_cookie = $.cookie($('.modal-check').attr('name'));
				if (my_cookie && my_cookie == "true") {
					$(this).prop('checked', my_cookie);
					console.log('checked checkbox');
				}
				else{
					$('#loginWrapper').modal('show');
					console.log('uncheck checkbox');
				}

				$(".modal-check").change(function() {
					$.cookie($(this).attr("name"), $(this).prop('checked'), {
						path: '/',
						expires: 30
					});
				});
			});
		</script>
	@endif
    @yield('scripts')
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M29GVVK"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-M29GVVK');</script>
	<!-- End Google Tag Manager -->
  </body>
</html>
