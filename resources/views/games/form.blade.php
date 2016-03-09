<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($game) ? $game->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($game) ? $game->slug : old('slug') }}" placeholder="" required>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="image">Featured Image</label>
            @if(isset($game))
                  <img src="{!! $game->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
            @else
                  <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
            <small>600px X 350px</small>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="time">Play Time</label>
            <input type="text" name="time" id="time" class="form-control" value="{{ isset($game) ? $game->time : old('time') }}" placeholder="" required>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="players">Amount of Players</label>
            <input type="text" name="players" id="players" class="form-control" value="{{ isset($game) ? $game->players : old('players') }}" placeholder="" required>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="age">Age of Players</label>
            <input type="text" name="age" id="age" class="form-control" value="{{ isset($game) ? $game->age : old('age') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="luck">Luck</label>
            <input id="luck" name="luck" value="{{ isset($game) ? $game->luck : old('luck') }}" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="strategy">Strategy</label>
            <input id="strategy" name="strategy" value="{{ isset($game) ? $game->strategy : old('strategy') }}" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="complexity">Complexity</label>
            <input id="complexity" name="complexity" value="{{ isset($game) ? $game->complexity : old('complexity') }}" class="rating-loading">
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="replay">Replay</label>
            <input id="replay" name="replay" value="{{ isset($game) ? $game->replay : old('replay') }}" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="components">Components</label>
            <input id="components" name="components" value="{{ isset($game) ? $game->components : old('components') }}" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="learning">Learning</label>
            <input id="learning" name="learning" value="{{ isset($game) ? $game->learning : old('learning') }}" class="rating-loading">
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-8 col-xs-12">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="contents">Contents</label>
            {!! Form::textarea('contents', null, ['class' => 'form-control', 'id' => 'contents']) !!}
      </div>
</div>

<div class="form-group row">
	<div class="col-xs-12">
            <label for="theme_list">Themes</label>
	      {!! Form::select('theme_list[]', $themes, null, ['id' => 'theme_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="mechanic_list">Mechanics</label>
            {!! Form::select('mechanic_list[]', $mechanics, null, ['id' => 'mechanic_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
	<div class="col-xs-12">
            <label for="type_list">Types</label>
            {!! Form::select('type_list[]', $types, null, ['id' => 'type_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="publisher_id">Publisher</label>
            {!! Form::select('publisher_id', ['' => 'Select publisher'] + $publishers, Input::old('publisher'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="published_at">Publishing Year</label>
            <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($game) ? $game->published_at : old('published_at') }}" placeholder="">
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="family_id">Game Family</label>
            {!! Form::select('family_id', ['' => 'Select game family'] + $families, Input::old('family'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="parent_id">Expansion</label>
            {!! Form::select('parent_id', ['' => 'Select core game'] + $games, Input::old('parent_id'), ['class' => 'form-control']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="meta">Meta Tags</label>
            {!! Form::textarea('meta', null, ['class' => 'form-control', 'id' => 'meta']) !!}
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="head">Head Tags</label>
            {!! Form::textarea('head', null, ['class' => 'form-control', 'id' => 'head']) !!}
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="scripts">Script Tags</label>
            {!! Form::textarea('scripts', null, ['class' => 'form-control', 'id' => 'scripts']) !!}
      </div>
</div>

@section('scripts')
	<script>
            $('#theme_list').select2({
            	placeholder: 'Choose a theme',
            	tags: true
            });
            $('#mechanic_list').select2({
            	placeholder: 'Choose a mechanic',
            	tags: true
            });
            $('#type_list').select2({
            	placeholder: 'Choose a type',
            	tags: true
            });
      </script>
      <script>
            $(document).on('ready', function(){
                  $('#luck').rating({});
                  $('#strategy').rating({});
                  $('#complexity').rating({});
                  $('#replay').rating({});
                  $('#components').rating({});
                  $('#learning').rating({});
            });
      </script>
      <script>
        var loadImage = function(event) {
          var imageUpload = document.getElementById('imageUpload');
          imageUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection