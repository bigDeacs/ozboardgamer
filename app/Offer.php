<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'offers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
    'url',
		'start_at',
		'end_at',
		'status'
	];
}
