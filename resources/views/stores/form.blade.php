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
            <input type="text" name="email" id="email" class="form-control" value="{{ isset($store) ? $store->email : old('email') }}" placeholder="" required>
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
            <input type="text" name="state" id="state" class="form-control" value="{{ isset($store) ? $store->state : old('state') }}" placeholder="" required>
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
      <div class="col-xs-12">
            <label for="hours">Hours of Operation</label>
            {!! Form::textarea('hours', null, ['class' => 'form-control textarea', 'id' => 'hours']) !!}
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-12 col-xs-12">
            <label for="link">Website Address</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ isset($store) ? $store->link : old('link') }}" placeholder="">
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