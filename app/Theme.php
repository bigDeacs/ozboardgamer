<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'themes';

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
