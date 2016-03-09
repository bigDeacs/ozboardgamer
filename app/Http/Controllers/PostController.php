<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Game;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

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
        $games = Game::lists('name', 'id');
        $categories = Category::lists('name', 'id');
        return view('posts.create', compact('categories', 'games'));
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

        return redirect('/posts');
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
        $games = Game::lists('name', 'id');
        $categories = Category::lists('name', 'id');
        $post = Post::where('id', '=', $id)->firstOrFail();
        return view('posts.edit', compact('post', 'categories', 'games'));
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

        return redirect('/posts');
    }

    public function activate($id)
    {
        $post = Post::find($id);
        $post->status = 1;
        $post->save();

        return redirect('posts');
    }

    public function deactivate($id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->save();

        return redirect('posts');
    }


}