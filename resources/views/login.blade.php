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
						<div class="col-xs-12">
							 <p>Welcome {{ Session::get('name') }}!</p>
							 <div class="text-center">
							   Take a look around and dont forget to follow us on Facebook and Instagram!
							   <br />
							   <div class="btn-group">
								 <a style="padding: 10px;font-weight: bold;" href="/users/{{ Session::get('slug') }}?page=1" class="btn btn-primary" title="View Profile"><i class="fa fa-user"></i> Welcome, {{ strtok(Session::get('name'), " ") }}</a>
								 <a style="padding: 10px;" href="/logout" class="btn btn-primary-darker" title="Log Out"><i class="fa fa-sign-out"></i></a>
							   </div>
							  </div>
						</div>
					 @else
						<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
							<div class="panel panel-default" style="margin-top: 25px;">
								<div class="panel-heading">
									<h1 class="panel-title">Login</h1>
								</div>
								<div class="panel-body">
									@if($errors->any())
									   <div class="col-xs-12 col-sm-10 col-sm-offset-1 alert alert-danger">
										 <strong>Whoops!</strong> There were some problems with your input.<br><br>
										 <ul>
											 <li>{{$errors->first()}}</li>
										 </ul>
									   </div>
									 @endif
									<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
												<button type="submit" class="btn btn-primary btn-block">Login</button>
											</div>
										</div>
								   </form>
								   <hr />
								   <div class="row text-center">
									 <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>
									 <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a>
								   </div>
								   <hr />
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
