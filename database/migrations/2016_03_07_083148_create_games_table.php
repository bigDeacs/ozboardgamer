<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('time');
			$table->string('players');
			$table->string('age');
			$table->string('rating');
			$table->string('contents');
			$table->string('replay');
			$table->string('components');
			$table->string('learning');
			$table->string('luck');
			$table->string('strategy');
			$table->string('complexity');
			$table->longText('description');
			$table->string('website')->nullable();
			$table->date('published_at');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->integer('publisher_id');
			$table->integer('family_id')->nullable();
			$table->integer('parent_id')->nullable();
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
		Schema::drop('games');
	}

}
