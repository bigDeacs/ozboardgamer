<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DesignerRequest;
use App\Designer;
use App\Http\Controllers\Controller;

class DesignerController extends Controller
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
        $designers = Designer::all();
        return view('designers.index', compact('designers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignerRequest $request)
    {
        $designer = Designer::create($request->all());

        return redirect('/admin/designers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $designer = Designer::where('id', '=', $id)->firstOrFail();
        return view('designers.show', compact('designer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designer = Designer::where('id', '=', $id)->firstOrFail();
        return view('designers.edit', compact('designer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignerRequest $request, $id)
    {
        $designer = Designer::where('id', '=', $id)->firstOrFail();
        $designer->update($request->all());
        $designer->save();

        return redirect('/admin/designers');
    }

    public function activate($id)
    {
        $designer = Designer::find($id);
        $designer->status = 1;
        $designer->save();

        return redirect('/admin/designers');
    }

    public function deactivate($id)
    {
        $mechanic = Designer::find($id);
        $mechanic->status = 0;
        $mechanic->save();

        return redirect('/admin/designers');
    }
}
