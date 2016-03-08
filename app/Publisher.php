<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'publishers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
		'description', 
		'website',
		'meta', 
		'head', 
		'scripts'
	];

	public function games()
    {
        return $this->hasMany('App\Game');
    }

}
