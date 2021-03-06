<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

<div class="form-group row">
      <div class="col-sm-6 col-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($result) ? $result->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($result) ? $result->slug : old('slug') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-12">
            <label for="game_list">Games</label>
            {!! Form::select('game_list[]', $games, null, ['id' => 'game_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
    <div class="col-sm-9 col-12">
          <label for="description">Description</label>
          {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'id' => 'description', 'rows' => '25']) !!}
    </div>
    <div class="col-sm-3 col-12">
        <label for="image">Featured Image</label>
        @if(isset($result))
              <img src="{{ secure_url('/') }}{!! $result->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
        @else
              <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
        @endif
        Browse:
        <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
        <small>851px X 315px</small>
    </div>
</div>

<div class="form-group row">
      <div class="col-sm-4 col-12">
            <label for="meta">Meta Tags</label>
            {!! Form::textarea('meta', null, ['class' => 'form-control', 'id' => 'meta']) !!}
      </div>
      <div class="col-sm-4 col-12">
            <label for="head">Head Tags</label>
            {!! Form::textarea('head', null, ['class' => 'form-control', 'id' => 'head']) !!}
      </div>
      <div class="col-sm-4 col-12">
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
      <script>
        var loadImage = function(event) {
          var imageUpload = document.getElementById('imageUpload');
          imageUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection
