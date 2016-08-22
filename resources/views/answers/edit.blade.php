@extends('appAdmin')

@section('meta')
    <title>Edit {{ $answer->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>Edit {{ $answer->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right btn-back-top"><a href="/admin/quizzes/{{ $quiz->id }}/questions/{{ $question->id }}" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>
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
				{!! Form::model($answer, ['files'=> true, 'method' => 'PATCH', 'action' => ['AnswerController@update', $quiz->id, $question->id, $answer->id]]) !!}
					<input type="hidden" name="id" value="{{ $answer->id }}">
					@include('answers.form')
					<div class="form-group btn-submit-top">
						<button type="submit" class="btn btn-success btn-block">Update</button>
					</div>
				{!! Form::close() !!}
			  </div>
			</div>
		</div>
	</div>
@endsection
