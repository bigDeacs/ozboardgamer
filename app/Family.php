<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'families';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
        'slug', 
		'description', 
		'meta', 
		'head', 
		'scripts'
	];

	public function games()
    {
        return $this->hasMany('App\Game');
    }

}
