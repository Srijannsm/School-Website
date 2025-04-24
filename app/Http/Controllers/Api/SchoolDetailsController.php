<?php

namespace App\Http\Controllers\Api;

use App\Models\SchoolDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolDetailsController extends Controller
{
    // Display a listing of the school details.
    public function index()
    {
        $schoolDetails = SchoolDetails::all();

        // Modify the school details data to prepend the base URL to image/file paths
        $schoolDetailsWithUrl = $schoolDetails->map(function ($schoolDetail) {
            // Assuming 'image' is the field in the SchoolDetails model
            if ($schoolDetail->logo) {
                $schoolDetail->logo = asset('storage/' . $schoolDetail->logo);
            }

            // You can add similar transformations for other file fields if required

            return $schoolDetail;
        });

        return response()->json($schoolDetailsWithUrl);
    }

    // Other methods...
}
