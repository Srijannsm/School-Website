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
        // Retrieve all the academic details
        $academics = Academics::all();

        // Prepare the response with full URLs for the image fields (if applicable)
        $academicsWithUrl = $academics->map(function ($academic) {
            // Check if the model has an image or other file fields
            if ($academic->image) {  // Assuming 'image' is a field in the Academics model
                // Prepend base URL to the image path
                $academic->image = asset('storage/' . $academic->image);
            }

            // You can add similar transformations for other file fields

            return $academic;
        });

        // Return the response as JSON
        return response()->json($academicsWithUrl);
    }

    // Other methods...
}
