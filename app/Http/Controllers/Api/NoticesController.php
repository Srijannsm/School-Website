<?php

namespace App\Http\Controllers\Api;

use App\Models\Notices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    // Display a listing of the notices details.
    public function index()
    {
        $notices = Notices::all();

        // Modify the news data to prepend the base URL to image/file paths
        $noticesWithUrl = $notices->map(function ($noticesItem) {
            // 
            if ($noticesItem->file_path) {
                $noticesItem->file_path = asset('storage/' . $noticesItem->file_path);
            }

            // You can add similar transformations for other file fields if required

            return $noticesItem;
        });

        return response()->json($noticesWithUrl);
    }
    
}
