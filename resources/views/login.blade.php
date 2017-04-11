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
						<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h1 class="panel-title">Login/Signup</h1>
								</div>
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
									<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
												<button type="submit" class="btn btn-primary btn-block">Login</button>
											</div>
										</div>
								   </form>
								   <hr />
								   <div class="row text-center">
									 <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a> or 
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
