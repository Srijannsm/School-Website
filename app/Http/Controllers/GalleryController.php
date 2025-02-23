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
        \Log::info($request->all()); // Debugging: Log incoming request

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                // Save each image in the storage folder
                $imagePaths[] = $image->store('images', 'public');
            }

            // Save to database
            $gallery = Gallery::create([
                'title' => $request->title ?? 'Untitled',
                'image' => json_encode($imagePaths), // Store multiple image paths as JSON
            ]);

            return response()->json([
                'success' => 'Images uploaded successfully!',
                'redirect' => route('gallery.index') // Send redirect URL to frontend
            ]);
            // return response()->json(['success' => 'Images uploaded successfully!', 'gallery' => $gallery]);
        }

        return response()->json(['error' => 'No images uploaded.'], 400);
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
        // Find the gallery record
        $image = Gallery::findOrFail($id);
    
        // Decode the JSON to get the image paths
        $imagePaths = json_decode($image->image);
    
        // Loop through each image path and delete the image file
        foreach ($imagePaths as $imagePath) {
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }
    
        // Delete the record from the database
        $image->delete();
    
        // Redirect back with success message
        return redirect()->route('gallery.index')->with('success', 'Image details and files deleted successfully.');
    }
    }
