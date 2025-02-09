<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // dd('ok');
        $news = News::all();
        // dd($academicDetails);
        return response()->json($news);
    }

    // Show the form for creating a new academic detail.
    
}
