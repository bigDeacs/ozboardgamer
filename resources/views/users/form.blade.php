<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-xs-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-xs-12">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}" placeholder="" required>
      </div>
</div>