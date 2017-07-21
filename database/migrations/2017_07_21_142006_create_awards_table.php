<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('awards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');			
			$table->string('slug');
			$table->longText('description');			
			$table->string('image');
			$table->string('thumb');
			$table->string('website')->nullable();
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
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
		Schema::table('awards', function(Blueprint $table)
		{
			//
		});
	}

}
