@extends('appAdmin')

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
			  	<div class="pull-right"><a href="/{{ (Auth::check()) ? 'games' : '' }}" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back</a></div>			  	
			  	<div style="clear:both;"></div>
				<div class="row">
			      <div class="col-sm-4 col-xs-12">
			      	<img src="{{ $game->image }}" class="img-responsive" />
			      </div>
			      <div class="col-sm-6 col-xs-12">
			      	<h1>{{ $game->name }}</h1>
			      </div>
			      <div class="col-sm-2 col-xs-12">
					<?= ($game->luck + $game->strategy + $game->complexity + $game->replay + $game->components + $game->learning)*3 ?>/10
			      </div>
			    </div>
				<div class="row">
			      <div class="col-sm-4 col-xs-12">
			      	{{ $game->time }}
			      </div>
			      <div class="col-sm-4 col-xs-12">
			      	{{ $game->players }}
			      </div>
			      <div class="col-sm-4 col-xs-12">
			      	{{ $game->age }}
			      </div>
			    </div>
			
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