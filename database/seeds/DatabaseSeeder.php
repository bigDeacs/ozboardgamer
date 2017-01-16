<?php

use database\seeds\ProductSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(ProductSeeder::class);
		// Model::unguard();

		// $this->call('UserTableSeeder');
	}

}
