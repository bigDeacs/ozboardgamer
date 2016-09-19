<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OfferRequest;
use App\Offer;
use App\Http\Controllers\Controller;

class OfferController extends Controller
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
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $offer = Offer::create($request->all());

        return redirect('/admin/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::where('id', '=', $id)->firstOrFail();
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::where('id', '=', $id)->firstOrFail();
        return view('offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $offer = Offer::where('id', '=', $id)->firstOrFail();
        $offer->update($request->all());
        $offer->save();

        return redirect('/admin/offers');
    }

    public function activate($id)
    {
        $offer = Offer::find($id);
        $offer->status = 1;
        $offer->save();

        return redirect('/admin/offers');
    }

    public function deactivate($id)
    {
        $offer = Offer::find($id);
        $offer->status = 0;
        $offer->save();

        return redirect('/admin/offers');
    }
}
