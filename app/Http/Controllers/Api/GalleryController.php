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
        $images = Gallery::all();
        // dd($academicDetails);
        return response()->json($images);
    }

    // Show the form for creating a new academic detail.
    
}
