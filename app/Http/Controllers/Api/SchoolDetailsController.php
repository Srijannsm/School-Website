<?php

namespace App\Http\Controllers\Api;
// namespace App\Http\Controllers;

use App\Models\SchoolDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolDetailsController extends Controller
{
    // Display a listing of the school details.
    public function index()
    {
        // dd('ok   ');
        $schoolDetails = SchoolDetails::all();
        // dd($schoolDetails);
        // return view('settings.setting', compact('schoolDetails'));
        return response()->json($schoolDetails);
    }

}
