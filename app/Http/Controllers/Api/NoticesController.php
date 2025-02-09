<?php

namespace App\Http\Controllers\Api;

use App\Models\Notices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // dd('ok');
        $notices = Notices::all();
        // dd($academicDetails);
        return response()->json($notices);
    }

    // Show the form for creating a new academic detail.
    
}
