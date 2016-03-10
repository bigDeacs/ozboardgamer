<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePublishedAtOnGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('games', function(Blueprint $table)
		{
			$table->dropColumn('published_at');
			$table->string('published');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('games', function(Blueprint $table)
		{
			//
		});
	}

}
