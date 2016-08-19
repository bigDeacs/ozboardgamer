<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ResultRequest;
use App\Result;
use App\Quiz;
use App\Game;
use Image;
use App\Http\Controllers\Controller;

class ResultController extends Controller
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
    public function index($quizId)
    {
        $results = Result::where('quiz_id', '=', $quizId)->get();
        return view('results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quizId)
    {
        $quiz = Quiz::find($quizId);
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('results.create', compact('quiz', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request, $quizId)
    {
        $result = Result::create($request->all());
        $result->thumb = '-thumb-' . $archetype->image;
        $result->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $result->image = ('/uploads/' . $filename);
                $result->thumb = ('/uploads/' . $thumbname);
                $result->save();
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
        $result->games()->sync($currentGames);

        return redirect('/admin/quizzes/'.$quizId.'/results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::where('id', '=', $id)->firstOrFail();
        return view('results.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quizId, $id)
    {
        $result = Result::where('id', '=', $id)->firstOrFail();
        $quiz = Quiz::find($quizId);
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('results.edit', compact('result', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResultRequest $request, $quizId, $id)
    {
        $result = Result::where('id', '=', $id)->firstOrFail();
        $result->update($request->all());
        $result->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 148);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $result->image = ('/uploads/' . $filename);
                $result->thumb = ('/uploads/' . $thumbname);
                $result->save();
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
        $result->games()->sync($currentGames);

        return redirect('/admin/quizzes/'.$quizId.'/results');
    }

    public function activate($quizId, $id)
    {
        $result = Result::find($id);
        $result->status = 1;
        $result->save();

        return redirect('/admin/quizzes/'.$quizId.'/results');
    }

    public function deactivate($quizId, $id)
    {
        $result = Result::find($id);
        $result->status = 0;
        $result->save();

        return redirect('/admin/quizzes/'.$quizId.'/results');
    }
}
