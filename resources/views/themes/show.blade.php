@extends('appAdmin')

@section('meta')
    <title>{{ $theme->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>{{ $theme->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/{{ (Auth::check()) ? 'themes' : '' }}" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>			  	
			  	<div style="clear:both;"></div>
				
			  </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection