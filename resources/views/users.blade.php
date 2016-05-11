@extends('app')

@section('meta')
    <title>Users</title>
    <meta name="description" content="Card games, Board games, Party Games, Dice Games, there are so many different categories.">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">	
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Users</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Users</h1>
			      </div>
			    </div>
			    <div class="row">
			    	@foreach($users as $user)
						<div class="col-sm-3 col-xs-12">
					    	<a href="/users/{{ $user->slug }}?page=1&sort=published_at-desc">
				    			<img src="{{ $user->thumb }}" class="img-responsive" />
				    		</a>
					    	<p class="text-center"><strong><a href="/users/{{ $user->slug }}?page=1&sort=published_at-desc">{!! $user->name !!}</a></strong></p>
						</div>
					@endforeach
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">
							{!! $users->render() !!}
						</div>
					</div>
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
@endsection

@section('scripts')
@endsection