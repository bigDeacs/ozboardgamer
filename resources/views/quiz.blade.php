@extends('app')

@section('meta')
    <title>{!! $quiz->name !!} | Oz Board Gamer</title>
    <meta name="description" content="Dice Rolling, Bluffing, Deduction. There are so many different mechanics that make games great!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>{!! $quiz->name !!}</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
		      <div class="col-xs-12">
		      	<h1>{!! $quiz->name !!}</h1>
		      </div>
		    </div>
		    <div class="row">
            <div class="stepwizard">
              <div class="stepwizard-row setup-panel">
                  @foreach($questions as $key => $question)
                    <div class="stepwizard-step">
                        <a href="#step-{{ $key+1 }}" type="button" class="btn btn-primary btn-circle">{{ $key+1 }}</a>
                        <p>Question {{ $key+1 }}</p>
                    </div>
                  @endforeach
              </div>
            </div>
            {!! Form::open(['route' => 'quizRequest', 'role' => 'form']) !!}
              @foreach($questions as $key => $question)
                <div class="stepwizard-step">
                    <a href="#step-{{ $key+1 }}" type="button" class="btn btn-primary btn-circle">{{ $key+1 }}</a>
                    <p>{{ $key+1 }}</p>
                </div>

                <div class="row setup-content" id="step-{{ $key+1 }}">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Question {{ $key+1 }}</h3>
                            <p>{!! $question->name !!}</p>
                            <div class="form-group">
                                @foreach($question->answers as $lock => $answer)
                                  <div class="funkyradio">
                                    <div class="funkyradio-success">
                                      <input type="radio" name="q{{ $key+1 }}" id="q{{ $key+1 }}-{{ $lock+1 }}" value="{{ $lock+1 }}" />
                                      <label for="q{{ $key+1 }}-{{ $lock+1 }}">{!! $answer->name !!}</label>
                                    </div>
                                  </div>
                                @endforeach
                            </div>
                            @if($key === count($questions))
                              <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                            @else
                              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            @endif
                        </div>
                    </div>
                </div>
              @endforeach
            {!! Form::close() !!}
				</div>
				<hr />
				<div class="row">
					<div class="col-xs-12">
						<div class="text-center">

						</div>
					</div>
				</div>
				<div class="row">
		            <div class="col-xs-12">
		                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		                <!-- Footer Ad -->
		                <ins class="adsbygoogle"
		                     style="display:block"
		                     data-ad-client="ca-pub-5206537313688631"
		                     data-ad-slot="2769589305"
		                     data-ad-format="auto"></ins>
		                <script>
		                (adsbygoogle = window.adsbygoogle || []).push({});
		                </script>
		            </div>
		        </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='radio']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
  </script>
@endsection
