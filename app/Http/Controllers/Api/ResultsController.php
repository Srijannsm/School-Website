<?php

namespace App\Http\Controllers\Api;

use App\Models\Results;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        $results = Results::all();
        // dd($academicDetails);
        return response()->json($results);
    }

    // Show the form for creating a new academic detail.
    
}
