<?php 

namespace App\Http\Controllers;

use App\Game;
use App\Family;
use App\Publisher;
use App\Mechanic;
use App\Theme;
use App\Type;
use App\Post;
use App\Category;
use Storage;

class SiteController extends Controller {

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
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function game($type = null, $slug = null)
	{
		if($type == null) {
			$types = Type::get();	
			$games = Game::with('types')->get();
			return view('types', compact('types', 'games'));
		} elseif($slug == null) {
			$games = Game::whereHas('types', function($q) use($type)
			{
			    $q->where('slug', '=', $type);
			})->get();
			$type = Type::where('slug', '=', $type)->firstOrFail();	
			return view('type', compact('type','games'));
		} else {
			$game = Game::with('children', 'parent')->where('slug', '=', $slug)->firstOrFail();
			
			return view('game', compact('game'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function family($slug)
	{
		$family = Family::where('slug', '=', $slug)->firstOrFail();
		return view('family', compact('family'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function publisher($slug)
	{
		$publisher = Publisher::where('slug', '=', $slug)->firstOrFail();
		return view('publisher', compact('publisher'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function mechanic($slug)
	{
		$mechanic = Mechanic::where('slug', '=', $slug)->firstOrFail();
		return view('mechanic', compact('mechanic'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function theme($slug)
	{
		$theme = Theme::where('slug', '=', $slug)->firstOrFail();
		return view('theme', compact('theme'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function type($slug)
	{
		$type = Type::where('slug', '=', $slug)->firstOrFail();
		return view('type', compact('type'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function post($slug)
	{
		$post = Post::where('slug', '=', $slug)->firstOrFail();
		return view('post', compact('post'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function category($slug)
	{
		$category = Category::where('slug', '=', $slug)->firstOrFail();
		return view('category', compact('category'));
	}

}
