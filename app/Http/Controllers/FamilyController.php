<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FamilyRequest;
use App\Family;
use App\Http\Controllers\Controller;

class FamilyController extends Controller
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
        $families = Family::all();
        return view('families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('families.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyRequest $request)
    {
        $family = Family::create($request->all());

        return redirect('/families');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $family = Family::where('id', '=', $id)->firstOrFail();
        return view('families.show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = Family::where('id', '=', $id)->firstOrFail();
        return view('families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyRequest $request, $id)
    {
        $family = Family::where('id', '=', $id)->firstOrFail();
        $family->update($request->all());
        $family->save();

        return redirect('/families');
    }

    public function activate($id)
    {
        $family = Family::find($id);
        $family->status = 1;
        $family->save();

        return redirect('/admin/families');
    }

    public function deactivate($id)
    {
        $family = Family::find($id);
        $family->status = 0;
        $family->save();

        return redirect('/admin/families');
    }
}
