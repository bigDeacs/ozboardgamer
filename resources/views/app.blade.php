<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OzBoardGamer</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/landing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/modern-business.css') }}" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

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
  	<hr>

  	<!-- Footer -->
    <footer class="navbar-inverse navbar-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline intro-social-buttons pull-right">
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
  </body>
</html>