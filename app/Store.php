<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stores';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'image',
		'thumb',
        'slug',
		'street',
        'suburb',
		'state',
		'postcode',
		'country',
		'rating',
		'latitude',
		'longitude',
		'phone',
        'email',
        'hours',
		'meta',
		'head',
		'scripts',
        'status',
        'link',
				'widget'
	];

	public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('type', 'rating');
    }

    public function getUserListAttribute()
    {
        return $this->users->lists('id');
    }

}
