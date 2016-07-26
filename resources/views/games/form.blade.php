<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-9 col-xs-12">
            <div class="row">
                  <div class="col-sm-6 col-xs-12">
                       <label for="name">Name</label>
	                 <input type="text" name="name" id="name" class="form-control" value="{{ isset($game) ? $game->name : old('name') }}" placeholder="" required>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($game) ? $game->slug : old('slug') }}" placeholder="" required>
                  </div>
            </div>
            <div class="row">
                  <div class="col-sm-4 col-xs-12">
                        <label for="players">Amount of Players</label>
                        <input type="text" name="players" id="players" class="form-control" value="{{ isset($game) ? $game->players : old('players') }}" placeholder="" required>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                        <label for="age">Age of Players</label>
                        <input type="text" name="age" id="age" class="form-control" value="{{ isset($game) ? $game->age : old('age') }}" placeholder="" required>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                        <label for="time">Play Time</label>
                        <input type="text" name="time" id="time" class="form-control" value="{{ isset($game) ? $game->time : old('time') }}" placeholder="" required>
                  </div>
            </div>
            <div class="row">
                  <div class="col-xs-12">
                        <label for="link">Purchase Link</label>
                        <input type="text" name="link" id="link" class="form-control" value="{{ isset($game) ? $game->link : old('link') }}" placeholder="">
                  </div>
            </div>
            <div class="row">
                  <div class="col-sm-6 col-xs-12">
                        <label for="luck">Luck</label><br /><small>0 = No luck at all, 5 = Too much luck</small>
                        <input id="luck" name="luck" value="{{ isset($game) ? $game->luck : old('luck') }}" class="rating-loading">
                  </div>
                  <div class="col-sm-6 col-xs-12">
                        <label for="strategy">Strategy</label><br /><small>0 = No strategy, 5 = Too much strategy</small>
                        <input id="strategy" name="strategy" value="{{ isset($game) ? $game->strategy : old('strategy') }}" class="rating-loading">
                  </div>
            </div>

            <div class="row">
                  <div class="col-sm-6 col-xs-12">
                        <label for="complexity">Complexity</label><br /><small>0 = Too simple, 5 = Too complex</small>
                        <input id="complexity" name="complexity" value="{{ isset($game) ? $game->complexity : old('complexity') }}" class="rating-loading">
                  </div>
                  <div class="col-sm-6 col-xs-12">
                        <label for="replay">Replay</label><br /><small>0 = Rarely played, 5 = Played all the time</small>
                        <input id="replay" name="replay" value="{{ isset($game) ? $game->replay : old('replay') }}" class="rating-loading">
                  </div>
            </div>

            <div class="row">
                  <div class="col-sm-6 col-xs-12">
                        <label for="components">Components</label><br /><small>0 = Poor quality, 5 = Fantastic quality</small>
                        <input id="components" name="components" value="{{ isset($game) ? $game->components : old('components') }}" class="rating-loading">
                  </div>
                  <div class="col-sm-6 col-xs-12">
                        <label for="learning">Learning</label><br /><small>0 = Hard to learn, 5 = Easy to learn</small>
                        <input id="learning" name="learning" value="{{ isset($game) ? $game->learning : old('learning') }}" class="rating-loading">
                  </div>
            </div>

            <div class="row">
                  <div class="col-sm-6 col-xs-12">
                        <label for="theming">Theme</label><br /><small>0 = No theme at all, 5 = Great theme</small>
                        <input id="theming" name="theming" value="{{ isset($game) ? $game->theming : old('theming') }}" class="rating-loading">
                  </div>
                  <div class="col-sm-6 col-xs-12">
                        <label for="scaling">Scaling</label><br /><small>0 = Does not scale well, 5 = Scales perfectly</small>
                        <input id="scaling" name="scaling" value="{{ isset($game) ? $game->scaling : old('scaling') }}" class="rating-loading">
                  </div>
            </div>
      </div>
      <div class="col-sm-3 col-xs-12">
            <label for="image">Featured Image</label>
            @if(isset($game))
                  <img src="{{ url('/', $parameters = [], $secure = true) }}{!! $game->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
            @else
                  <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
            <small>600px X 600px</small>
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'id' => 'description', 'rows' => '25']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="contents">Contents</label>
            {!! Form::textarea('contents', null, ['class' => 'form-control textarea', 'id' => 'contents', 'rows' => '25']) !!}
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
      <div class="col-xs-12">
            <label for="designer_list">Designers</label>
            {!! Form::select('designer_list[]', $designers, null, ['id' => 'designer_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="publisher_list">Publisher</label>
            {!! Form::select('publisher_list[]', $publishers, null, ['id' => 'publisher_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
      
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="published">Publishing Year</label>
            <div class='input-group date'>
                  <input type="text" autocomplete="off" name="published" id="published" data-date-format="dd-mm-yyyy" class="form-control" value="{{ isset($game) ? $game->published : old('published') }}" required />
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="family_id">Game Family</label>
            {!! Form::select('family_id', ['' => 'Select game family'] + $families, Input::old('family'), ['class' => 'form-control searchable-select']) !!}
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="parent_id">Expansion</label>
            {!! Form::select('parent_id', ['' => 'Select core game'] + $games, Input::old('parent_id'), ['class' => 'form-control searchable-select']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="meta">Meta Tags</label>
            {!! Form::textarea('meta', null, ['class' => 'form-control', 'id' => 'meta']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="head">Head Tags</label>
            {!! Form::textarea('head', null, ['class' => 'form-control', 'id' => 'head']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="scripts">Script Tags</label>
            {!! Form::textarea('scripts', null, ['class' => 'form-control', 'id' => 'scripts']) !!}
      </div>
</div>

@section('scripts')
	<script>
            $(".input-group.date").datepicker({ 
                  autoclose: true, format: "yyyy", viewMode: "years", minViewMode: "years"
            });
      </script>
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
            $('#publisher_list').select2({
                  placeholder: 'Choose a Publisher',
                  tags: true
            });
            $('#designer_list').select2({
                  placeholder: 'Choose a Designer',
                  tags: true
            });
            $(document).ready(function() {
              $(".searchable-select").select2();
            });
      </script>
      <script>
            $(document).on('ready', function(){
                  $('#luck').rating({size: 'xs'});
                  $('#strategy').rating({size: 'xs'});
                  $('#complexity').rating({size: 'xs'});
                  $('#replay').rating({size: 'xs'});
                  $('#components').rating({size: 'xs'});
                  $('#learning').rating({size: 'xs'});
                  $('#scaling').rating({size: 'xs'});
                  $('#theming').rating({size: 'xs'});
            });
      </script>
      <script>
        var loadImage = function(event) {
          var imageUpload = document.getElementById('imageUpload');
          imageUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection