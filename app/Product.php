<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
        'slug', 
		'externalURL', 
		'description', 
		'price', 
		'sale',
		'savings',
		'thumb1x',
		'thumb2x',
		'category',
		'brand'
	];

}
