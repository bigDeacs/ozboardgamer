<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AwardRequest;
use App\Award;
use App\Game;
use Image;

use App\Http\Controllers\Controller;

class AwardController extends Controller
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
        $awards = Award::all();
        return view('awards.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('status', '=', '1')->lists('name', 'id');      
        return view('awards.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AwardRequest $request)
    {
        $award = Award::create($request->all());    
        $award->save();

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
                $award->image = ('/uploads/' . $filename);
                $award->thumb = ('/uploads/' . $thumbname);
                $award->save();
            }
        }

        return redirect('/admin/awards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $award = Award::where('id', '=', $id)->firstOrFail();
        return view('awards.show', compact('award'));
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
        $award = Award::where('id', '=', $id)->firstOrFail();
        return view('awards.edit', compact('games', 'award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AwardRequest $request, $id)
    {
        $award = Award::where('id', '=', $id)->firstOrFail();
        $award->update($request->all());
        $award->save();

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
                $award->image = ('/uploads/' . $filename);
                $award->thumb = ('/uploads/' . $thumbname);
                $award->save();
            }
        }

        return redirect('/admin/awards');
    }

    public function activate($id)
    {
        $award = Award::find($id);
        $award->status = 1;
        $award->save();

        return redirect('/admin/awards');
    }

    public function deactivate($id)
    {
        $award = Award::find($id);
        $award->status = 0;
        $award->save();

        return redirect('/admin/awards');
    }


}
