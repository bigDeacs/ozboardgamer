<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PublisherRequest;
use App\Publisher;
use App\Http\Controllers\Controller;

class PublisherController extends Controller
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
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        $publisher = Publisher::create($request->all());

        return redirect('/admin/publishers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publisher = Publisher::where('id', '=', $id)->firstOrFail();
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publisher = Publisher::where('id', '=', $id)->firstOrFail();
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, $id)
    {
        $publisher = Publisher::where('id', '=', $id)->firstOrFail();
        $publisher->update($request->all());
        $publisher->save();

        return redirect('/admin/publishers');
    }

    public function activate($id)
    {
        $publisher = Publisher::find($id);
        $publisher->status = 1;
        $publisher->save();

        return redirect('/admin/publishers');
    }

    public function deactivate($id)
    {
        $publisher = Publisher::find($id);
        $publisher->status = 0;
        $publisher->save();

        return redirect('/admin/publishers');
    }
}
