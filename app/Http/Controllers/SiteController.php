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
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$featured = collect(Post::where('status', '=', '1')->where('image', '!=', '')->take(3)->get());
		$reviews = collect(Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'reviews');
		})->take(5)->get());
		$news = collect(Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'news');
		})->take(5)->get());
		$howtos = collect(Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'howtos');
		})->take(5)->get());
		$games = collect(Game::where('status', '=', '1')->orderBy('rating', 'desc')->take(10)->get());
		return view('index', compact('featured', 'reviews', 'news', 'howtos', 'games'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function game($type = null, $slug = null)
	{
		if($type == null) {
			$types = Type::where('status', '=', '1')->get();	
			$games = Game::where('status', '=', '1')->with('types')->get();
			return view('types', compact('types', 'games'));
		} elseif($slug == null) {
			$games = Game::where('status', '=', '1')->whereHas('types', function($q) use($type)
			{
			    $q->where('slug', '=', $type);
			})->get();
			$type = Type::where('status', '=', '1')->where('slug', '=', $type)->firstOrFail();	
			return view('type', compact('type','games'));
		} else {
			$game = Game::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
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
		$family = Family::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('family', compact('family'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function publisher($slug)
	{
		$publisher = Publisher::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('publisher', compact('publisher'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function mechanic($slug)
	{
		$mechanic = Mechanic::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('mechanic', compact('mechanic'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function theme($slug)
	{
		$theme = Theme::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('theme', compact('theme'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function type($slug)
	{
		$type = Type::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('type', compact('type'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function post($category, $slug = null)
	{
		if($slug == null) {
			$posts = Post::where('status', '=', '1')->whereHas('category', function($q) use($category)
			{
			    $q->where('slug', '=', $category);
			})->get();
			$category = Category::where('status', '=', '1')->where('slug', '=', $category)->firstOrFail();	
			return view('posts', compact('category','posts'));
		} else {
			$post = Post::where('status', '=', '1')->whereHas('category', function($q) use($category)
			{
			    $q->where('slug', '=', $category);
			})->where('slug', '=', $slug)->with('games')->firstOrFail();
			return view('post', compact('post'));
		}

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function category($slug)
	{
		$category = Category::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
		return view('category', compact('category'));
	}

}
