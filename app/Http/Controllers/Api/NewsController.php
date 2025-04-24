<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Helper function to transform image URLs
    protected function transformImageUrls($news)
    {
        if ($news->image) {
            // Prepending the base URL to the image path
            $news->image = asset('storage/' . $news->image);
        }
        return $news;
    }

    // Display a listing of the news details.
    public function index()
    {
        $news = News::all();

        // Transform image URLs for all news items
        $newsWithUrl = $news->map(function ($newsItem) {
            return $this->transformImageUrls($newsItem);
        });

        return response()->json($newsWithUrl);
    }

    // Show a single news detail using the slug
    public function show($slug)
    {
        try {
            $news = News::where('slug', $slug)->firstOrFail();

            // Transform the image URL for the specific news item
            $news = $this->transformImageUrls($news);

            return response()->json($news);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'News not found'], 404);
        }
    }

    // Other methods...
}
