<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'status', 'slug', 'image', 'thumb', 'description', 'role'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function games()
    {
        return $this->belongsToMany('App\Game')->withPivot('type', 'rating');
    }

    public function getGameListAttribute()
    {
        return $this->games->lists('id');
    }

    public function stores()
    {
        return $this->belongsToMany('App\Store')->withPivot('type', 'rating');
    }

    public function getStoreListAttribute()
    {
        return $this->stores->lists('id');
    }

}
