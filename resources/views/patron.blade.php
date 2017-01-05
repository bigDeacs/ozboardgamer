@extends('app')

@section('meta')
    <title>Become a Patron | Oz Board Gamer</title>
    <meta name="description" content="">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Patron</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Become a Patron</h1>
			      </div>
			    </div>
			    <div class="row">  
             <div class="col-xs-12 col-sm-6">
                     
              </div>
              <div class="col-xs-12 col-sm-6">
                   @if(isset($feature))
                      {{ $feature->game->name }}
                   @endif
              </div>
            </div>
                   <hr />
                   <br/ >
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
