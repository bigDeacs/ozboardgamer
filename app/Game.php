<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
		'image',
		'time', 
		'players', 
		'age', 
		'rating', 
		'contents', 
		'replay', 
		'components', 
		'learning', 
		'luck', 
		'strategy', 
		'complexity', 
		'description', 
		'website', 
		'published_at', 
		'meta', 
		'head', 
		'scripts', 
		'publisher_id', 
		'family_id',
        'parent_id'
	];

	public function childGame()
    {
        return $this->hasMany('App\Game', 'parent_id', 'id');
    }

    public function parentGame()
    {
        return $this->belongsTo('App\Game', 'id', 'parent_id');

    }

	public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function family()
    {
        return $this->belongsTo('App\Family');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function getPostListAttribute()
    {
        return $this->posts->lists('id');
    }

    public function mechanics()
    {
        return $this->belongsToMany('App\Mechanic');
    }

    public function getMechanicListAttribute()
    {
        return $this->mechanics->lists('id');
    }

    public function themes()
    {
        return $this->belongsToMany('App\Theme');
    }

    public function getThemeListAttribute()
    {
        return $this->themes->lists('id');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    public function getTypeListAttribute()
    {
        return $this->types->lists('id');
    }

}
