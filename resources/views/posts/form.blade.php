<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<div class="form-group row">
      <div class="col-sm-6 col-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($post) ? $post->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($post) ? $post->slug : old('slug') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-12">
            <label for="video">Video Link</label>
            <input type="text" name="video" id="video" class="form-control" value="{{ isset($post) ? $post->video : old('video') }}" placeholder="">
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
            <label for="user_id">Author</label>
            {!! Form::select('user_id', $users, Input::old('user'), ['class' => 'form-control']) !!}
            <br />
            <label for="publisher_id">Category</label>
            {!! Form::select('category_id', $categories, Input::old('category'), ['class' => 'form-control']) !!}
            <br />
            <label for="published_at">Publish Date</label>
            <div class='input-group date'>
                  <input type="text" autocomplete="off" name="published_at" id="published_at" data-date-format="yyyy-mm-dd" class="form-control" value="{{ isset($post) ? $post->published_at : old('published_at') }}" required />
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
            <br />
            <label for="image">Featured Image</label>
            @if(isset($post))
                  <img src="{{ secure_url('/') }}{!! $post->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
            @else
                  <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
            <small>851px X 315px</small>
            <br />
            <label for="thumb">Featured Thumbnail</label>
            @if(isset($post))
                  <img src="{{ secure_url('/') }}{!! $post->thumb !!}" class="img-responsive" id="thumbUpload" style="margin-bottom:10px;" />
            @else
                  <img id="thumbUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="thumb" accept="image/*" onchange="loadThumb(event)">
            <small>600px X 600px</small>
      </div>
</div>

<div class="form-group row">
      <div class="col-12">
            <label for="meta">Meta Tags</label>
            {!! Form::textarea('meta', null, ['class' => 'form-control', 'id' => 'meta']) !!}
      </div>
</div>
<div class="form-group row">
      <div class="col-12">
            <label for="head">Head Tags</label>
            {!! Form::textarea('head', null, ['class' => 'form-control', 'id' => 'head']) !!}
      </div>
</div>
<div class="form-group row">
      <div class="col-12">
            <label for="scripts">Script Tags</label>
            {!! Form::textarea('scripts', null, ['class' => 'form-control', 'id' => 'scripts']) !!}
      </div>
</div>


@section('scripts')
      <script>
            $(".input-group.date").datepicker({ 
                  autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"
            });
      </script>
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
        var loadThumb = function(event) {
            var thumbUpload = document.getElementById('thumbUpload');
            thumbUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection