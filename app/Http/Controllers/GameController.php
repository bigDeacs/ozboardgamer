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
        $themes = Theme::lists('name', 'id');
        $mechanics = Mechanic::lists('name', 'id');
        $types = Type::lists('name', 'id');
        $publishers = Publisher::lists('name', 'id');
        $families = Family::lists('name', 'id');
        return view('games.create', compact('themes', 'mechanics', 'types', 'families', 'publishers'));
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
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $file->move(public_path() . '/img/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/img/' . $filename);
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

        return redirect('/games');
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
        $themes = Theme::lists('name', 'id');
        $mechanics = Mechanic::lists('name', 'id');
        $types = Type::lists('name', 'id');
        $publishers = Publisher::lists('name', 'id');
        $families = Family::lists('name', 'id');
        $game = Game::where('id', '=', $id)->firstOrFail();
        return view('games.edit', compact('game', 'themes', 'mechanics', 'types', 'families', 'publishers'));
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
        $game->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $file->move(public_path() . '/img/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/img/' . $filename);
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

        return redirect('/games');
    }


}
