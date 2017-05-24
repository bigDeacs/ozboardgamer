<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Product;
use Storage;
use Artisan;
use Illuminate\Support\Facades\DB;
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
	
	public function remove($id)
    {
        $product = Product::where('id', '=', $id)->first();
		// initialize API Client & Index
        $client = new \AlgoliaSearch\Client("LAC06A9QLK", "9d6a129d0c8ce00eaf4ceb19b6ad1bab");
        $index = $client->initIndex('products');
		$params = [ "restrictSearchableAttributes": "name", "typoTolerance": "strict" ];
		$index->deleteByQuery($product->name, $params);
		DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/admin/products');
    }

    public function addToAlgolia() {
        // initialize API Client & Index
        $client = new \AlgoliaSearch\Client("LAC06A9QLK", "9d6a129d0c8ce00eaf4ceb19b6ad1bab");
        $index = $client->initIndex('products');

        $results = Product::where('price', '>', '0')->get();
        
        if ($results)
        {
            // iterate over results and send them by batch of 10000 elements
            foreach ($results as $row)
            {                              
                // select the identifier of this row
                if($row['sale'] > 0) {
                    $products[] = (array(
                        "objectID" => $row['id'],
                        "name" => $row['name'],
                        "price" => $row['saleDisplay'],                        
                        "slug" => $row['slug'],
                        "thumb" => $row['thumb1x']
                    ));
                } else {
                    $products[] = (array(
                        "objectID" => $row['id'],
                        "name" => $row['name'],
                        "price" => $row['priceDisplay'],                        
                        "slug" => $row['slug'],
                        "thumb" => $row['thumb1x']
                    ));
                }
                
            }

            $index->saveObjects($products);
        }
        return redirect('/admin/products');
    }


}
