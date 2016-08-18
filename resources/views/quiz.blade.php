@extends('app')

@section('meta')
    <title>Board Game Archetypes | Oz Board Gamer</title>
    <meta name="description" content="Dice Rolling, Bluffing, Deduction. There are so many different mechanics that make games great!">
@endsection

@section('head')
@endsection

@section('content')
	<div class="breadcrumb-holder">
		<div class="container">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
				<li class="active"><span>Archetypes</span></li>
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
                      <p>Question 1</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                      <p>Question 2</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                      <p>Question 3</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                      <p>Question 4</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-5" type="button" class="btn btn-primary btn-circle" disabled="disabled">5</a>
                      <p>Question 5</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                      <p>Question 6</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                      <p>Question 7</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
                      <p>Question 8</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">9</a>
                      <p>Question 9</p>
                  </div>
                  <div class="stepwizard-step">
                      <a href="#step-10" type="button" class="btn btn-primary btn-circle" disabled="disabled">10</a>
                      <p>Question 10</p>
                  </div>
              </div>
            </div>
            <form role="form">
              <div class="row setup-content" id="step-1">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                          <h3>Question 1</h3>
                          <p>A horde of the undead is knocking at your door! What's do you do?</p>
                          <div class="form-group">
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Architect -->
                                  <input type="radio" name="q1" id="q1-1" value="1" />
                                  <label for="q1-1">Stock up on the essentials and try to cope with the situation</label>
                                </div>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Tactician -->
                                  <input type="radio" name="q1" id="q1-2" value="2" />
                                  <label for="q1-2">Defend your base and command targeted missions out into the affected area</label>
                                </div>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Socializer -->
                                  <input type="radio" name="q1" id="q1-3" value="3" />
                                  <label for="q1-3">Gather your group together, we will pull through together!</label>
                                </div>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Daredevil -->
                                  <input type="radio" name="q1" id="q1-4" value="4" />
                                  <label for="q1-4">Luck</label>
                                </div>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Immersionist -->
                                  <input type="radio" name="q1" id="q1-5" value="5" />
                                  <label for="q1-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                                </div>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-success">
                                  <!-- Striker -->
                                  <input type="radio" name="q1" id="q1-6" value="6" />
                                  <label for="q1-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                                </div>
                              </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-2">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 2</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q2" id="q2-1" value="1" />
                                <label for="q2-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q2" id="q2-2" value="2" />
                                <label for="q2-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q2" id="q2-3" value="3" />
                                <label for="q2-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q2" id="q2-4" value="4" />
                                <label for="q2-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q2" id="q2-5" value="5" />
                                <label for="q2-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q2" id="q2-6" value="6" />
                                <label for="q2-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-3">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 3</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q3" id="q3-1" value="1" />
                                <label for="q3-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q3" id="q3-2" value="2" />
                                <label for="q3-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q3" id="q3-3" value="3" />
                                <label for="q3-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q3" id="q3-4" value="4" />
                                <label for="q3-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q3" id="q3-5" value="5" />
                                <label for="q3-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q3" id="q3-6" value="6" />
                                <label for="q3-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-4">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 4</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q4" id="q4-1" value="1" />
                                <label for="q4-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q4" id="q4-2" value="2" />
                                <label for="q4-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q4" id="q4-3" value="3" />
                                <label for="q4-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q4" id="q4-4" value="4" />
                                <label for="q4-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q4" id="q4-5" value="5" />
                                <label for="q4-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q4" id="q4-6" value="6" />
                                <label for="q4-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-5">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 5</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q5" id="q5-1" value="1" />
                                <label for="q5-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q5" id="q5-2" value="2" />
                                <label for="q5-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q5" id="q5-3" value="3" />
                                <label for="q5-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q5" id="q5-4" value="4" />
                                <label for="q5-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q5" id="q5-5" value="5" />
                                <label for="q5-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q5" id="q5-6" value="6" />
                                <label for="q5-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-6">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 6</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q6" id="q6-1" value="1" />
                                <label for="q6-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q6" id="q6-2" value="2" />
                                <label for="q6-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q6" id="q6-3" value="3" />
                                <label for="q6-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q6" id="q6-4" value="4" />
                                <label for="q6-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q6" id="q6-5" value="5" />
                                <label for="q6-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q6" id="q6-6" value="6" />
                                <label for="q6-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-7">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 7</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q7" id="q7-1" value="1" />
                                <label for="q7-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q7" id="q7-2" value="2" />
                                <label for="q7-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q7" id="q7-3" value="3" />
                                <label for="q7-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q7" id="q7-4" value="4" />
                                <label for="q7-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q7" id="q7-5" value="5" />
                                <label for="q7-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q7" id="q7-6" value="6" />
                                <label for="q7-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-8">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 8</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q8" id="q8-1" value="1" />
                                <label for="q8-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q8" id="q8-2" value="2" />
                                <label for="q8-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q8" id="q8-3" value="3" />
                                <label for="q8-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q8" id="q8-4" value="4" />
                                <label for="q8-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q8" id="q8-5" value="5" />
                                <label for="q8-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q8" id="q8-6" value="6" />
                                <label for="q8-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-9">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 9</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q9" id="q9-1" value="1" />
                                <label for="q9-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q9" id="q9-2" value="2" />
                                <label for="q9-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q9" id="q9-3" value="3" />
                                <label for="q9-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q9" id="q9-4" value="4" />
                                <label for="q9-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q9" id="q9-5" value="5" />
                                <label for="q9-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q9" id="q9-6" value="6" />
                                <label for="q9-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                      </div>
                  </div>
              </div>
              <div class="row setup-content" id="step-10">
                  <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3>Question 10</h3>
                        <p>A horde of the undead is knocking at your door! What's do you do?</p>
                        <div class="form-group">
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Architect -->
                                <input type="radio" name="q10" id="q10-1" value="1" />
                                <label for="q10-1">Stock up on the essentials and try to cope with the situation</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Tactician -->
                                <input type="radio" name="q10" id="q10-2" value="2" />
                                <label for="q10-2">Defend your base and command targeted missions out into the affected area</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Socializer -->
                                <input type="radio" name="q10" id="q10-3" value="3" />
                                <label for="q10-3">Gather your group together, we will pull through together!</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Daredevil -->
                                <input type="radio" name="q10" id="q10-4" value="4" />
                                <label for="q10-4">Luck</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Immersionist -->
                                <input type="radio" name="q10" id="q10-5" value="5" />
                                <label for="q10-5">You've watched movies on this. Grab your cricket bat and head for the nearest pub.</label>
                              </div>
                            </div>
                            <div class="funkyradio">
                              <div class="funkyradio-success">
                                <!-- Striker -->
                                <input type="radio" name="q10" id="q10-6" value="6" />
                                <label for="q10-6">You've been waiting for this day. Time to head out and start wracking up the kill count.</label>
                              </div>
                            </div>
                          </div>
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
