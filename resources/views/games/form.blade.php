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
            <label for="input-7-sm" class="control-label">Small Rating</label>
            <input id="input-3" value="0" class="rating-loading">
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="name">Name</label>
            
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="name">Name</label>
            
      </div>
</div>

<div class="form-group row">
	<div class="col-xs-12">
            <label for="theme_list">Themes</label>
	      {!! Form::select('theme_list[]', $themes, null, ['id' => 'theme_list', 'class' => 'form-control', 'multiple']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="mechanic_list">Mechanics</label>
            {!! Form::select('mechanic_list[]', $mechanics, null, ['id' => 'mechanic_list', 'class' => 'form-control', 'multiple']) !!}
      </div>
</div>

<div class="form-group row">
	<div class="col-xs-12">
            <label for="type_list">Types</label>
            {!! Form::select('type_list[]', $types, null, ['id' => 'type_list', 'class' => 'form-control', 'multiple']) !!}
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
                  $('#input-3').rating({});
            });
      </script>
@endsection