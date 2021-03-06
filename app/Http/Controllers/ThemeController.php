<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ThemeRequest;
use App\Theme;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
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
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemeRequest $request)
    {
        $theme = Theme::create($request->all());

        return redirect('/admin/themes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::where('id', '=', $id)->firstOrFail();
        return view('themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::where('id', '=', $id)->firstOrFail();
        return view('themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThemeRequest $request, $id)
    {
        $theme = Theme::where('id', '=', $id)->firstOrFail();
        $theme->update($request->all());
        $theme->save();

        return redirect('/admin/themes');
    }

    public function activate($id)
    {
        $theme = Theme::find($id);
        $theme->status = 1;
        $theme->save();

        return redirect('/admin/themes');
    }

    public function deactivate($id)
    {
        $theme = Theme::find($id);
        $theme->status = 0;
        $theme->save();

        return redirect('/admin/themes');
    }
}
