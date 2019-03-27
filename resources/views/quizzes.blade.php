@extends('app')

@section('meta')
    <title>Board Game Quizzes | Oz Board Gamer</title>
    <meta name="description" content="Ever wonder what kind of gamer you are? Take one of our awesome quizzes!">
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
			      <div class="col-12">
			      	<h1>Quizzes</h1>
			      </div>
			    </div>
			    <div class="row">
            @foreach($quizzes as $quiz)
    					<div class="row">
    		                <div class="col-sm-12 post">
    		                    <div class="row">
    		                        <div class="col-sm-12">
    		                            <h4>
    		                                <strong><a href="/quizzes/{{ $quiz->slug }}" class="post-title">{!! $quiz->name !!}</a></strong></h4>
    		                        </div>
    		                    </div>
    		                    <div class="row post-content">
    		                        <div class="col-sm-3 text-center">
    		                            <a href="/quizzes/{{ $quiz->slug }}">
    		                                <img src="{{ secure_url('/') }}{{ $quiz->thumb }}" alt="{!! $quiz->name !!}" class="img-responsive" width="263" height="auto" />
    		                            </a>
    		                        </div>
    		                        <div class="col-sm-9">
    		                            <p>
    		                                {!! str_limit(strip_tags($quiz->description), $limit = 100, $end = '...') !!}
    		                            </p>
    		                            <p>
    		                                <a class="btn btn-hot text-uppercase" href="/quizzes/{{ $quiz->slug }}"><span class="fa fa-arrow-circle-right"></span> Read more</a>
    		                            </p>
    		                        </div>
    		                    </div>
    		                </div>
    		            </div>
    				@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-12">
						<div class="text-center">
							{!! $quizzes->render() !!}
						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-12">
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
