<?php

namespace App\Http\Controllers\Api;

use App\Models\Academics;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        $academics = Academics::all();
        // dd($academicDetails);
        return response()->json($academics);
    }

    // Show the form for creating a new academic detail.
    
}
