@extends('app')

@section('meta')
    <title>{{ $game->name }}</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>View {{ $game->name }}</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div style="clear:both;"></div>
				<div class="row">
			      <div class="col-sm-3 col-xs-12">
			      	<img src="{{ $game->image }}" class="img-responsive" />
			      </div>
			      <div class="col-sm-6 col-xs-12">
			      	<h1>{{ $game->name }}</h1>
					@unless($game->publisher == null)			      	
			      		<small><a href="">{{ $game->publisher->name }}</a> | Published: {{ $game->published }}</small>
			      	@endunless
			      	<div class="row">
				      <div class="col-sm-4 col-xs-12">
				      	<div class="well">
							<img src="/img/players.png" class="img-responsive" />
							<div class="text-center lead">
								{{ $game->players }}
							</div>
						</div>
				      </div>
				      <div class="col-sm-4 col-xs-12">
				      	<div class="well">
							<img src="/img/ages.png" class="img-responsive" />
							<div class="text-center lead">
								{{ $game->age }}
							</div>
						</div>
				      </div>
				      <div class="col-sm-4 col-xs-12">
				      	<div class="well">
							<img src="/img/time.png" class="img-responsive" />
							<div class="text-center lead">
								{{ $game->time }}
							</div>
						</div>
				      </div>
				    </div>
			      	
					
					
			      </div>
			      <div class="col-sm-3 col-xs-12">
			      	<div class="well">
						@if($game->rating < 1)
							<img src="/img/1.png" class="img-responsive" />
						@elseif($game->rating < 2)
							<img src="/img/2.png" class="img-responsive" />
						@elseif($game->rating < 3)
							<img src="/img/3.png" class="img-responsive" />
						@elseif($game->rating < 4)
							<img src="/img/4.png" class="img-responsive" />
						@elseif($game->rating < 5)
							<img src="/img/5.png" class="img-responsive" />
						@elseif($game->rating < 6)
							<img src="/img/6.png" class="img-responsive" />
						@elseif($game->rating < 7)
							<img src="/img/7.png" class="img-responsive" />
						@elseif($game->rating < 8)
							<img src="/img/8.png" class="img-responsive" />
						@elseif($game->rating < 9)
							<img src="/img/9.png" class="img-responsive" />
						@else
							<img src="/img/10.png" class="img-responsive" />
						@endif
						<div class="text-center lead">
							{{ number_format((float)$game->rating, 1, '.', '') }}/10
						</div>
					</div>
			      </div>
			    </div>
			    @unless($game->children->isEmpty())
			    	Parent of: 
			    	@foreach($game->children as $child)
			    		{{ $child->name }}
			    	@endforeach
			    @endunless
			    @unless($game->parent == null)
			    	Parent is: {{ $game->parent->name }}
			    @endunless
			    
				
			
				<div class="row">
			      <div class="col-sm-4 col-xs-12">
			            <label for="luck">Luck</label>
			            <input id="luck" name="luck" value="{{ $game->luck }}" class="rating-loading">
			      </div>
			      <div class="col-sm-4 col-xs-12">
			            <label for="strategy">Strategy</label>
			            <input id="strategy" name="strategy" value="{{ $game->strategy }}" class="rating-loading">
			      </div>
			      <div class="col-sm-4 col-xs-12">
			            <label for="complexity">Complexity</label>
			            <input id="complexity" name="complexity" value="{{ $game->complexity }}" class="rating-loading">
			      </div>
			</div>

			<div class="row">
			      <div class="col-sm-4 col-xs-12">
			            <label for="replay">Replay</label>
			            <input id="replay" name="replay" value="{{ $game->replay }}" class="rating-loading">
			      </div>
			      <div class="col-sm-4 col-xs-12">
			            <label for="components">Components</label>
			            <input id="components" name="components" value="{{ $game->components }}" class="rating-loading">
			      </div>
			      <div class="col-sm-4 col-xs-12">
			            <label for="learning">Learning</label>
			            <input id="learning" name="learning" value="{{ $game->learning }}" class="rating-loading">
			      </div>
			</div>
				@unless($game->themes->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->themes as $theme)
					    		{!! $theme->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
				@unless($game->mechanics->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->mechanics as $mechanic)
					    		{!! $mechanic->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
				@unless($game->types->isEmpty())
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	@foreach($game->types as $type)
					    		{!! $type->name !!}
					    	@endforeach
						</div>
					</div>
					<hr />
				@endunless
			  </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
        $(document).on('ready', function(){
              $('#luck').rating({displayOnly: true});
              $('#strategy').rating({displayOnly: true});
              $('#complexity').rating({displayOnly: true});
              $('#replay').rating({displayOnly: true});
              $('#components').rating({displayOnly: true});
              $('#learning').rating({displayOnly: true});
        });
  	</script>
@endsection