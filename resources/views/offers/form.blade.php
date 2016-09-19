<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($offer) ? $offer->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="url">Url</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ isset($offer) ? $offer->url : old('url') }}" placeholder="" required>
      </div>
</div>
