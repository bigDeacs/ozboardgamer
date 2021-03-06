<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MechanicRequest;
use App\Mechanic;
use App\Http\Controllers\Controller;

class MechanicController extends Controller
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
        $mechanics = Mechanic::all();
        return view('mechanics.index', compact('mechanics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MechanicRequest $request)
    {
        $mechanic = Mechanic::create($request->all());

        return redirect('/admin/mechanics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanic = Mechanic::where('id', '=', $id)->firstOrFail();
        return view('mechanics.show', compact('mechanic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanic = Mechanic::where('id', '=', $id)->firstOrFail();
        return view('mechanics.edit', compact('mechanic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MechanicRequest $request, $id)
    {
        $mechanic = Mechanic::where('id', '=', $id)->firstOrFail();
        $mechanic->update($request->all());
        $mechanic->save();

        return redirect('/admin/mechanics');
    }

    public function activate($id)
    {
        $mechanic = Mechanic::find($id);
        $mechanic->status = 1;
        $mechanic->save();

        return redirect('/admin/mechanics');
    }

    public function deactivate($id)
    {
        $mechanic = Mechanic::find($id);
        $mechanic->status = 0;
        $mechanic->save();

        return redirect('/admin/mechanics');
    }
}
