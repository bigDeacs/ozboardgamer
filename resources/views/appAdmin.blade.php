<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OzBoardGamer</title>

	<link href="{{ asset('/css/appAdmin.css') }}" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/star-rating.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand topnav" href="/" style="padding: 15px;">
                	OzBoardGamer - Admin Panel
                </a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/admin') }}">Home</a></li>
					@if (Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Games <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/admin/games') }}">Games</a></li>
								<li><a href="{{ url('/admin/families') }}">Game Families</a></li>
								<li><a href="{{ url('/admin/publishers') }}">Game Publishers</a></li>
								<li><a href="{{ url('/admin/designers') }}">Game Designers</a></li>
								<li><a href="{{ url('/admin/mechanics') }}">Game Mechanics</a></li>
								<li><a href="{{ url('/admin/themes') }}">Game Themes</a></li>
								<li><a href="{{ url('/admin/types') }}">Game Types</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Posts <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/admin/posts') }}">Posts</a></li>
								<li><a href="{{ url('/admin/categories') }}">Categories</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/admin/users') }}">Users</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/select2.min.js"></script>
	<script src="/js/star-rating.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script>
      $(document).ready(function() {
        $('.dataTable').DataTable( {
          stateSave: true,
          "pagingType": "full_numbers"
        });
      });
    </script>
    <script type="text/javascript">
 
            tinymce.init({
              selector: ".textarea",

              content_css : '/css/bootstrap.min.css',
              
              // ===========================================
              // INCLUDE THE PLUGIN
              // ===========================================
                  
               plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                     "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
               ],
                  
               toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
               toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | preview code ",
               image_advtab: true ,
               
               external_filemanager_path:"/filemanager/",
               filemanager_title:"Responsive Filemanager" ,
               external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                  
              // ===========================================
              // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
              // ===========================================                 

                  
            });
             
      </script>
    @yield('scripts')
</body>
</html>
