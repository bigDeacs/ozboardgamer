<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Archetype extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'archetypes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
    'slug',
		'image',
		'thumb',
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

	public function getGameListAttribute()
	{
			return $this->games->lists('id');
	}

}
