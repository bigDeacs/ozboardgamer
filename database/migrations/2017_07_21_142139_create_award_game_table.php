<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardGameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('award_game', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('award_id')->unsigned()->index();
            $table->foreign('award_id')->references('id')->on('awards')->onDelete('cascade');
			
			$table->integer('game_id')->unsigned()->index();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');            
            
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
		Schema::table('award_game', function(Blueprint $table)
		{
			//
		});
	}

}
