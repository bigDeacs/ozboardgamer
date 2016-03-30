<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'designers';

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
		'scripts',
		'status'
	];

	public function games()
    {
        return $this->belongsToMany('App\Game');
    }

}
