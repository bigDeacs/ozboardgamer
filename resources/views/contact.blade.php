@extends('app')

@section('meta')
    <title>Contact Us | Oz Board Gamer</title>
    <meta name="description" content="">
@endsection

@section('head')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">					
					<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">							
						<div class="panel panel-default" style="margin-top: 25px;">
							<div class="panel-heading"></div>
							<div class="panel-body">									
								<h1 class="text-center">Contact Us</h1>		
								<form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
									 <input type="hidden" name="_token" value="{{ csrf_token() }}">									 
									 <div class="form-group">
									   <div class="col-xs-12">											 
											 <div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
												<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
											</div>	
									   </div>
									 </div>
									 <div class="form-group">
									   <div class="col-xs-12">											 
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
												<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
											</div>	
									   </div>
									 </div>
									 <div class="form-group">
									   <div class="col-xs-12">											 
											 <div class="input-group">
												<span class="input-group-addon"><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
												<input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
											</div>	
									   </div>
									 </div>					
									<div class="form-group">
										<div class="col-xs-12">		
											<textarea class="form-control" required="required" name="info" cols="50" rows="10" placeholder="Let us know what you think"></textarea>
									</div>									 
									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="6LfcdxYUAAAAAHOQZ3YhuTfHlqa87dWrqTX5-Rmr"></div>
									</div>
									 <div class="form-group">
									   <div class="col-xs-12">
										 <button type="submit" class="btn btn-ocean text-uppercase btn-block" onclick="completeRegistration()">
										   Signup
										 </button>
									   </div>
									 </div>
								</form>
							   @if($errors->any())
									<div class="col-xs-12 alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											<li>{{$errors->first()}}</li>
										</ul>
									</div>
								@endif		
							</div>
						</div>	
					</div>
			    </div>
               </div>
             </div>
	</div>
@endsection

@section('scripts')
@endsection
