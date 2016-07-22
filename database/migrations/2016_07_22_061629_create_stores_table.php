<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('street');
			$table->string('suburb');
			$table->string('state');
			$table->string('postcode');
			$table->string('country');
			$table->string('latitude');
			$table->string('longitude');
			$table->string('phone');
			$table->string('email');
			$table->longText('hours');
			$table->string('link');
			$table->string('meta')->nullable();
			$table->string('head')->nullable();
			$table->string('scripts')->nullable();
			$table->string('status');
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
		Schema::drop('stores');
	}

}
