<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'quizzes';

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
		'limit',
		'status'
	];

  public function questions()
  {
      return $this->hasMany('App\Question');
  }

	public function results()
  {
      return $this->hasMany('App\Result');
  }

}
