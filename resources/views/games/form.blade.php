<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($game) ? $game->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ isset($game) ? $game->name : old('name') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="luck-rating">Luck</label>
            <input id="luck-rating" value="0" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="strategy-rating">Strategy</label>
            <input id="strategy-rating" value="0" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="complexity-rating">Complexity</label>
            <input id="complexity-rating" value="0" class="rating-loading">
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="replay-rating">Replay</label>
            <input id="replay-rating" value="0" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="components-rating">Components</label>
            <input id="components-rating" value="0" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="learning-rating">Learning</label>
            <input id="learning-rating" value="0" class="rating-loading">
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
                  $('#luck-rating').rating({});
                  $('#strategy-rating').rating({});
                  $('#complexity-rating').rating({});
                  $('#replay-rating').rating({});
                  $('#components-rating').rating({});
                  $('#learning-rating').rating({});
            });
      </script>
@endsection