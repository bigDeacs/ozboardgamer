<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($mechanic) ? $mechanic->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($mechanic) ? $mechanic->slug : old('slug') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-12">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
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