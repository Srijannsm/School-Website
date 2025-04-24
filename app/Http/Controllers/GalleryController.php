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

    public function show($slug)
    {
        $images = Gallery::where('slug', $slug)->firstOrFail();
        return response()->json($images);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    \Log::info($request->all()); // Debugging: Log incoming request

    $imagePaths = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Save each image in the storage folder
            $imagePaths[] = $image->store('images', 'public');
        }
    }

    // Handle single 'image' upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('thumbnail', 'public');
    }

    // Save to database
    $gallery = Gallery::create([
        'title' => $request->title ?? 'Untitled',
        'images' => json_encode($imagePaths), // Store multiple image paths as JSON
        'image' => $imagePath, // This ensures 'image' is stored even if it's null
    ]);

    return response()->json([
        'success' => 'Images uploaded successfully!',
        'redirect' => route('gallery.index')
    ]);

        return response()->json(['error' => 'No images uploaded.'], 400);
    }




    /**
     

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
    // Find the gallery record
    $gallery = Gallery::findOrFail($id);

    // Decode the JSON to get the multiple image paths
    $imagePaths = json_decode($gallery->images, true) ?? [];

    // Loop through each image path and delete the image file
    foreach ($imagePaths as $imagePath) {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Delete the single thumbnail image if it exists
    if (!empty($gallery->image) && Storage::disk('public')->exists($gallery->image)) {
        Storage::disk('public')->delete($gallery->image);
    }

    // Delete the record from the database
    $gallery->delete();

    // Redirect back with success message
    return redirect()->route('gallery.index')->with('success', 'Gallery images, thumbnail, and records deleted successfully.');
}


}
