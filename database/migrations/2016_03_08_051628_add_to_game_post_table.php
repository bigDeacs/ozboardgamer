<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToGamePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('game_post', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('post_id');
			$table->integer('game_id')->unsigned()->index();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->integer('post_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('game_post', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('post_id');
		});
	}

}
