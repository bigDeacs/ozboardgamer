<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'results';

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
		'quiz_id',
		'status'
	];

	public function quiz()
  {
      return $this->belongsTo('App\Quiz');
  }

	public function answers()
  {
      return $this->hasMany('App\Answers');
  }

	public function games()
	{
			return $this->belongsToMany('App\Game');
	}

	public function getGameListAttribute()
	{
			return $this->games->lists('id');
	}

}
