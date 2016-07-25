<?php 

namespace App\Http\Controllers;

use App\Game;
use App\Store;
use App\Family;
use App\Publisher;
use App\Mechanic;
use App\Theme;
use App\Type;
use App\Designer;
use App\User;
use App\Post;
use App\Category;
use App\Http\Requests\SearchRequest;
use Request;
use Storage;
use Session;

use Socialite;
use App\Http\Requests\GameUpdateRequest;

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
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
    	$user = Socialite::driver('facebook')->user();

		// OAuth Two Providers
		$token = $user->token;
		$refreshToken = $user->refreshToken; // not always provided
		$expiresIn = $user->expiresIn;

        $create = User::firstOrCreate(['name' => $user->getName(), 'slug' => str_slug($user->getName()), 'image' => $user->getAvatar(), 'thumb' => $user->getAvatar(), 'email' => $user->getEmail(), 'password' => 'password', 'role' => 'b', 'status' => 1]);       

		Session::put('id', $user->getId());
		Session::put('name', $user->getName());
		Session::put('email', $user->getEmail());
		Session::put('thumb', $user->getAvatar());		

		return redirect()->back();
    }

    /**
     * Destroy session data.
     *
     * @return Response
     */
    public function logoutSocialite()
    {
        Session::forget('id');
        Session::forget('name');
        Session::forget('email');
        Session::forget('thumb');

		return redirect()->back();
    }



    public function addToOwned($id, $game)
    {
    	$user = User::where('slug', '=', $id)->firstOrFail();
        $user->games()->attach($game, ['type' => 'owned']);
		return redirect()->back();
    }

	public function removeFromOwned($id, $game)
    {
    	$user = User::where('slug', '=', $id)->firstOrFail();
        $user->games()->wherePivot('type', 'owned')->detach($game);
		return redirect()->back();
    }

    public function addToWanted($id, $game)
    {
    	$user = User::where('slug', '=', $id)->firstOrFail();
        $user->games()->attach($game, ['type' => 'wanted']);
		return redirect()->back();
    }

	public function removeFromWanted($id, $game)
    {
    	$user = User::where('slug', '=', $id)->firstOrFail();
        $user->games()->wherePivot('type', 'wanted')->detach($game);
		return redirect()->back();
    }

    public function addGameRating($id, $game, $rating)
    {
    	$user = User::where('slug', '=', $id)->with('games')->firstOrFail();
   		$user->games()->attach($game, ['type' => 'rating', 'rating' => $rating]);

   		$this->syncRatings($game);

		return redirect()->back();
    }

    public function updateGameRating($id, $game, $rating)
    {
    	$user = User::where('slug', '=', $id)->with('games')->firstOrFail();
    	$user->games()->wherePivot('type', 'rating')->updateExistingPivot($game, ['rating' => $rating]); 
    	
    	$this->syncRatings($game);

		return redirect()->back();
    }


    public function syncRatings($id)
    {   
        $game = Game::where('id', '=', $id)->with('users')->firstOrFail(); 
        $total = $game->rating;

        $users = $game->users()->wherePivot('type', 'rating')->get();

        $count = 1;
        foreach($users as $user) {
            $total += $user->pivot->rating;
            $count++;
        }
        
        $game->rating = $total/$count;
        $game->save();  
    }


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$featured = Post::where('status', '=', '1')->where('image', '!=', '')->where('published_at', '<=', date('Y-m-d'))->orderBy('published_at', 'desc')->take(5)->get();
		$reviews = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'reviews');
		})->orderBy('published_at', 'desc')->take(5)->get();
		$news = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'news');
		})->orderBy('published_at', 'desc')->take(10)->get();
		$howtos = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'howtos');
		})->orderBy('published_at', 'desc')->take(5)->get();
		$top10s = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'top10s');
		})->orderBy('published_at', 'desc')->take(5)->get();
		$news = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'news');
		})->orderBy('published_at', 'desc')->take(10)->get();
		$blogs = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
		{
		    $q->where('slug', '=', 'blogs');
		})->orderBy('published_at', 'desc')->take(10)->get();
		$games = Game::where('status', '=', '1')->has('types')->orderBy('rating', 'desc')->take(10)->get();
		return view('index', compact('featured', 'reviews', 'howtos', 'top10s', 'news', 'blogs', 'games'));
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function game($type = null, $slug = null)
	{
		if($type == null) {
			$types = Type::where('status', '=', '1')->has('games')->with('games')->paginate(12);	
			return view('types', compact('types'));
		} elseif($slug == null) {
			if(Request::has('sort'))
			{
			    $pieces = explode("-", Request::input('sort'));
			    $sort = $pieces[0];
			    $direction = $pieces[1];
			} else {
				$sort = 'rating';
				$direction = 'desc';
			}
			$games = Game::where('status', '=', '1')->whereHas('types', function($q) use($type)
			{
			    $q->where('slug', '=', $type);
			})->orderBy($sort, $direction)->paginate(10);
			$type = Type::where('status', '=', '1')->where('slug', '=', $type)->firstOrFail();	
			return view('type', compact('type','games'));
		} else {
			$game = Game::where('status', '=', '1')->with('mechanics')->where('slug', '=', $slug)->firstOrFail();
			$posts = Post::where('status', '=', '1')->where('video', '!=', '')->whereHas('games', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->get();
			$related = Game::where('status', '=', '1')->where('id', '!=', $game->id)->whereHas('mechanics', function($q) use($game)
			{
			    foreach($game->mechanics as $mechanic) {
					$q->orWhere('name', '=', $mechanic->name);			    	
			    }
			})->orderByRaw("RAND()")->take(4)->get();
			return view('game', compact('game', 'posts', 'related'));
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
			$families = Family::where('status', '=', '1')->has('games')->with('games')->paginate(12);
			return view('families', compact('families'));
		} else {
			$family = Family::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('family', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->paginate(10);
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
			$designers = Designer::where('status', '=', '1')->has('games')->with('games')->paginate(12);
			return view('designers', compact('designers'));
		} else {
			$designer = Designer::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('designers', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->paginate(10);
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
			$publishers = Publisher::where('status', '=', '1')->has('games')->with('games')->paginate(12);
			return view('publishers', compact('publishers'));
		} else {
			$publisher = Publisher::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('publishers', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->paginate(10);
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
			$mechanics = Mechanic::where('status', '=', '1')->has('games')->with('games')->paginate(12);
			return view('mechanics', compact('mechanics'));
		} else {
			$mechanic = Mechanic::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('mechanics', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->paginate(10);
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
			$themes = Theme::where('status', '=', '1')->has('games')->with('games')->paginate(12);
			return view('themes', compact('themes'));
		} else {
			$theme = Theme::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			$games = Game::where('status', '=', '1')->whereHas('themes', function($q) use($slug)
			{
			    $q->where('slug', '=', $slug);
			})->paginate(10);
			return view('theme', compact('theme', 'games'));
		}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function review($slug = null)
	{
		if($slug == null) {
			if(Request::has('sort'))
			{
			    $pieces = explode("-", Request::input('sort'));
			    $sort = $pieces[0];
			    $direction = $pieces[1];
			} else {
				$sort = 'published_at';
				$direction = 'desc';
			}
			$posts = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q)
			{
			    $q->where('slug', '=', 'reviews');
			})->orderBy($sort, $direction)->paginate(12);
			$category = Category::where('status', '=', '1')->where('slug', '=', 'reviews')->firstOrFail();	
			return view('reviews', compact('category','posts'));
		} else {
			$post = Post::where('status', '=', '1')->whereHas('category', function($q)
			{
			    $q->where('slug', '=', 'reviews');
			})->where('slug', '=', $slug)->firstOrFail();

			$games = Game::where('status', '=', '1')->whereHas('posts', function($q) use($post)
			{
				$q->where('name', '=', $post->name);			    	
			})->orderByRaw("RAND()")->get();
			return view('review', compact('post', 'games'));
		}

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function user($slug = null)
	{
		if($slug == null) {
			$users = User::where('status', '=', '1')->orderBy('name', 'asc')->has('posts')->with('posts')->paginate(12);
			return view('users', compact('users'));
		} else {
			$user = User::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
			if($user->role == 'a') {
				if(Request::has('sort'))
				{
				    $pieces = explode("-", Request::input('sort'));
				    $sort = $pieces[0];
				    $direction = $pieces[1];
				} else {
					$sort = 'published_at';
					$direction = 'desc';
				}
				$posts = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('user', function($q) use($slug)
				{
				    $q->where('slug', '=', $slug);
				})->orderBy($sort, $direction)->paginate(12);
				return view('contributor', compact('user', 'posts'));
			} else {
				if(Request::has('sort'))
				{
				    $pieces = explode("-", Request::input('sort'));
				    $sort = $pieces[0];
				    $direction = $pieces[1];
				} else {
					$sort = 'rating';
					$direction = 'desc';
				}

				$owned = Game::where('status', '=', '1')->with('types')->with('users')
				->whereHas('users', function($q) use($slug)
				{
				    $q->where('slug', '=', $slug);
				   	$q->where('type', '=', 'owned');		    
				})->orderBy($sort, $direction)->paginate(12);

				$wanted = Game::where('status', '=', '1')->with('types')->with('users')
				->whereHas('users', function($q) use($slug)
				{
				    $q->where('slug', '=', $slug);
				   	$q->where('type', '=', 'wanted');		    
				})->orderBy($sort, $direction)->get();				

				$total = Game::where('status', '=', '1')->whereHas('users', function($q) use($slug)
				{
				    $q->where('slug', '=', $slug);
				})->get();
				
				return view('user', compact('user', 'owned', 'wanted', 'total'));
			}
			
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
			if(Request::has('sort'))
			{
			    $pieces = explode("-", Request::input('sort'));
			    $sort = $pieces[0];
			    $direction = $pieces[1];
			} else {
				$sort = 'published_at';
				$direction = 'desc';
			}
			$posts = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->whereHas('category', function($q) use($category)
			{
			    $q->where('slug', '=', $category);
			})->orderBy($sort, $direction)->paginate(12);
			$category = Category::where('status', '=', '1')->where('slug', '=', $category)->firstOrFail();	
			return view('posts', compact('category','posts'));
		} else {
			$post = Post::where('status', '=', '1')->whereHas('category', function($q) use($category)
			{
			    $q->where('slug', '=', $category);
			})->where('slug', '=', $slug)->firstOrFail();

			$games = Game::where('status', '=', '1')->whereHas('posts', function($q) use($post)
			{
				$q->where('name', '=', $post->name);			    	
			})->orderByRaw("RAND()")->get();
			return view('post', compact('post', 'games'));
		}

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function store($slug = null)
	{
		if($slug == null) {
			$stores = Store::where('status', '=', '1')->orderBy('name', 'asc')->paginate(12);
			return view('stores', compact('stores'));
		} else {
			$store = Store::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();			
			return view('store', compact('store'));
		}
	}


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function category($slug)
	{
		$category = Category::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->where('slug', '=', $slug)->firstOrFail();
		return view('category', compact('category'));
	}

}
