@extends('appAdmin')

@section('meta')
    <title>Edit {{ $designer->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Edit {{ $designer->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right btn-back-top"><a href="/admin/designers" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>			  	
			  	<div style="clear:both;"></div>
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{!! Form::model($designer, ['method' => 'PATCH', 'action' => ['DesignerController@update', $designer->id]]) !!}
					@include('designers.form')
					<div class="form-group btn-submit-top">
						<button type="submit" class="btn btn-success btn-block">Update</button>
					</div>
				{!! Form::close() !!}
			  </div>
			</div>
		</div>
	</div>
@endsection