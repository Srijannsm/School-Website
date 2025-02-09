<?php

namespace App\Http\Controllers;

use App\Models\Academics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        $academics = Academics::all();
        return view('academics.index', compact('academics'));
    }

    // Show the form for creating a new academic detail.
    public function create()
    {
        return view('academics.create');
    }

    // Store a newly created academic detail in the database.
    public function store(Request $request)
    {
        // Strong validation rules
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Check if an image is uploaded
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('academics', 'public') : null;

        // Create the new academic detail record
        Academics::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('academics.index')->with('success', 'Academics details created successfully.');
    }

    // Show the form for editing the specified academic detail.
    public function edit($id)
    {
        $academics = Academics::findOrFail($id);
        return view('academics.edit', compact('academics'));
    }

    // Update the specified academic detail in the database.
    public function update(Request $request, $id)
    {
        // Strong validation rules for updating
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the academic detail to update
        $academic = Academics::findOrFail($id);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($academic->image) {
                Storage::disk('public')->delete($academic->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('academics', 'public');
            $academic->image = $imagePath;
        }

        // Update the academic details
        $academic->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $academic->image, // Ensure image updates properly
        ]);

        return redirect()->route('academics.index')->with('success', 'Academic details updated successfully.');
    }

    // Remove the specified academic detail from the database.
    public function destroy($id)
    {
        $academic = Academics::findOrFail($id);

        // Delete the image file if it exists
        if ($academic->image) {
            Storage::disk('public')->delete($academic->image);
        }

        // Delete the academic record
        $academic->delete();

        return redirect()->route('academics.index')->with('success', 'Academic details deleted successfully.');
    }
}
