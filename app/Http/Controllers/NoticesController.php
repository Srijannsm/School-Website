<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticesController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        // dd('ok');
        $notices = Notices::all();
        // dd($notices);
        return view('notices.index', compact('notices'));
    }

    // Show the form for creating a new academic detail.
    public function create()
    {
        return view('notices.create');
    }

    // Store a newly created academic detail in the database.
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048', // file is required
        ]);

        // Handle the uploaded file
        $file = $request->file('file');
        $filePath = $file->store('notices', 'public'); // Store file and get its path

        // dd($filePath);  // Debug the file path to check if it's correct

        Notices::create([
            'title' => $request->title,
            'file_path' => $filePath,  // Store the file path in the database
        ]);

        // Redirect with a success message
        return redirect()->route('notices.index')->with('success', 'Notices detail added successfully.');
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
        $notices = Notices::find($id);
        return view('notices.edit', compact('notices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notices = Notices::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);
    
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($notices->file_path);
    
            // Store new file
            $file = $request->file('file');
            $filePath = $file->store('notices', 'public');
            $notices->file_path = $filePath;
        }
    
        // Update title
        $notices->title = $request->title;
        $notices->save();
    
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = Notices::findOrFail($id);

        // Delete the file record
        $file->delete();

        return redirect()->route('notices.index')->with('success', 'file details deleted successfully.');
    }


    public function download($id)
    {
        $result = Notices::find($id);

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
