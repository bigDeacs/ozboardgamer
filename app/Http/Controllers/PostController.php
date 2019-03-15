<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Game;
use App\User;
use Image;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        $categories = Category::where('status', '=', '1')->lists('name', 'id');
        $users = User::where('status', '=', '1')->where('role', '=', 'a')->lists('name', 'id');
        return view('posts.create', compact('categories', 'games', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());    
        $post->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(public_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(public_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $post->image = ('/uploads/' . $filename);
                $post->save();
            }
        }
        if($request->hasFile('thumb'))
        {
            $file2 = $request->file('thumb');
            if ($file2->isValid())
            {
                $thumb = Image::make($file2);
                $thumb->fit(600, 600);
                $thumb->interlace();
                $thumb->save(public_path() . '/uploads/' . $thumbname2 = time() . '-thumb-' . $file2->getClientOriginalName());

                $file2->move(public_path() . '/uploads/', ($filename2 = time() . '-' . $file2->getClientOriginalName()));
                $post->thumb = ('/uploads/' . $thumbname2);
                $post->save();
            }
        }
        if(is_array($request->input('game_list'))) {
            $currentGames = array_filter($request->input('game_list'), 'is_numeric');
            $newGames = array_diff($request->input('game_list'), $currentGames);
            foreach($newGames as $newGame)
            {
                if($game = Game::create(['name' => $newGame]))
                {
                    $newGames[] = $game->id;
                }
            }
        } else {
            $currentGames = [];
        }
        $post->games()->sync($currentGames);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', '=', $id)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        $categories = Category::where('status', '=', '1')->lists('name', 'id');
        $users = User::where('status', '=', '1')->where('role', '=', 'a')->lists('name', 'id');
        $post = Post::where('id', '=', $id)->firstOrFail();
        return view('posts.edit', compact('post', 'categories', 'games', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::where('id', '=', $id)->firstOrFail();
        $post->update($request->all());
        $post->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(public_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(public_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $post->image = ('/uploads/' . $filename);
                $post->save();
            }
        }
        if($request->hasFile('thumb'))
        {
            $file2 = $request->file('thumb');
            if ($file2->isValid())
            {
                $thumb = Image::make($file2);
                $thumb->fit(600, 600);
                $thumb->interlace();
                $thumb->save(public_path() . '/uploads/' . $thumbname2 = time() . '-thumb-' . $file2->getClientOriginalName());

                $file->move(public_path() . '/uploads/', ($filename2 = time() . '-' . $file2->getClientOriginalName()));
                $post->thumb = ('/uploads/' . $thumbname2);
                $post->save();
            }
        }

        if(is_array($request->input('game_list'))) {
            $currentGames = array_filter($request->input('game_list'), 'is_numeric');
            $newGames = array_diff($request->input('game_list'), $currentGames);
            foreach($newGames as $newGame)
            {
                if($game = Game::create(['name' => $newGame]))
                {
                    $currentGames[] = $game->id;
                }
            }
        } else {
            $currentGames = [];
        }
        $post->games()->sync($currentGames);

        return redirect('/admin/posts');
    }

    public function activate($id)
    {
        $post = Post::find($id);
        $post->status = 1;
        $post->save();

        return redirect('/admin/posts');
    }

    public function deactivate($id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->save();

        return redirect('/admin/posts');
    }


}
