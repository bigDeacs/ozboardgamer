<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TypeRequest;
use App\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
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
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $type = Type::create($request->all());

        return redirect('/admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::where('id', '=', $id)->firstOrFail();
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::where('id', '=', $id)->firstOrFail();
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $type = Type::where('id', '=', $id)->firstOrFail();
        $type->update($request->all());
        $type->save();

        return redirect('/admin/types');
    }

    public function activate($id)
    {
        $type = Type::find($id);
        $type->status = 1;
        $type->save();

        return redirect('/admin/types');
    }

    public function deactivate($id)
    {
        $type = Type::find($id);
        $type->status = 0;
        $type->save();

        return redirect('/admin/types');
    }
}
