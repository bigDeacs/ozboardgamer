@extends('app')

@section('meta')
    <title>Games</title>
@endsection

@section('head')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default panel-shadow">
			  <div class="panel-heading">
			    <h1 class="panel-title"><strong>View</strong></h1>
			  </div>
			  <div class="panel-body">
			  	<div style="clear:both;"></div>
				<div class="row">
			      <div class="col-xs-12">
			      	<h1>Games</h1>
			      </div>
			    </div>
			    @foreach($types as $type)
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
					    	<a href="/games/{{ $type->slug }}">{!! $type->name !!}</a>
						</div>
					</div>
					<hr />
				@endforeach

				<hr />

				@foreach($games as $game)
					<!-- FONTS -->
					<div class="row">
						<div class="col-sm-12">
							@if(!empty($game->types))
					    		<a href="/games/{{ $game->types()->first()->slug }}/{{ $game->slug }}">{!! $game->name !!}</a>
					    	@endif
						</div>
					</div>
					<hr />
				@endforeach
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