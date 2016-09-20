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
use App\Quiz;
use App\Question;
use App\Answer;
use App\Result;
use App\Offer;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\QuizResultRequest;
use Request;
use Storage;
use Session;
use App;
use View;

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

		public function __construct()
	  {
	    $offers = Offer::where('status', '=', '1')->where('start_at', '<=', date('Y-m-d'))->orderBy('end_at', 'desc')->get();
	    View::share('offers', $offers);
	  }

		/**
		 * Add to mailchimp
		 *
		 * @return Response
		 */
		public function syncMailchimp($email, $fname, $lname, $gender){
				$apikey = "1870ebc0089c8fd4e8f17a3449fd2f12-us13"; // api key
				$list_id = "7665e21b2b"; // web site list
				$auth = base64_encode( 'user:'.$apikey );

				$data = array(
					'apikey'        => $apikey,
					'email_address' => $email,
					'status'        => 'subscribed', // "subscribed","unsubscribed","cleaned","pending"
					'merge_fields'  => array(
						'FNAME'     => $fname,
						'LNAME'     => $lname,
						'GENDER'     => $gender,
				 	)
				);
				$json_data = json_encode($data);

				$ch = curl_init();

				$curlopt_url = "https://us13.api.mailchimp.com/3.0/lists/$list_id/members/";
				curl_setopt($ch, CURLOPT_URL, $curlopt_url);

				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
				    'Authorization: Basic '.$auth));
				curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

				$result = curl_exec($ch);

			 	$status = "undefined";
				$msg = "unknown error occurred";
				$myArray = json_decode($result, true);
		}

		/**
		 * Show the application welcome screen to the user.
		 *
		 * @return Response
		 */
		public function login()
		{
			return view('login');
		}

		public function loginRequest(LoginRequest $request)
		{
				$create = User::firstOrCreate(['name' => $request['name'], 'slug' => str_slug($request['name']), 'image' => '', 'email' => $request['email'], 'password' => $request['password'], 'role' => 'b', 'status' => 1]);
				$this->syncMailchimp($email, $fname, $lname, null);

				Session::put('id', $create->id);
				Session::put('name', $create->name);
				Session::put('email', $create->email);
				Session::put('thumb', $create->thumb);

				return redirect()->back();
				dd($request);
				return redirect('/results/'.$result->slug);
		}


	  /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')
								->fields(['first_name', 'last_name', 'email', 'gender'])
								->redirect();
    }

		/**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')
								->fields(['first_name', 'last_name', 'email', 'gender'])
								->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback()
    {
    	$user = Socialite::driver('facebook')
							->fields(['name', 'email', 'gender', 'verified', 'first_name', 'last_name'])
							->scopes(['email'])
							->user();

			// OAuth Two Providers
			$token = $user->token;
			$refreshToken = $user->refreshToken; // not always provided
			$expiresIn = $user->expiresIn;

			$id = $user->getId();
			$email = $user->getEmail();
			$name = $user->getName();
			$thumb = $user->getAvatar();

			$fname = $user['first_name'];
			$lname = $user['last_name'];
			$gender = $user['gender'];

	    $create = User::firstOrCreate(['name' => $name, 'slug' => str_slug($name), 'image' => $thumb, 'email' => $email, 'password' => 'password', 'role' => 'b', 'status' => 1]);
			$this->syncMailchimp($email, $fname, $lname, $gender);

			Session::put('id', $create->id);
			Session::put('name', $create->name);
			Session::put('email', $create->email);
			Session::put('thumb', $create->thumb);

			return redirect()->back();
    }

		/**
		 * Obtain the user information from Facebook.
		 *
		 * @return Response
		 */
		public function handleGoogleProviderCallback()
		{
			$user = Socialite::driver('google')
							->fields(['name', 'email', 'gender', 'verified', 'first_name', 'last_name'])
							->scopes(['profile', 'email'])
							->user();

			// OAuth Two Providers
			$token = $user->token;
			$refreshToken = $user->refreshToken; // not always provided
			$expiresIn = $user->expiresIn;

			$id = $user->getId();
			$email = $user->getEmail();
			$name = $user->getName();
			$thumb = $user->getAvatar();

			$fname = $user['first_name'];
			$lname = $user['last_name'];
			$gender = $user['gender'];

			$create = User::firstOrCreate(['name' => $name, 'slug' => str_slug($name), 'image' => $thumb, 'email' => $email, 'password' => 'password', 'role' => 'b', 'status' => 1]);
			$this->syncMailchimp($email, $fname, $lname, $gender);

			Session::put('id', $create->id);
			Session::put('name', $create->name);
			Session::put('email', $create->email);
			Session::put('thumb', $create->thumb);

			return redirect()->back();
		}

    /**
     * Destroy session data.
     *
     * @return Response
     */
    public function logout()
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

   		$this->syncGameRatings($game);

			return redirect()->back();
    }

    public function updateGameRating($id, $game, $rating)
    {
    	$user = User::where('slug', '=', $id)->with('games')->firstOrFail();
    	$user->games()->wherePivot('type', 'rating')->updateExistingPivot($game, ['rating' => $rating]);

    	$this->syncGameRatings($game);

			return redirect()->back();
    }


    public function syncGameRatings($id)
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

    public function addStoreRating($id, $store, $rating)
    {
    	$user = User::where('slug', '=', $id)->with('stores')->firstOrFail();
   		$user->stores()->attach($store, ['type' => 'rating', 'rating' => $rating]);

   		$this->syncStoreRatings($store);

		return redirect()->back();
    }

    public function updateStoreRating($id, $store, $rating)
    {
    	$user = User::where('slug', '=', $id)->with('stores')->firstOrFail();
    	$user->stores()->wherePivot('type', 'rating')->updateExistingPivot($store, ['rating' => $rating]);

    	$this->syncStoreRatings($store);

		return redirect()->back();
    }


    public function syncStoreRatings($id)
    {
        $store = Store::where('id', '=', $id)->with('users')->firstOrFail();
        $total = $store->rating;

        $users = $store->users()->wherePivot('type', 'rating')->get();

        $count = 1;
        foreach($users as $user) {
            $total += $user->pivot->rating;
            $count++;
        }

        $store->rating = $total/$count;
        $store->save();
    }

		public function sitemap()
		{
			// create new sitemap object
	    $sitemap = App::make("sitemap");

	    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
	    // by default cache is disabled
	    ## $sitemap->setCache('laravel.sitemap', 60);

			// check if there is cached sitemap and build new only if is not
	    if (!$sitemap->isCached())
	    {

         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(secure_url('/'), date("Y/m/d"), '1.0', 'daily');

         // get dynamic data from db
				 $posts = Post::where('status', '=', '1')->where('published_at', '<=', date('Y-m-d'))->get();
				 $categories = Category::where('status', '=', '1')->get();
		 		 $games = Game::where('status', '=', '1')->get();
				 $types = Type::where('status', '=', '1')->get();
				 $mechanics = Mechanic::where('status', '=', '1')->get();
				 $themes = Theme::where('status', '=', '1')->get();
				 $designers = Designer::where('status', '=', '1')->get();
				 $publishers = Publisher::where('status', '=', '1')->get();
				 $families = Family::where('status', '=', '1')->get();
		 		 $stores = Store::where('status', '=', '1')->get();
				 $quizzes = Quiz::where('status', '=', '1')->get();

         // add every post to the sitemap

				 $sitemap->add(secure_url('/games'), date("Y/m/d"), '0.9', 'daily');
				 foreach ($types as $type)
         {
            $sitemap->add(secure_url('/games') . '/' . $type->slug, $type->updated_at, '0.8', 'weekly');
         }
				 foreach ($games as $game)
         {
            $sitemap->add(secure_url('/games') . '/' . $game->types()->first()->slug . '/' . $game->slug, $game->updated_at->format('Y/m/d'), '0.7', 'weekly');
         }
				 $sitemap->add(secure_url('/mechanics'), date("Y/m/d"), '0.6', 'daily');
				 foreach ($mechanics as $mechanic)
         {
            $sitemap->add(secure_url('/mechanics') . '/' . $mechanic->slug, $mechanic->updated_at, '0.5', 'weekly');
         }
				 $sitemap->add(secure_url('/themes'), date("Y/m/d"), '0.6', 'daily');
				 foreach ($themes as $theme)
         {
            $sitemap->add(secure_url('/themes') . '/' . $theme->slug, $theme->updated_at, '0.5', 'weekly');
         }
				 $sitemap->add(secure_url('/designers'), date("Y/m/d"), '0.6', 'daily');
				 foreach ($designers as $designer)
         {
            $sitemap->add(secure_url('/designers') . '/' . $designer->slug, $designer->updated_at, '0.5', 'weekly');
         }
				 $sitemap->add(secure_url('/publishers'), date("Y/m/d"), '0.6', 'daily');
				 foreach ($publishers as $publisher)
         {
            $sitemap->add(secure_url('/publishers') . '/' . $publisher->slug, $publisher->updated_at, '0.5', 'weekly');
         }
				 $sitemap->add(secure_url('/families'), date("Y/m/d"), '0.6', 'daily');
				 foreach ($families as $family)
         {
            $sitemap->add(secure_url('/families') . '/' . $family->slug, $family->updated_at, '0.5', 'weekly');
         }

				 foreach ($posts as $post)
         {
            $sitemap->add(secure_url('/') . '/' . $post->category()->first()->slug . '/' . $post->slug, $post->updated_at, '0.6', 'weekly');
         }
				 foreach ($categories as $category)
         {
            $sitemap->add(secure_url('/') . '/' . $category->slug, $category->updated_at, '0.7', 'weekly');
         }

				 $sitemap->add(secure_url('/stores'), date("Y/m/d"), '0.8', 'daily');
				 foreach ($stores as $store)
         {
            $sitemap->add(secure_url('/stores') . '/' . $store->slug, $store->updated_at, '0.7', 'monthly');
         }

				 $sitemap->add(secure_url('/quizzes'), date("Y/m/d"), '0.8', 'daily');
				 foreach ($quizzes as $quiz)
         {
            $sitemap->add(secure_url('/quizzes') . '/' . $quiz->slug, $quiz->updated_at, '0.7', 'monthly');
         }
			}

			return $sitemap->render('xml');

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
		$games = Game::where('status', '=', '1')->has('parent', '<', '1')->has('types')->orderBy('rating', 'desc')->take(10)->get();
		$stores = Store::where('status', '=', '1')->orderBy('rating', 'desc')->take(10)->get();
		return view('index', compact('featured', 'reviews', 'howtos', 'top10s', 'news', 'blogs', 'games', 'stores'));
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
			if(Request::has('sort'))
			{
			    $pieces = explode("-", Request::input('sort'));
			    $sort = $pieces[0];
			    $direction = $pieces[1];
			} else {
				$sort = 'rating';
				$direction = 'desc';
			}
			$stores = Store::where('status', '=', '1')->orderBy($sort, $direction)->paginate(12);
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
	public function quiz($slug = null)
	{
			if($slug == null) {
				$quizzes = Quiz::where('status', '=', '1')->orderBy('name', 'asc')->paginate(12);
				return view('quizzes', compact('quizzes'));
			} else {
				$quiz = Quiz::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
				$questions = Question::where('status', '=', '1')->where('quiz_id', '=', $quiz->id)->orderByRaw("RAND()")->take($quiz->limit)->get();
				return view('quiz', compact('quiz', 'questions'));
			}
	}

	public function quizRequest(QuizResultRequest $request)
	{
			$result = array_count_values($request['questions']);
			asort($result);
			end($result);
			$answer = key($result);

			$counts = array_count_values($request['questions']);
			arsort($counts);
			list($result1) = array_slice($counts, 0, 1);
			list($result2) = array_slice($counts, 1, 1);
			if($result1 == $result2) {
				$array = array($result1, $result2);
				$result = Result::find($array[rand(0, count($array) - 1)]);
			} else {
					$result = Result::find($result1);
			}
			return redirect('/results/'.$result->slug);
		}

		/**
		 * Show the application welcome screen to the user.
		 *
		 * @return Response
		 */
		public function result($slug)
		{
				$result = Result::where('status', '=', '1')->where('slug', '=', $slug)->firstOrFail();
				$games = Game::where('status', '=', '1')->whereHas('results', function($q) use($result)
				{
					$q->where('name', '=', $result->name);
				})->orderByRaw("RAND()")->get();
				return view('result', compact('result', 'games'));
		}


}
