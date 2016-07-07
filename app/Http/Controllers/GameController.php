<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GameRequest;
use App\Game;
use App\Theme;
use App\Mechanic;
use App\Type;
use App\Designer;
use App\Publisher;
use App\Family;
use Storage;
use Image;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToAlgolia() {
        // initialize API Client & Index
        $client = new \AlgoliaSearch\Client("LAC06A9QLK", "9d6a129d0c8ce00eaf4ceb19b6ad1bab");
        $index = $client->initIndex('games');

        $results = Game::with('types')->get();

        if ($results)
        {
            // iterate over results and send them by batch of 10000 elements
            foreach ($results as $row)
            {
                if ($row['status'] == 1) 
                {
                    $mechanics = array();
                    foreach($row->mechanics()->get() as $mechanic) {
                        $mechanics[]["name"] = $mechanic->name;
                    };                    
                    $themes = array();
                    foreach($row->themes()->get() as $theme) {
                        $themes[]["name"] = $theme->name;
                    };
                    $types = array();
                    foreach($row->types()->get() as $type) {
                        $types[]["name"] = $type->name;
                    };
                    $designers = array();
                    foreach($row->designers()->get() as $designer) {
                        $designers[]["name"] = $designer->name;
                    };
                    $publishers = array();
                    foreach($row->publishers()->get() as $publisher) {
                        $publishers[]["name"] = $publisher->name;
                    };

                    // select the identifier of this row
                    $index->saveObject(array(
                        "objectID" => $row['id'],
                        "name" => $row['name'], 
                        "published_at" => $row['published_at'], 
                        "slug" => "/games/".$row->types()->firstOrFail()->slug."/".$row['slug'],
                        "thumb" => $row['thumb'],
                        "_mechanics" => $mechanics,
                        "_themes" => $themes,
                        "_types" => $types,
                        "_designers" => $designers,
                        "_publishers" => $publishers,
                        "rating" => floatval($row['rating'])
                    ));        
                } else {
                    // delete the record with objectID="myID1"
                    $index->deleteObject($row['id']);
                }
            }
        }
        return redirect('/admin/games');
    }

    public function rating($id, $luck, $strategy, $complexity, $replay, $components, $learning, $theming, $scaling)
    {   
        $game = Game::where('id', '=', $id)->with('users')->firstOrFail(); 
        $luck = $this->scale($luck);
        $strategy = $this->scale($strategy);
        $complexity = $this->scale($complexity);
        $total = ($luck + $strategy + $complexity + $replay + $components + $learning + $theming + $scaling)/4;

        $ratings = array();
        $users = $game->users()->wherePivot('type', 'rating')->get();
        $count = 1;
        foreach($users as $user) {
            $total = $total + $user->pivot->rating;
            $count++;
        }
        
        return $result = $total/$count;
    }

    public function scale($number)
    {   
        if($number == 0.5 || $number == 5) {
            return 1;
        }
        if($number == 1 || $number == 4.5) {
            return 2;
        }
        if($number == 1.5 || $number == 4) {
            return 3;
        }
        if($number == 2 || $number == 3.5) {
            return 4;
        }
        if($number == 2.5 || $number == 3) {
            return 5;
        }
        return $number;
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
        $designers = Designer::where('status', '=', '1')->lists('name', 'id');
        $publishers = Publisher::where('status', '=', '1')->lists('name', 'id');
        $families = Family::where('status', '=', '1')->lists('name', 'id');
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('games.create', compact('themes', 'mechanics', 'types', 'families', 'publishers', 'games', 'designers'));
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
        $game->rating = $this->rating($game->id, $game->luck, $game->strategy, $game->complexity, $game->replay, $game->components, $game->learning, $game->theming, $game->scaling);
        $game->save();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 400);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/uploads/' . $filename);
                $game->thumb = ('http://ozboardgamer.com/uploads/' . $thumbname);
                $game->save();
            }
        }
        if(is_array($request->input('theme_list'))) {
            $currentThemes = array_filter($request->input('theme_list'), 'is_numeric');
            $newThemes = array_diff($request->input('theme_list'), $currentThemes);   
            foreach($newThemes as $newTheme)
            {
                if($theme = Theme::create(['name' => $newTheme, 'slug' => str_slug($newTheme, "-"), 'status' => 1]))
                {
                    $currentThemes[] = "$theme->id";
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
                if($mechanic = Mechanic::create(['name' => $newMechanic, 'slug' => str_slug($newMechanic, "-"), 'status' => 1]))
                {
                    $currentMechanics[] = "$mechanic->id";
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
                if($type = Type::create(['name' => $newType, 'slug' => str_slug($newType, "-"), 'status' => 1]))
                {
                    $currentTypes[] = "$type->id";
                }
            }
        } else {
            $currentTypes = [];
        }
        $game->types()->sync($currentTypes);

        if(is_array($request->input('publisher_list'))) {
            $currentPublishers = array_filter($request->input('publisher_list'), 'is_numeric');
            $newPublishers = array_diff($request->input('publisher_list'), $currentPublishers);   
            foreach($newPublishers as $newPublisher)
            {
                if($publisher = Publisher::create(['name' => $newPublisher, 'slug' => str_slug($newPublisher, "-"), 'status' => 1]))
                {
                    $currentPublishers[] = "$publisher->id";
                }
            }
        } else {
            $currentPublishers = [];
        }
        $game->publishers()->sync($currentPublishers);

        if(is_array($request->input('designer_list'))) {
            $currentDesigners = array_filter($request->input('designer_list'), 'is_numeric');
            $newDesigners = array_diff($request->input('designer_list'), $currentDesigners);   
            foreach($newDesigners as $newDesigner)
            {
                if($designer = Designer::create(['name' => $newDesigner, 'slug' => str_slug($newDesigner, "-"), 'status' => 1]))
                {
                    $currentDesigners[] = "$designer->id";
                }
            }
        } else {
            $currentDesigners = [];
        }
        $game->designers()->sync($currentDesigners);

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
        $designers = Designer::where('status', '=', '1')->lists('name', 'id');
        $publishers = Publisher::where('status', '=', '1')->lists('name', 'id');
        $families = Family::where('status', '=', '1')->lists('name', 'id');
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        $game = Game::where('id', '=', $id)->firstOrFail();
        return view('games.edit', compact('game', 'themes', 'mechanics', 'types', 'families', 'publishers', 'games', 'designers'));
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
        $game->rating = $this->rating($game->id, $game->luck, $game->strategy, $game->complexity, $game->replay, $game->components, $game->learning, $game->theming, $game->scaling);
        $game->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 400);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $game->image = ('http://ozboardgamer.com/uploads/' . $filename);
                $game->thumb = ('http://ozboardgamer.com/uploads/' . $thumbname);
                $game->save();
            }
        }

        if(is_array($request->input('theme_list'))) {
            $request->input('theme_list');
            $currentThemes = array_filter($request->input('theme_list'), 'is_numeric');
            $newThemes = array_diff($request->input('theme_list'), $currentThemes);
            foreach($newThemes as $newTheme)
            {
                if($theme = Theme::create(['name' => $newTheme, 'slug' => str_slug($newTheme, "-"), 'status' => 1]))
                {
                    $currentThemes[] = "$theme->id";
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
                if($mechanic = Mechanic::create(['name' => $newMechanic, 'slug' => str_slug($newMechanic, "-"), 'status' => 1]))
                {
                    $currentMechanics[] = "$mechanic->id";
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
                if($type = Type::create(['name' => $newType, 'slug' => str_slug($newType, "-"), 'status' => 1]))
                {
                    $currentTypes[] = "$type->id";
                }
            }
        } else {
            $currentTypes = [];
        }
        $game->types()->sync($currentTypes);

        if(is_array($request->input('publisher_list'))) {
            $currentPublishers = array_filter($request->input('publisher_list'), 'is_numeric');
            $newPublishers = array_diff($request->input('publisher_list'), $currentPublishers);   
            foreach($newPublishers as $newPublisher)
            {
                if($publisher = Publisher::create(['name' => $newPublisher, 'slug' => str_slug($newPublisher, "-"), 'status' => 1]))
                {
                    $currentPublishers[] = "$publisher->id";
                }
            }
        } else {
            $currentPublishers = [];
        }
        $game->publishers()->sync($currentPublishers);

        if(is_array($request->input('designer_list'))) {
            $currentDesigners = array_filter($request->input('designer_list'), 'is_numeric');
            $newDesigners = array_diff($request->input('designer_list'), $currentDesigners);   
            foreach($newDesigners as $newDesigner)
            {
                if($designer = Designer::create(['name' => $newDesigner, 'slug' => str_slug($newDesigner, "-"), 'status' => 1]))
                {
                    $currentDesigners[] = "$designer->id";
                }
            }
        } else {
            $currentDesigners = [];
        }
        $game->designers()->sync($currentDesigners);

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
