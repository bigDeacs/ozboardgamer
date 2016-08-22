<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'answers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'meta',
		'head',
		'scripts',
		'question_id',
		'result_id',
		'status'
	];

  public function question()
  {
      return $this->belongsTo('App\Question');
  }

  public function result()
  {
      return $this->belongsTo('App\Result');
  }

}
