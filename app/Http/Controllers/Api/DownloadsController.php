<?php

namespace App\Http\Controllers\Api;

use App\Models\Downloads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // dd('ok');
        $downloads = Downloads::all();
        // dd($academicDetails);
        return response()->json($downloads);
    }

    // Show the form for creating a new academic detail.
    
}
