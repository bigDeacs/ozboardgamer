<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToGameTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('game_type', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('type_id');
		});

		Schema::table('game_type', function(Blueprint $table)
		{
			$table->integer('game_id')->unsigned()->index();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('game_type', function(Blueprint $table)
		{
			$table->dropIndex('game_id');
			$table->dropIndex('type_id');
		});
	}

}
