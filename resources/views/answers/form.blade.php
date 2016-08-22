<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="question_id" value="{{ $question->id }}">

<div class="form-group row">
    <div class="col-sm-9 col-xs-12">
          <label for="description">Name</label>
          {!! Form::textarea('name', null, ['class' => 'form-control textarea', 'id' => 'name', 'rows' => '25']) !!}
    </div>
    <div class="col-sm-3 col-xs-12">
          <label for="result_id">Answer Value</label>
          {!! Form::select('result_id', ['' => 'Select result'] + $results, Input::old('result'), ['class' => 'form-control searchable-select']) !!}
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
            $(document).ready(function() {
              $(".searchable-select").select2();
            });
      </script>
      <script>
        var loadImage = function(event) {
          var imageUpload = document.getElementById('imageUpload');
          imageUpload.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>
@endsection
