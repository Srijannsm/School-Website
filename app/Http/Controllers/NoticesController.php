<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
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
        // Strong validation rules
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);


        // Create the new academic detail record
        Notices::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('notices.store')->with('success', 'Notice details created successfully.');
    }

    // Display the specified academic detail.
    // public function show($id)
    // {
    //     $academic = Notice::findOrFail($id);
    //     return view('academic_details.show', compact('academic'));
    // }

    // Show the form for editing the specified academic detail.
    public function edit($id)
    {
        $notices = Notices::find($id);  // Fetch the academic based on the provided ID
        return view('notices.edit', compact('notices'));
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
        $academic = Notices::findOrFail($id);


        // Update the academic details
        $academic->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('notices.index')->with('success', 'New details updated successfully.');
    }

    // Remove the specified academic detail from the database.
    public function destroy($id)
    {
        $academic = Notices::findOrFail($id);

        // Delete the academic record
        $academic->delete();

        return redirect()->route('notices.index')->with('success', 'New details deleted successfully.');
    }
}
