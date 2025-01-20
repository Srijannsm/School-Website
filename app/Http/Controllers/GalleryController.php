<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Gallery::all();
        return view('gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('ok');
        // dd($request);
        // Validate the input: Ensure that 'image' is required
        $request->validate([
            'title' => 'required|string|max:255',  // Ensure title is provided
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',  // Image is required
        ]);

        // Handle the image file upload (since it's required)
        $imagePath = $request->file('image')->store('images', 'public'); // Store the image and get the path

        // dd($imagePath);
        // Create the new gallery item record
        Gallery::create([
            'title' => $request->title,  // Store the title
            'image' => $imagePath,  // Store the image path
        ]);

        // Redirect with a success message
        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);

        // Delete the image record
        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'image details deleted successfully.');
    }
}
