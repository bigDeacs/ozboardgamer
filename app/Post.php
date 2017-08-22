<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

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
		'video', 
		'description', 
		'published_at', 
		'user_id', 
		'category_id', 
		'meta', 
		'head', 
		'scripts',
		'status'
	];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game');
    }

    public function getGameListAttribute()
    {
        return $this->games->lists('id');
    }
	
	public function hasGames()
	{
		return (bool) $this->games()->first();
	}

}
