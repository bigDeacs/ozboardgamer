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

    public function addToAlgolia() {
        // initialize API Client & Index
        $client = new \AlgoliaSearch\Client("LAC06A9QLK", "9d6a129d0c8ce00eaf4ceb19b6ad1bab");
        $index = $client->initIndex('products');

        $results = Product::get();

        if ($results)
        {
            // iterate over results and send them by batch of 10000 elements
            foreach ($results as $row)
            {
                if ($row['status'] == 1)
                {                
                    // select the identifier of this row
                    $index->saveObject(array(
                        "objectID" => $row['id'],
                        "name" => $row['name'],
                        "savings" => $row['savings'],
                        "sale" => $row['sale'],
                        "price" => $row['price'],
                        "slug" => $row['slug'],
                        "thumb" => $row['thumb1x']
                    ));
                } else {
                    // delete the record with objectID="myID1"
                    $index->deleteObject($row['id']);
                }
            }
        }
        return redirect('/admin/products');
    }


}
