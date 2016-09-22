@extends('app')

@section('meta')
    <title>{{ $post->name }} | {{ $post->category->name }} | Oz Board Gamer</title>
    {!! $post->meta !!}
@endsection

@section('head')
	{!! $post->head !!}
@endsection

@section('content')
	<div class="breadcrumb-holder hidden-lg hidden-md hidden-sm">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/{{ $post->category->slug }}">{{ str_limit(strip_tags($post->category->name), $limit = 5, $end = '...') }}</a></li>
				<li class="active"><span>{{ str_limit(strip_tags($post->name), $limit = 10, $end = '...') }}</span></li>
			</ol>
		</div>
	</div>
	<div class="breadcrumb-holder hidden-xs">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li><a href="/{{ $post->category->slug }}">{{ $post->category->name }}</a></li>
				<li class="active"><span>{{ $post->name }}</span></li>
			</ol>
		</div>
	</div>
	<div class="container" itemscope itemtype="http://schema.org/Review">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
			      <div class="col-sm-12 hidden-xs">
			      	<div class="img-container">
				      	<div class="fill" style="background-image:url('{{ secure_url('/') }}{{ $post->image }}');" itemprop="image"></div>
				    </div>
			      </div>
			    </div>
				<div class="row">
				  @if($post->games->isEmpty())
				  	<div class="col-sm-12 col-xs-12">
				  @else
			      	<div class="col-sm-9 col-xs-12">
			      @endif
					@unless($post->video == null)
			      		<div class="embed-responsive embed-responsive-16by9">
	      					<iframe class="embed-responsive-item" src="{{ $post->video }}" allowfullscreen itemprop="video"></iframe>
	      				</div>
			      	@endunless
			      	<div class="panel panel-success" style="padding: 0 10px;">
			      		<h1 itemprop="name">{{ $post->name }}</h1>
			      		<span class="glyphicon glyphicon-user"></span> <span itemprop="author">{!! $post->user->name !!}</span> | <span class="glyphicon glyphicon-calendar">
		                            </span><span itemprop="datePublished">{!! date('F d, Y', strtotime($post->published_at)) !!}</span>
			      		<p itemprop="reviewBody">{!! $post->description !!}</p>
			      	</div>
			      </div>
				  @unless($games->isEmpty())
				  	<div class="col-sm-3 col-xs-12 text-center lead" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Game">
				  		<p><strong>Games mentioned:</strong></p>
				    	@foreach($games as $game)
							<div class="row">
								<div class="col-xs-12">
						    		<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">
						    			<img src="{{ secure_url('/') }}{{ $game->thumb }}" class="img-responsive" />
						    		</a>
						    		<p><a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}"><span itemprop="name">{{ $game->name }}</span></a></p>
						    	</div>
						    </div>
				    	@endforeach
				    </div>
				  @endunless
				</div>
        @if(Session::has('name'))
          <hr />
          <div class="row">
            <div class="getsocial gs-reaction-button"></div>

            <?php
            define('DISQUS_SECRET_KEY', 'aN7OutGQ5Y8lXgdw4g4JqkmZl9CN9XAsWjn5PzONzaaRdzDBjIB2iEniwaKKkmu9');
            define('DISQUS_PUBLIC_KEY', 'dfGV7FT4p75sDiuGmSslFTMVq5t5a2GfDXkmvJDNyaof90Dc3THzwO5cXTSH9S2C');

            $data = array(
                    "id" => Session::get('id'),
                    "username" => Session::get('name'),
                    "email" => Session::get('email')
                );

            function dsq_hmacsha1($data, $key) {
                $blocksize=64;
                $hashfunc='sha1';
                if (strlen($key)>$blocksize)
                    $key=pack('H*', $hashfunc($key));
                $key=str_pad($key,$blocksize,chr(0x00));
                $ipad=str_repeat(chr(0x36),$blocksize);
                $opad=str_repeat(chr(0x5c),$blocksize);
                $hmac = pack(
                            'H*',$hashfunc(
                                ($key^$opad).pack(
                                    'H*',$hashfunc(
                                        ($key^$ipad).$data
                                    )
                                )
                            )
                        );
                return bin2hex($hmac);
            }

            $message = base64_encode(json_encode($data));
            $timestamp = time();
            $hmac = dsq_hmacsha1($message . ' ' . $timestamp, DISQUS_SECRET_KEY);
            ?>
            <script type="text/javascript">
            var disqus_config = function() {
                this.page.remote_auth_s3 = "<?php echo "$message $hmac $timestamp"; ?>";
                this.page.api_key = "<?php echo DISQUS_PUBLIC_KEY; ?>";
                this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = '{{ camel_case($post->name) }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            }
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//ozboardgamer.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <div id="disqus_thread"></div>
          </div>
        @else
          <hr />
          <div class="row text-center">
            <a href="/facebook" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a> or
            <a href="/google" class="btn btn-danger"><i class="fa fa-google" aria-hidden="true"></i> Login with Google</a> to add comments
          </div>
        @endif
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! $post->scripts !!}
@endsection
