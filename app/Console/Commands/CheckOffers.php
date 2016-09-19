<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class CheckOffers extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'checkoffers';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Deactivate expired offers';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
    $offers = Offer::where('status', '=', '1')->get();
    foreach($offers as $offer)
    {
      if($offer->end_at <= date('Y-m-d'))
      {
        $offer->status = 0;
      }
    }
	}

}
