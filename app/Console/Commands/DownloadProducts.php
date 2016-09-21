<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class DownloadProducts extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'downloadproducts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Download the latest OzGameShop Products';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
    Storage::put('products.json', fopen("http://dashboard.commissionfactory.com/Affiliate/Creatives/DataFeeds/g63c7Yjv3b7C4ZDsjOqY65L82eCUvMjti-KGq4nvwu__6vv7veOo76_j8by0qa6-sei-8rvwq6is4eTst_bz_9Toye6c68_4gvTdkqGVv1o=/
", 'r'));
	}

}
