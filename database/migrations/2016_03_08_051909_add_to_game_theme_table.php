<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToGameThemeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('game_theme', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('theme_id');
			$table->integer('game_id')->unsigned()->index();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->integer('theme_id')->unsigned()->index();
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('game_theme', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('theme_id');
		});
	}

}
