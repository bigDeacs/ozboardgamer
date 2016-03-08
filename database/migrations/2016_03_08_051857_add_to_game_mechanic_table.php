<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToGameMechanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('game_mechanic');

		Schema::table('game_mechanic', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('game_id')->unsigned()->index();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->integer('mechanic_id')->unsigned()->index();
            $table->foreign('mechanic_id')->references('id')->on('mechanics')->onDelete('cascade');
            
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
