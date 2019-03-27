<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-6 col-12">
            <label for="name">Name</label>
	      <input type="text" name="name" id="name" class="form-control" value="{{ isset($offer) ? $offer->name : old('name') }}" placeholder="" required>
      </div>
      <div class="col-sm-6 col-12">
            <label for="code">Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ isset($offer) ? $offer->code : old('code') }}" placeholder="">
      </div>
</div>

<div class="form-group row">
      <div class="col-12">
            <label for="url">Url</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ isset($offer) ? $offer->url : old('url') }}" placeholder="" required>
      </div>
</div>

<div class="form-group row">
      <div class="col-sm-6 col-12">
        <label for="start_at">Start Date</label>
        <div class='input-group date'>
              <input type="text" autocomplete="off" name="start_at" id="start_at" data-date-format="yyyy-mm-dd" class="form-control" value="{{ isset($offer) ? $offer->start_at : old('start_at') }}" required />
              <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
              </span>
        </div>
      </div>
      <div class="col-sm-6 col-12">
            <label for="end_at">End Date</label>
            <div class='input-group date'>
                  <input type="text" autocomplete="off" name="end_at" id="end_at" data-date-format="yyyy-mm-dd" class="form-control" value="{{ isset($offer) ? $offer->end_at : old('end_at') }}" required />
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
      </div>
</div>


@section('scripts')
      <script>
            $(".input-group.date").datepicker({
                  autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"
            });
      </script>
@endsection
