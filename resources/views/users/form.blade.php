<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($user) ? $user->slug : old('slug') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="role">Role</label><br />
            <input type="radio" name="role" value="a" @if($user->role == 'a') checked @endif> Admin | <input type="radio" name="role" value="b" @if($user->role == 'b') checked @endif> User
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="game_list">Games</label>
            {!! Form::select('game_list[]', $games, null, ['id' => 'game_list', 'class' => 'form-control', 'multiple', 'style' => 'width: 100%']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-9 col-xs-12">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'id' => 'description', 'rows' => '25']) !!}
      </div>
      <div class="col-sm-3 col-xs-12">
            <label for="image">Image</label>
            @if(isset($user))
                  <img src="{!! $user->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
            @else
                  <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
            <small>851px X 315px</small>
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
      </script>
@endsection