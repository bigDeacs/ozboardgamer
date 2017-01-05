<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'features';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'month',
    	'year',
		'game_id'
	];

	public function game()
	{
	    return $this->belongsTo('App\Game');
	}

}
