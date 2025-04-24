<?php

namespace App\Http\Controllers\Api;

use App\Models\Academics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicsController extends Controller
{
    // Helper function to transform image URLs
    protected function transformImageUrls($academic)
    {
        if ($academic->image) {
            // Prepending the base URL to the image path
            $academic->image = asset('storage/' . $academic->image);
        }
        return $academic;
    }

    // Display a listing of the academic details.
    public function index()
    {
        $academics = Academics::all();

        // Transform image URLs for all academic items
        $academicsWithUrl = $academics->map(function ($academic) {
            return $this->transformImageUrls($academic);
        });

        return response()->json($academicsWithUrl);
    }

    // Show a single academic detail using the slug
    public function show($slug)
    {
        try {
            // Fetching the academic record by slug
            $academic = Academics::where('slug', $slug)->firstOrFail();

            // Transform the image URL for the specific academic item
            $academic = $this->transformImageUrls($academic);

            return response()->json($academic);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Academic record not found'], 404);
        }
    }

    // Other methods...
}
