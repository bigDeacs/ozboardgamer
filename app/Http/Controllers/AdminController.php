<?php

namespace App\Http\Controllers;

use App\Post;
use App\Game;
use App\Store;

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$latestpost = Post::orderBy('published_at', 'desc')->where('published_at', '<=', date('Y-m-d'))->first();
		$toptengames = Game::where('parent_id', '=', null)->orderBy('rating', 'desc')->take(10)->get();
		$toptenstores = Store::orderBy('rating', 'desc')->take(10)->get();
        return view('home', compact('latestpost', 'toptengames', 'toptenstores'));
	}

}
