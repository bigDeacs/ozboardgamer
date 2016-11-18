<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="country" value="Australia">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($store) ? $store->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ isset($store) ? $store->slug : old('slug') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ isset($store) ? $store->phone : old('phone') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ isset($store) ? $store->email : old('email') }}" placeholder="">
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="street">Street</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ isset($store) ? $store->street : old('street') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="suburb">Suburb</label>
            <input type="text" name="suburb" id="suburb" class="form-control" value="{{ isset($store) ? $store->suburb : old('suburb') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="state">State</label>
            <select name="state" id="state" class="form-control">
                  <option>Select a State</option>
                  @if(isset($store))
                        <option {{ ($store->state == 'ACT') ? 'selected' : '' }} value="ACT">ACT</option>
                        <option {{ ($store->state == 'NSW') ? 'selected' : '' }} value="NSW">NSW</option>
                        <option {{ ($store->state == 'NT') ? 'selected' : '' }} value="NT">NT</option>
                        <option {{ ($store->state == 'QLD') ? 'selected' : '' }} value="QLD">QLD</option>
                        <option {{ ($store->state == 'SA') ? 'selected' : '' }} value="SA">SA</option>
                        <option {{ ($store->state == 'TAS') ? 'selected' : '' }} value="TAS">TAS</option>
                        <option {{ ($store->state == 'VIC') ? 'selected' : '' }} value="VIC">VIC</option>
                        <option {{ ($store->state == 'WA') ? 'selected' : '' }} value="WA">WA</option>
                  @else
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                  @endif
            </select>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="postcode">Post Code</label>
            <input type="text" name="postcode" id="postcode" class="form-control" value="{{ isset($store) ? $store->postcode : old('postcode') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ isset($store) ? $store->latitude : old('latitude') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ isset($store) ? $store->longitude : old('longitude') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-9 col-xs-12">
            <label for="hours">Hours of Operation</label>
            {!! Form::textarea('hours', null, ['class' => 'form-control textarea', 'id' => 'hours']) !!}
      </div>
      <div class="col-sm-3 col-xs-12">
            <label for="image">Image</label>
            @if(isset($store))
                  <img src="{{ secure_url('/') }}{!! $store->image !!}" class="img-responsive" id="imageUpload" style="margin-bottom:10px;" />
            @else
                  <img id="imageUpload" class="img-responsive" style="margin-bottom:10px;" />
            @endif
            Browse:
            <input type="file" name="image" accept="image/*" onchange="loadImage(event)">
            <small>851px X 315px</small>
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="link">Website Address</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ isset($store) ? $store->link : old('link') }}" placeholder="">
      </div>
</div>

<div class="form-group row">
      <div class="col-xs-12">
            <label for="meta">Widget</label>
            {!! Form::textarea('widget', null, ['class' => 'form-control', 'id' => 'widget']) !!}
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
