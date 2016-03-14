<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GameRequest;
use App\Game;
use App\Theme;
use App\Mechanic;
use App\Type;
use App\Publisher;
use App\Family;
use Storage;
use App\Http\Controllers\Controller;

class GameController extends Controller
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
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::where('status', '=', '1')->lists('name', 'id');
        $mechanics = Mechanic::where('status', '=', '1')->lists('name', 'id');
        $types = Type::where('status', '=', '1')->lists('name', 'id');
        $publishers = Publisher::where('status', '=', '1')->lists('name', 'id');
        $families = Family::where('status', '=', '1')->lists('name', 'id');
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('games.create', compact('themes', 'mechanics', 'types', 'families', 'publishers', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $game = Game::create($request->all());
        $rating = ($game->luck + $game->strategy + $game->complexity + $game->replay + $game->components + $game->learning)/3;
        $game->rating = $rating;
        $game->save();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/uploads/' . $filename);
                $game->save();
            }
        }
        if(is_array($request->input('theme_list'))) {
            $currentThemes = array_filter($request->input('theme_list'), 'is_numeric');
            $newThemes = array_diff($request->input('theme_list'), $currentThemes);   
            foreach($newThemes as $newTheme)
            {
                if($theme = Theme::create(['name' => $newTheme]))
                {
                    $newThemes[] = $theme->id;
                }
            }
        } else {
            $currentThemes = [];
        }
        $game->themes()->sync($currentThemes);

        if(is_array($request->input('mechanic_list'))) {
            $currentMechanics = array_filter($request->input('mechanic_list'), 'is_numeric');
            $newMechanics = array_diff($request->input('mechanic_list'), $currentMechanics);   
            foreach($newMechanics as $newMechanic)
            {
                if($mechanic = Mechanic::create(['name' => $newMechanic]))
                {
                    $currentMechanics[] = $mechanic->id;
                }
            }
        } else {
            $currentMechanics = [];
        }
        $game->mechanics()->sync($currentMechanics);

        if(is_array($request->input('type_list'))) {
            $currentTypes = array_filter($request->input('type_list'), 'is_numeric');
            $newTypes = array_diff($request->input('type_list'), $currentTypes);   
            foreach($newTypes as $newType)
            {
                if($type = Type::create(['name' => $newType]))
                {
                    $currentTypes[] = $type->id;
                }
            }
        } else {
            $currentTypes = [];
        }
        $game->types()->sync($currentTypes);

        return redirect('/admin/games');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::where('id', '=', $id)->firstOrFail();
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $themes = Theme::where('status', '=', '1')->lists('name', 'id');
        $mechanics = Mechanic::where('status', '=', '1')->lists('name', 'id');
        $types = Type::where('status', '=', '1')->lists('name', 'id');
        $publishers = Publisher::where('status', '=', '1')->lists('name', 'id');
        $families = Family::where('status', '=', '1')->lists('name', 'id');
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        $game = Game::where('id', '=', $id)->firstOrFail();
        return view('games.edit', compact('game', 'themes', 'mechanics', 'types', 'families', 'publishers', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, $id)
    {
        $game = Game::where('id', '=', $id)->firstOrFail();
        $game->update($request->all());
        $rating = ($game->luck + $game->strategy + $game->complexity + $game->replay + $game->components + $game->learning)/3;
        $game->rating = $rating;
        $game->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/uploads/' . $filename);
                $game->save();
            }
        }

        if(is_array($request->input('theme_list'))) {
            $currentThemes = array_filter($request->input('theme_list'), 'is_numeric');
            $newThemes = array_diff($request->input('theme_list'), $currentThemes);   
            foreach($newThemes as $newTheme)
            {
                if($theme = Theme::create(['name' => $newTheme]))
                {
                    $currentThemes[] = $theme->id;
                }
            }
        } else {
            $currentThemes = [];
        }
        $game->themes()->sync($currentThemes);

        if(is_array($request->input('mechanic_list'))) {
            $currentMechanics = array_filter($request->input('mechanic_list'), 'is_numeric');
            $newMechanics = array_diff($request->input('mechanic_list'), $currentMechanics);   
            foreach($newMechanics as $newMechanic)
            {
                if($mechanic = Mechanic::create(['name' => $newMechanic]))
                {
                    $currentMechanics[] = $mechanic->id;
                }
            }
        } else {
            $currentMechanics = [];
        }
        $game->mechanics()->sync($currentMechanics);

        if(is_array($request->input('type_list'))) {
            $currentTypes = array_filter($request->input('type_list'), 'is_numeric');
            $newTypes = array_diff($request->input('type_list'), $currentTypes);   
            foreach($newTypes as $newType)
            {
                if($type = Type::create(['name' => $newType]))
                {
                    $currentTypes[] = $type->id;
                }
            }
        } else {
            $currentTypes = [];
        }
        $game->types()->sync($currentTypes);

        return redirect('/admin/games');
    }

    public function activate($id)
    {
        $game = Game::find($id);
        $game->status = 1;
        $game->save();

        return redirect('/admin/games');
    }

    public function deactivate($id)
    {
        $game = Game::find($id);
        $game->status = 0;
        $game->save();

        return redirect('/admin/games');
    }


}
