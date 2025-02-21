<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // Retrieve all the images
        $images = Gallery::all();

        // Prepare the response with full URLs for the images
        $imagesWithUrl = $images->map(function ($image) {
            // Decode the JSON array of image paths
            $imagePaths = json_decode($image->image);

            // Prepend base URL to each image path
            $imagePathsWithUrl = array_map(function ($path) {
                return asset('storage/' . $path); // Prepend base URL to each image path
            }, $imagePaths);

            // Return the image paths with URLs
            return [
                'id' => $image->id,
                'title' => $image->title,
                'images' => $imagePathsWithUrl,
            ];
        });

        // Return the response as JSON
        return response()->json($imagesWithUrl);
    }

    // Other methods...
}

