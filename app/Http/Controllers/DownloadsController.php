<?php

namespace App\Http\Controllers;

use App\Models\Downloads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // dd('ok');
        $downloads = Downloads::all();
        // dd($downloads);
        return view('downloads.index', compact('downloads'));
    }

    // Show the form for creating a new academic detail.
    public function create()
    {
        return view('downloads.create');
    }

    // Store a newly created academic detail in the database.
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf', // file is required
        ]);

        // Handle the uploaded file
        $file = $request->file('file');
        $filePath = $file->store('downloads', 'public'); // Store file and get its path

        // dd($filePath);  // Debug the file path to check if it's correct

        Downloads::create([
            'title' => $request->title,
            'file_path' => $filePath,  // Store the file path in the database
        ]);

        // Redirect with a success message
        return redirect()->route('downloads.index')->with('success', 'Downloads detail added successfully.');
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
        $downloads = Downloads::find($id);
        return view('downloads.edit', compact('downloads'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $downloads = Downloads::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf',
        ]);
    
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($downloads->file_path);
    
            // Store new file
            $file = $request->file('file');
            $filePath = $file->store('downloads', 'public');
            $downloads->file_path = $filePath;
        }
    
        // Update title
        $downloads->title = $request->title;
        $downloads->save();
    
        return redirect()->route('downloads.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Downloads::findOrFail($id);

        // Delete the file record
        $file->delete();

        return redirect()->route('downloads.index')->with('success', 'file details deleted successfully.');
    }


    public function download($id)
    {
        $result = Downloads::find($id);

        // Check if the result exists
        if (!$result) {
            return response()->json(['error' => 'Notice not found.'], 404);
        }

        // Proceed with download if file exists
        if (!$result->file_path || !Storage::disk('public')->exists($result->file_path)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        return Storage::disk('public')->download($result->file_path, $result->title . '.pdf');
    }
}
