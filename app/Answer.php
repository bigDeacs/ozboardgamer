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
    'slug',
		'image',
		'thumb',
		'description',
		'meta',
		'head',
		'scripts',
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
