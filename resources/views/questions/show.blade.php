@extends('appAdmin')

@section('meta')
    <title>{{ $question->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>{{ $question->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div class="pull-right"><a href="/admin/{{ (Auth::check()) ? 'questions' : '' }}" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>
			  	<div style="clear:both;"></div>
          <p><strong>Answers:</strong></p>
          <div class="table-responsive">
            <table class="table dataTable table-striped table-hover">
              <col width="20%">
              <col width="20%">
              <col width="20%">
              <col width="40%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($question->answers() as $answer)
                    @if($answer->status == 0)
                      <tr class="danger">
                    @else
                      <tr class="success">
                    @endif
                        <td scope="row">{{ $answer->name }}</td>
                        <td>
                          <a href="/admin/quizzes/{{ $quiz->id }}/questions/{{ $question->id }}/answers/{{ $answer->id }}/edit" class="btn btn-warning">Edit <i class="fa fa-pencil-square-o"></i></a>
                          <a href="/quizzes/{{ $quiz->id }}/questions/{{ $question->id }}/answers/{{ $answer->slug }}" target="_blank" class="btn btn-primary">View <i class="fa fa-arrow-circle-o-right"></i></a>
                          @if($answer->status == 0)
                          <a href="/admin/quizzes/{{ $quiz->id }}/questions/{{ $question->id }}/answers/{{ $answer->id }}/activate" class="btn btn-success">Activate <i class="fa fa-check"></i></a>
                        @else
                          <a href="/admin/quizzes/{{ $quiz->id }}/questions/{{ $question->id }}/answers/{{ $answer->id }}/deactivate" class="btn btn-danger">Deactivate <i class="fa fa-times"></i></a>
                        @endif
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
			  </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
