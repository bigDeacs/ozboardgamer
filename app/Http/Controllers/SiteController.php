<?php 

namespace App\Http\Controllers;

use App\Game;
use App\Family;
use App\Publisher;
use App\Mechanic;
use App\Theme;
use App\Type;
use App\Designer;
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
		$featured = Post::where('status', '=', '1')->where('image', '!=', '')->orderBy('published_at', 'desc')->take(5)->get();
		$reviews = Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'reviews');
		})->take(5)->get();
		$news = Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'news');
		})->take(5)->get();
		$howtos = Post::where('status', '=', '1')->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'howtos');
		})->take(5)->get();
		$games = Game::where('status', '=', '1')->has('types')->orderBy('rating', 'desc')->take(10)->get();
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
			$types = Type::where('status', '=', '1')->has('games')->with('games')->get();	
			return view('types', compact('types'));
		} elseif($slug == null) {
			$games = Game::where('status', '=', '1')->whereHas('types', function($q) use($type)
			{
			    $q->where('slug', '=', $type);
			})->get();
			$type = Type::where('status', '=', '1')->where('slug', '=', $type)->firstOrFail();	
			return view('type', compact('type','games'));
		} else {
			$game = Game::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$posts = Post::where('status', '=', '1')->where('video', '!=', '')->whereHas('games', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('game', compact('game', 'posts'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function family($slug = null)
	{
		if($slug == null) {
			$families = Family::where('status', '=', '1')->has('games')->with('games')->get();
			return view('families', compact('families'));
		} else {
			$family = Family::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('family', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('family', compact('family', 'games'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function designer($slug = null)
	{
		if($slug == null) {
			$designers = Designer::where('status', '=', '1')->has('games')->with('games')->get();
			return view('designers', compact('designers'));
		} else {
			$designer = Designer::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('designers', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('designer', compact('designer', 'games'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function publisher($slug = null)
	{
		if($slug == null) {
			$publishers = Publisher::where('status', '=', '1')->has('games')->with('games')->get();
			return view('publishers', compact('publishers'));
		} else {
			$publisher = Publisher::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('publisher', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('publisher', compact('publisher', 'games'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function mechanic($slug = null)
	{
		if($slug == null) {
			$mechanics = Mechanic::where('status', '=', '1')->has('games')->with('games')->get();
			return view('mechanics', compact('mechanics'));
		} else {
			$mechanic = Mechanic::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('mechanics', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('mechanic', compact('mechanic', 'games'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function theme($slug = null)
	{
		if($slug == null) {
			$themes = Theme::where('status', '=', '1')->has('games')->with('games')->get();
			return view('themes', compact('themes'));
		} else {
			$theme = Theme::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('themes', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			return view('theme', compact('theme', 'games'));
		}
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
			})->orderBy('published_at', 'desc')->get();
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
