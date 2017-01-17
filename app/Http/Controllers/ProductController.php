<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Product;
use Storage;
use Artisan;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('products.add');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        if($request->hasFile('csv'))
        {
            $file = $request->file('csv');
            if ($file->isValid())
            {
                $file->move(storage_path() . '/uploads/', 'products.csv');
            }
        }
        Artisan::call('db:seed');

        return redirect('/admin/products');
    }


}
