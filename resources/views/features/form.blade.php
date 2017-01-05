<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group row">
      <div class="col-sm-4 col-xs-12">
            <label for="month">Month</label>
            <div class='input-group date' id="dateMonth">
                  <input type="text" autocomplete="off" name="month" id="month" data-date-format="mm" class="form-control" value="{{ isset($feature) ? $feature->month : old('month') }}" required />
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
      </div>
      <div class="col-sm-4 col-xs-12">
            <label for="year">Year</label>
            <div class='input-group date' id="dateYear">
                  <input type="text" autocomplete="off" name="year" id="year" data-date-format="yyyy" class="form-control" value="{{ isset($feature) ? $feature->year : old('year') }}" required />
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
            </div>
      </div>
      <div class="col-sm-4 col-xs-12">
          <label for="game_id">Game</label>
          {!! Form::select('game_id', $games, null, ['id' => 'game_id', 'class' => 'form-control', 'style' => 'width: 100%']) !!}
    </div>      
</div>

@section('scripts')
      <script>
          $('#game_id').select2({
                placeholder: 'Choose a game',
          });
      </script>
      <script>
            $("#dateMonth").datepicker({
                  autoclose: true, format: "mm", viewMode: "months", minViewMode: "months", maxViewMode: "months"
            });
            $("#dateYear").datepicker({
                  autoclose: true, format: "yyyy", viewMode: "years", minViewMode: "years", maxViewMode: "years"
            });
      </script>
@endsection
