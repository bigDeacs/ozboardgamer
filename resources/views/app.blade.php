<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="OzBoardGamer">
    <meta name="application-name" content="OzBoardGamer">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#222222">
    <meta property="og:title"              content="Find the latest News, Reviews and More with Oz Board Gamer" />
    <meta property="og:description"        content="Want to know all the latest and greatest about Board Games? We have News, Reviews and much more!" />
    <meta property="og:image"              content="http://ozboardgamer.com/fblogo.png" />
    @yield('meta')
    @yield('head')
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/landing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/star-rating.min.css') }}" media="all" rel="stylesheet" type="text/css" />
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-THQLSV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-THQLSV');</script>
    <!-- End Google Tag Manager -->

    
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
                <a class="navbar-brand topnav" href="/">
                	<img src="/img/logo.png" class="img-responsive" height="75" width="auto" />
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="navbar-right">
                    <div class="row navbar-social text-right">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://www.facebook.com/ozboardgamer/" class="btn btn-primary btn-lg" target="_blank" title="Like us on Facebook">
                                    <i class="fa fa-facebook-official fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/OzBoardGamer" class="btn btn-info btn-lg" target="_blank" title="Follow us on Twitter">
                                    <i class="fa fa-twitter fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCWlXZAmZ21awymg9OqbCf2Q" class="btn btn-danger btn-lg" target="_blank" title="Subscribe to our Youtube channel">
                                    <i class="fa fa-youtube fa-fw"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/ozboardgamer/" class="btn btn-warning btn-lg" target="_blank" title="Follow us on Instagram">
                                    <i class="fa fa-instagram fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="hidden-xs">
                                <form id="search" action="#" method="post">
                                    <div id="label"><label for="search-terms" id="search-label">search</label></div>
                                    <div id="input">
                                        <input type="text" name="search-terms" id="search-terms" placeholder="Enter search terms...">
                                    </div>
                                </form>
                            </li> 
                            <li>
                                <a href="/games">Games</a>
                            </li>
                            <li>
                                <a href="/news">News</a>
                            </li>
                            <li>
                                <a href="/reviews">Reviews</a>
                            </li>
                            <li>
                                <a href="/howtos">How To's</a>
                            </li>
                            <li>
                                <a href="/top10s">Top 10's</a>
                            </li>                           
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
      
  	@yield('content')

  	<!-- Footer -->
    <footer class="navbar-inverse navbar-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline intro-social-buttons pull-right hidden-xs">
                        <li>
                            <a href="https://www.facebook.com/ozboardgamer/" class="btn btn-primary btn-lg" target="_blank" title="Like us on Facebook">
                                <i class="fa fa-facebook-official fa-fw"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/OzBoardGamer" class="btn btn-info btn-lg" target="_blank" title="Follow us on Twitter">
                                <i class="fa fa-twitter fa-fw"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCWlXZAmZ21awymg9OqbCf2Q" class="btn btn-danger btn-lg" target="_blank" title="Subscribe to our Youtube channel">
                                <i class="fa fa-youtube fa-fw"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/ozboardgamer/" class="btn btn-warning btn-lg" target="_blank" title="Follow us on Instagram">
                                <i class="fa fa-instagram fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/games">Games</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/news">News</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/reviews">Reviews</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/howtos">How To's</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/top10s">Top 10's</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; OzBoardGamer 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>        


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>    
    <script src="/js/star-rating.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdn.jsdelivr.net/hogan.js/3.0/hogan.min.js"></script>
    <script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="/js/classie.js"></script>
    <script src="/js/app.js"></script>
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
                    $('#back-to-top').tooltip('hide');
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
                $('#back-to-top').tooltip('show');
        });
    </script>
    @yield('scripts')
  </body>
</html>