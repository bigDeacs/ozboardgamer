@extends('app')

@section('meta')
    <title>Board Game Mechanics | Oz Board Gamer</title>
    <meta name="description" content="Dice Rolling, Bluffing, Deduction. There are so many different mechanics that make games great!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="hidden-xs"><a href="/games">Games</a></li>
				<li class="active"><span>Mechanics</span></li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
		      <div class="col-xs-12">
		      	<h1>Which Type of Gamer are you?</h1>
		      </div>
		    </div>
		    <div class="row">
            <div class="stepwizard">
              <div class="stepwizard-row setup-panel">
                  <div class="stepwizard-step">
                      <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                      <p>Step 1</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                      <p>Step 2</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                      <p>Step 3</p>
                  </div>
              </div>
            </div>
            <form role="form">
              <div class="row setup-content" id="step-1">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                          <h3> Step 1</h3>
                          <div class="form-group">
                              <label class="control-label">First Name</label>
                              <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                          </div>
                          <div class="form-group">
                              <label class="control-label">Last Name</label>
                              <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-2">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                          <h3> Step 2</h3>
                          <div class="form-group">
                              <label class="control-label">Company Name</label>
                              <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                          </div>
                          <div class="form-group">
                              <label class="control-label">Company Address</label>
                              <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-3">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                          <h3> Step 3</h3>
                          <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                      </div>
                  </div>
              </div>
            </form>
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
                curInputs = curStep.find("input[type='text'],input[type='url']"),
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
