<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks=Track::all();
        return view('track.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('track.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         // dump($_REQUEST);
        // dump(request()->all());
        $requestedData=$request->validate([
           'name'=>'required|min:2',
           'name'=>'unique:tracks,name',
           'description'=>'required|unique:tracks,description',
           'image'=>'required',

        ],[
            // message
             'name.required'=>'name is required',
             'description.required'=>'name is required',
             'name.min'=>'name is must br more than 2 characters',
             'email.unique'=>'email is already exist',
             'image.required'=>'image is required',
             'description.required'=>'description is required',
        ]);
        // dump($requestedData);
        Track::create($requestedData);
        return to_route('tracks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        // Track $track ===> track Data
        // == $track ==> id
        // find or fail ==> data
        /**
         * $track=Track::findOrFail($id)// $track
         * ==>> check $id ==> Data of Track
         * ===> not Exist ==> 404
         */
     return view('track.show',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
        $track->delete();
        return to_route('tracks.index');
    }
}
