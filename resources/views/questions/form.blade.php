<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

<div class="form-group row">
      <div class="col-xs-12">
            <label for="name">Name</label>
	          <input type="text" name="name" id="name" class="form-control" value="{{ isset($question) ? $question->name : old('name') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
    <div class="col-sm-9 col-xs-12">
          <label for="description">Description</label>
          {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'id' => 'description', 'rows' => '25']) !!}
    </div>
    <div class="col-sm-3 col-xs-12">
        <label for="image">Featured Image</label>
        @if(isset($question))
              <img src="{{ secure_url('/') }}{!! $question->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
        @else
              <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
        @endif
        Browse:
        <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
        <small>851px X 315px</small>
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
        var loadImage = function(event) {
          var imageUpload = document.getElementById('imageUpload');
          imageUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection
