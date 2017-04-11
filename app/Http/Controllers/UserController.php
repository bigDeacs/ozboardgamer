<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\User;
use App\Game;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;

class UserController extends Controller
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
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('users.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->thumb = '-thumb-' . $user->image;
        $user->save();

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
                $user->image = ('/uploads/' . $filename);
                $user->thumb = ('/uploads/' . $thumbname);
                $user->save();
            }
        }

        if(is_array($request->input('game_list'))) {
            $currentGames = array_filter($request->input('game_list'), 'is_numeric');
        } else {
            $currentGames = [];
        }
        $user->games()->sync($currentGames);


        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        $games = Game::where('status', '=', '1')->lists('name', 'id');
        return view('users.edit', compact('user', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        $user->update($request->all());
        $user->save();

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
                $user->image = ('/uploads/' . $filename);
                $user->thumb = ('/uploads/' . $thumbname);
                $user->save();
            }
        }

        if(is_array($request->input('game_list'))) {
            $currentGames = array_filter($request->input('game_list'), 'is_numeric');
        } else {
            $currentGames = [];
        }
        $user->games()->sync($currentGames);

        return redirect('/admin/users');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return redirect('/admin/users');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        return redirect('/admin/users');
    }
	
	public function remove($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('/admin/users');
    }

}
