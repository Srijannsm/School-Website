<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Display a listing of the news details.
    public function index()
    {
        $news = News::all();

        // Modify the news data to prepend the base URL to image/file paths
        $newsWithUrl = $news->map(function ($newsItem) {
            // Assuming 'image' is the field in the News model
            if ($newsItem->image) {
                $newsItem->image = asset('storage/' . $newsItem->image);
            }

            // You can add similar transformations for other file fields if required

            return $newsItem;
        });

        return response()->json($newsWithUrl);
    }

    // Other methods...
}
