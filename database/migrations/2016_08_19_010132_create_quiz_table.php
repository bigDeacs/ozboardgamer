<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('archetypes');
		Schema::drop('archetype_game');
		Schema::create('results', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('image');
			$table->string('thumb');
			$table->longText('description');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->string('status');
			$table->integer('quiz_id')->nullable();
			$table->timestamps();
		});
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('image');
			$table->string('thumb');
			$table->longText('description');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->string('status');
			$table->timestamps();
		});
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('image');
			$table->string('thumb');
			$table->string('value');
			$table->longText('description');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->string('status');
			$table->integer('quiz_id')->nullable();
			$table->timestamps();
		});
		Schema::create('answers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('value');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->string('status');
			$table->integer('question_id')->nullable();
			$table->timestamps();
		});


		Schema::create('game_result', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id')->unsigned()->index();
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->integer('result_id')->unsigned()->index();
			$table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
