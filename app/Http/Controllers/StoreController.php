<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRequest;
use App\Store;
use Storage;
use Image;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToAlgolia() {
        // initialize API Client & Index
        $client = new \AlgoliaSearch\Client("LAC06A9QLK", "9d6a129d0c8ce00eaf4ceb19b6ad1bab");
        $index = $client->initIndex('stores');

        $results = Store::get();

        if ($results)
        {
            // iterate over results and send them by batch of 10000 elements
            foreach ($results as $row)
            {
                if ($row['status'] == 1) 
                {
                    if($row['state'] == 'ACT') {
                        $state = 'Australian Capital Territory';
                    } 
                    if($row['state'] == 'NSW') {
                        $state = 'New South Wales';
                    } 
                    if($row['state'] == 'NT') {
                        $state = 'Northern Territory';
                    } 
                    if($row['state'] == 'QLD') {
                        $state = 'Queensland';
                    } 
                    if($row['state'] == 'SA') {
                        $state = 'South Australia';
                    } 
                    if($row['state'] == 'TAS') {
                        $state = 'Tasmania';
                    } 
                    if($row['state'] == 'VIC') {
                        $state = 'Victoria';
                    } 
                    if($row['state'] == 'WA') {
                        $state = 'Western Australia';
                    } 
                    // select the identifier of this row
                    $index->saveObject(array(
                        "objectID" => $row['id'],
                        "name" => $row['name'], 
                        "slug" => "/stores/".$row['slug'],
                        "thumb" => $row['thumb'],
                        "street" => $row['street'],
                        "suburb" => $row['suburb'],
                        "state" => $state,
                        "abr" => $row['state'],
                        "postcode" => $row['postcode'],
                        "_geoloc" => array('lat' => $row['latitude'], 'lng' => $row['longitude'])
                    ));        
                } else {
                    // delete the record with objectID="myID1"
                    $index->deleteObject($row['id']);
                }
            }
        }
        return redirect('/admin/stores');
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $store = Store::create($request->all());
        $store->thumb = '-thumb-' . $store->image;
        $store->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 400);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $store->image = ('/uploads/' . $filename);
                $store->thumb = ('/uploads/' . $thumbname);
                $store->save();
            }
        }

        return redirect('/admin/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::where('id', '=', $id)->firstOrFail();
        return view('stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::where('id', '=', $id)->firstOrFail();
        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $store = Store::where('id', '=', $id)->firstOrFail();
        $store->update($request->all());
        $store->save();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if ($file->isValid())
            {
                $img = Image::make($file);
                $img->fit(400, 400);
                $img->interlace();
                $img->save(storage_path() . '/uploads/' . $thumbname = time() . '-thumb-' . $file->getClientOriginalName());

                $file->move(storage_path() . '/uploads/', ($filename = time() . '-' . $file->getClientOriginalName()));
                $store->image = ('/uploads/' . $filename);
                $store->thumb = ('/uploads/' . $thumbname);
                $store->save();
            }
        }

        return redirect('/admin/stores');
    }

    public function activate($id)
    {
        $store = Store::find($id);
        $store->status = 1;
        $store->save();

        return redirect('/admin/stores');
    }

    public function deactivate($id)
    {
        $store = Store::find($id);
        $store->status = 0;
        $store->save();

        return redirect('/admin/stores');
    }


}
