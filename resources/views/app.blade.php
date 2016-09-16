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
    <meta property="fb:app_id" content="256969058009917" />
    @yield('meta')
    @yield('head')
    <script type="text/javascript">if(window.location.hash == '#_=_') { window.location.hash = ''; history.pushState('', document.title, window.location.pathname); }</script>
	<link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">
  <script type="text/javascript">
    (function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = '//api.at.getsocial.io/widget/v1/gs_async.js?id=8ba0b1'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();
  </script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-5206537313688631",
        enable_page_level_ads: true
      });
    </script>
    <!-- Crazy Egg -->
    <script type="text/javascript">
    setTimeout(function(){var a=document.createElement("script");
    var b=document.getElementsByTagName("script")[0];
    a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0048/2350.js?"+Math.floor(new Date().getTime()/3600000);
    a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
    </script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '1565361210443717');
    fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" alt="Facebook Pixel" style="display:none"
    src="https://www.facebook.com/tr?id=1565361210443717&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
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

    <!-- Facebook Plugin Manager -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=256969058009917";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- End Facebook Plugin Manager -->


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
                	<img src="{{ secure_url('/', $parameters = ['img']) }}/logo.png" class="img-responsive" height="75" width="auto" alt="OzBoardGamer Logo" />
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="navbar-right">
                    <div class="row navbar-social text-right">
                        <ul class="list-inline intro-social-buttons">
                            <li id="loginFB">
                                @if(Session::has('name'))
                                    <div class="btn-group">
                                      <a style="padding: 10px;font-weight: bold;" href="/users/{{ str_slug(Session::get('name')) }}?page=1" class="btn btn-primary" title="View Profile"><i class="fa fa-user"></i> Welcome, {{ strtok(Session::get('name'), " ") }}</a>
                                      <a style="padding: 10px;" href="/facebook/logout" class="btn btn-primary-darker" title="Log Out"><i class="fa fa-sign-out"></i></a>
                                    </div>
                                @else
                                    <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>
                                @endif
                            </li>
                            <li class="hidden-sm hidden-xs">
                                <a href="https://www.facebook.com/ozboardgamer/" class="btn btn-primary btn-lg" target="_blank" title="Like us on Facebook">
                                    <i class="fa fa-facebook-official fa-fw"></i>
                                </a>
                            </li>
                            <li class="hidden-sm hidden-xs">
                                <a href="https://twitter.com/OzBoardGamer" class="btn btn-info btn-lg" target="_blank" title="Follow us on Twitter">
                                    <i class="fa fa-twitter fa-fw"></i>
                                </a>
                            </li>
                            <li class="hidden-sm hidden-xs">
                                <a href="https://www.youtube.com/channel/UCWlXZAmZ21awymg9OqbCf2Q" class="btn btn-danger btn-lg" target="_blank" title="Subscribe to our Youtube channel">
                                    <i class="fa fa-youtube fa-fw"></i>
                                </a>
                            </li>
                            <li class="hidden-sm hidden-xs">
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
                                <a href="/">Home</a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="/games">Games</a></li>
                                <li><a href="/mechanics">Mechanics</a></li>
                                <li><a href="/publishers">Publishers</a></li>
                                <li><a href="/designers">Designers</a></li>
                                <li><a href="/themes">Themes</a></li>
                                <li><a href="/families">Families</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="/reviews">Reviews</a></li>
                                <li><a href="/top10s">Top 10's</a></li>
                                <li><a href="/howtos">How To's</a></li>
                                <li><a href="/news">News</a></li>
                                <li><a href="/blogs">Blog</a></li>
                              </ul>
                            </li>
                            <li>
                                <a href="/stores">Stores</a>
                            </li>
                            <li class="hidden-sm">
                                <a href="/quizzes">Quizzes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    @if(Session::has('name'))
      <div class="row alert alert-success" style="margin-bottom: 0;">
        <div class="col-xs-12 text-center"><a href="https://t.cfjump.com/33917/c/9404" target="_blank" title="Free shipping when you spend $30 at OzGameShop">OzGameShop Coupon Code: SHIP</a></div>
      </div>
    @endif

  	@yield('content')

    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left" style="z-index: 100;"><span class="glyphicon glyphicon-chevron-up"></span></a>

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
                            <a href="/">Home</a>
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
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/blogs">Blogs</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/stores">Stores</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; OzBoardGamer 2016. All Rights Reserved</p>
                    <br />
                    <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=pv2OKsYrittSMzLZSe28rYwYxcBBibyRXxK39sTOxgo8IYEWAVxJqvpg4G0b"></script></span>
                </div>
            </div>
        </div>
    </footer>

    @unless(Session::has('name'))
      <!-- Modal -->
      <div class="modal fade" id="facebookModal" tabindex="-1" role="dialog" aria-labelledby="facebookModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-backdrop fade in" style="height: 100%;"></div>
        <button type="button" class="close" id="closeBtn" data-dismiss="modal" aria-label="Close" style="float:right;font-size: 100px;color: #fff;padding-right: 10px;"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog" style="margin-top: 150px;">
          <div class="modal-content">
            <div class="modal-body text-center" style="min-height: 340px;background: #008751;color: #fff;">
                <h3>Sign Up With Facebook!</h3>
                <p>By logging in with you Facebook account you gain access to:</p>
                <p><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Personal collection tracker & watchlist</p>
                <p><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Add ratings to Games and Stores</p>
                <p><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> Add comments to Games and Articles</p>
                <p><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i>  Our monthly email newsletter</p>
                <a href="/facebook" class="btn btn-primary btn-lg"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>
                <hr />
                <small>By logging in you are agreeing to be added to our mailing list. If you wish to be removed from this list you will need to use the unsubscribe link found on the mailing.</small>
            </div>
          </div>
        </div>
      </div>
    @endunless


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdn.jsdelivr.net/hogan.js/3.0/hogan.min.js"></script>
    <script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="/js/scripts.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover({
          // see next for specifications
        });
    </script>
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

              //if cookie hasn't been set...
              if(document.cookie.indexOf("ModalShown=true") < 0) {
                  setTimeout(function(){
                    $('#facebookModal').modal('show');
                  }, 5000);
                  //Modal has been shown, now set a cookie so it never comes back
                  $("#facebookModalClose").click(function () {
                      $("#facebookModal").modal("hide");
                  });
                  date = new Date();
                  date.setTime(date.getTime()+(30*24*60*60*1000));
                  document.cookie = "ModalShown=true; expires="+date.toGMTString()+" path=/";
              }
        });
    </script>
    @yield('scripts')
  </body>
</html>
