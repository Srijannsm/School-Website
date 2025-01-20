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
        // dd($academicDetails);
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
            'description' => 'required|string|max:255',
        ]);


        // Create the new academic detail record
        Academics::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('academics.store')->with('success', 'Academics details created successfully.');
    }

    // Display the specified academic detail.
    // public function show($id)
    // {
    //     $academic = Academics::findOrFail($id);
    //     return view('academic_details.show', compact('academic'));
    // }

    // Show the form for editing the specified academic detail.
    public function edit($id)
    {
        $academics = Academics::find($id);  // Fetch the academic based on the provided ID
        return view('academics.edit', compact('academics'));
    }
    

    // Update the specified academic detail in the database.
    public function update(Request $request, $id)
    {
        // Strong validation rules for updating
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Find the academic detail to update
        $academic = Academics::findOrFail($id);


        // Update the academic details
        $academic->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('academics.index')->with('success', 'Academic details updated successfully.');
    }

    // Remove the specified academic detail from the database.
    public function destroy($id)
    {
        $academic = Academics::findOrFail($id);

        // Delete the academic record
        $academic->delete();

        return redirect()->route('academics.index')->with('success', 'Academic details deleted successfully.');
    }
}
