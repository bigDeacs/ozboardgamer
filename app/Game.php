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
        'slug',
		'image',
        'thumb',
		'time', 
		'players', 
		'age', 
		'rating', 
		'contents', 
		'theming', 
        'scaling', 
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
		'published', 
		'family_id',
        'parent_id',
        'publisher_id',
        'status'
	];

    public function parent()
    {
        return $this->belongsTo('App\Game', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Game', 'parent_id');
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

    public function publishers()
    {
        return $this->belongsToMany('App\Publisher');
    }

    public function getPublisherListAttribute()
    {
        return $this->publishers->lists('id');
    }

    public function designers()
    {
        return $this->belongsToMany('App\Designer');
    }

    public function getDesignerListAttribute()
    {
        return $this->designers->lists('id');
    }

}
