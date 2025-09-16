<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\students;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $track = new Track();
        $track->name = $request->name;
        $track->description = $request->description;

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $track->image_path = 'images/' . $imageName;
        }

        $track->save();

        return redirect()->route('tracks.index')->with('success', 'tracks Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $track = Track::findOrFail($id);
        $track->name = $request->name;
        $track->description = $request->description;

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $track->image_path = 'images/' . $imageName;
        }
        $track->save();
        return redirect()->route('tracks.index')->with('success', 'tracks Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        return redirect()->route('tracks.index')->with('success', 'tracks Deleted Successfully!');
    }
}
