<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ArchetypeRequest;
use App\Archetype;
use App\Game;
use Image;
use App\Http\Controllers\Controller;

class ArchetypeController extends Controller
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
        $archetypes = Archetype::all();
        return view('archetypes.index', compact('archetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('archetypes.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArchetypeRequest $request)
    {
        $archetype = Archetype::create($request->all());
        $archetype->thumb = '-thumb-' . $archetype->image;
        $archetype->save();

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
                $archetype->image = ('/uploads/' . $filename);
                $archetype->thumb = ('/uploads/' . $thumbname);
                $archetype->save();
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
        $archetype->games()->sync($currentGames);

        return redirect('/admin/archetypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archetype = Archetype::where('id', '=', $id)->firstOrFail();
        return view('archetypes.show', compact('archetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archetype = Archetype::where('id', '=', $id)->firstOrFail();
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('archetypes.edit', compact('archetypes', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchetypeRequest $request, $id)
    {
        $archetype = Archetype::where('id', '=', $id)->firstOrFail();
        $archetype->update($request->all());
        $archetype->save();

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
                $archetype->image = ('/uploads/' . $filename);
                $archetype->thumb = ('/uploads/' . $thumbname);
                $archetype->save();
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
        $archetype->games()->sync($currentGames);

        return redirect('/admin/archetypes');
    }

    public function activate($id)
    {
        $archetype = Archetype::find($id);
        $archetype->status = 1;
        $archetype->save();

        return redirect('/admin/archetypes');
    }

    public function deactivate($id)
    {
        $archetype = Archetype::find($id);
        $archetype->status = 0;
        $archetype->save();

        return redirect('/admin/archetypes');
    }
}
