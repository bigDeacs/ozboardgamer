@extends('app')

@section('meta')
    <title>Signup | Oz Board Gamer</title>
    <meta name="description" content="">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Signup</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Signup</h1>
			      </div>
			    </div>
			    <div class="row">
             <div class="col-md-8 col-md-offset-2">
               <div class="panel panel-default">
                 @if(Session::has('name'))
                     <div class="panel-heading">Welcome {{ Session::get('name') }}!</div>
                     <div class="panel-body text-center">
                       Take a look around and dont forget to follow us on Facebook and Instagram!
                       <br />
                       <div class="btn-group">
                         <a style="padding: 10px;font-weight: bold;" href="/users/{{ str_slug(Session::get('name')) }}?page=1" class="btn btn-primary" title="View Profile"><i class="fa fa-user"></i> Welcome, {{ strtok(Session::get('name'), " ") }}</a>
                         <a style="padding: 10px;" href="/logout" class="btn btn-primary-darker" title="Log Out"><i class="fa fa-sign-out"></i></a>
                       </div>
                      </div>
                 @else
                   <div class="panel-heading">Signup</div>
                   <div class="panel-body">
                     @if (count($errors) > 0)
                       <div class="alert alert-danger">
                         <strong>Whoops!</strong> There were some problems with your input.<br><br>
                         <ul>
                           @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                           @endforeach
                         </ul>
                       </div>
                     @endif
					<div class="row text-center">
                       <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>
                       <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a>
                     </div>
					 <hr />                     
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/signup') }}">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">

                       <div class="form-group">
                         <label class="col-md-4 control-label">Name</label>
                         <div class="col-md-6">
                           <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-md-4 control-label">E-Mail Address</label>
                         <div class="col-md-6">
                           <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                         </div>
                       </div>

                       <div class="form-group">
                         <label class="col-md-4 control-label">Password</label>
                         <div class="col-md-6">
                           <input type="password" class="form-control" name="password">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-primary btn-block">
                             Signup
                           </button>
                         </div>
                       </div>
                     </form>                     
                   </div>
                 @endif
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
@endsection
