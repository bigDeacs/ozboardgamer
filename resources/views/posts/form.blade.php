<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($post) ? $post->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="video">Video Link</label>
            <input type="text" name="video" id="video" class="form-control" value="{{ isset($post) ? $post->video : old('video') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="game_list">Games</label>
            {!! Form::select('game_list[]', $games, null, ['id' => 'game_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="publisher_id">Category</label>
            {!! Form::select('category_id', $category, Input::old('category'), ['class' => 'form-control']) !!}
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="published_at">Publish Date</label>
            <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($post) ? $post->published_at : old('published_at') }}" placeholder="" required>
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
            $('#game_list').select2({
                  placeholder: 'Choose a game',
                  tags: true
            });
      </script>
@endsection