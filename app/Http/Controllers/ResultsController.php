<?php

namespace App\Http\Controllers;

use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Results::all();
        return view('results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('results.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048', // file is required
        ]);

        // Handle the uploaded file
        $file = $request->file('file');
        $filePath = $file->store('results', 'public'); // Store file and get its path

        // dd($filePath);  // Debug the file path to check if it's correct

        Results::create([
            'title' => $request->title,
            'file_path' => $filePath,  // Store the file path in the database
        ]);

        // Redirect with a success message
        return redirect()->route('results.index')->with('success', 'Results detail added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $results = Results::find($id);
        return view('results.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $results = Results::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($results->file_path);
    
            // Store new file
            $file = $request->file('file');
            $filePath = $file->store('results', 'public');
            $results->file_path = $filePath;
        }
    
        // Update title
        $results->title = $request->title;
        $results->save();
    
        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Results::findOrFail($id);

        // Delete the file record
        $file->delete();

        return redirect()->route('results.index')->with('success', 'file details deleted successfully.');
    }


    public function download($id)
    {
        $result = Results::find($id);

        // Check if the result exists
        if (!$result) {
            return response()->json(['error' => 'Result not found.'], 404);
        }

        // Proceed with download if file exists
        if (!$result->file_path || !Storage::disk('public')->exists($result->file_path)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        return Storage::disk('public')->download($result->file_path, $result->title . '.pdf');
    }
}
