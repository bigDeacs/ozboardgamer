@extends('app')

@section('meta')
    <title>Board Game Quizzes | Oz Board Gamer</title>
    <meta name="description" content="Dice Rolling, Bluffing, Deduction. There are so many different mechanics that make games great!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Quizzes</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Quizzes</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($quizzes as $quiz)
						<div class="col-sm-3 col-xs-12">
					    	<p class="text-center"><strong><a href="/quizzes/{{ $quiz->slug }}">{!! $quiz->name !!}</a></strong></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $quizzes->render() !!}
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
