<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Helper function to transform image URLs
    protected function transformImageUrls($gallery)
    {
        // Transform the single thumbnail image URL
        if ($gallery->image) {
            $gallery->image = asset('storage/' . $gallery->image);
        }

        // Transform the multiple images (if any)
        if ($gallery->images) {
            $imagePaths = json_decode($gallery->images, true) ?? [];
            $gallery->images = array_map(function ($path) {
                return asset('storage/' . $path);
            }, $imagePaths);
        }

        return $gallery;
    }

    // Display a listing of the gallery records.
    public function index()
    {
        // Retrieve all gallery records
        $images = Gallery::all();

        // Transform image URLs for all gallery items
        $imagesWithUrl = $images->map(function ($image) {
            return $this->transformImageUrls($image);
        });

        return response()->json($imagesWithUrl);
    }

    // Show a single gallery record using the slug
    public function show($slug)
    {
        try {
            // Fetching the gallery record by slug
            $gallery = Gallery::where('slug', $slug)->firstOrFail();

            // Transform the image URLs for the specific gallery item
            $gallery = $this->transformImageUrls($gallery);

            return response()->json($gallery);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Gallery record not found'], 404);
        }
    }

    // Other methods...
}
