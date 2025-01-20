<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Display a listing of the academic details.
    public function index()
    {
        $news = News::all();
        // dd($news);
        return view('news.index', compact('news'));
    }

    // Show the form for creating a new academic detail.
    public function create()
    {
        return view('news.create');
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
        News::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('news.store')->with('success', 'News details created successfully.');
    }

    // Display the specified academic detail.
    // public function show($id)
    // {
    //     $academic = News::findOrFail($id);
    //     return view('academic_details.show', compact('academic'));
    // }

    // Show the form for editing the specified academic detail.
    public function edit($id)
    {
        $news = News::find($id);  // Fetch the academic based on the provided ID
        return view('news.edit', compact('news'));
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
        $academic = News::findOrFail($id);


        // Update the academic details
        $academic->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('news.index')->with('success', 'New details updated successfully.');
    }

    // Remove the specified academic detail from the database.
    public function destroy($id)
    {
        $academic = News::findOrFail($id);

        // Delete the academic record
        $academic->delete();

        return redirect()->route('news.index')->with('success', 'New details deleted successfully.');
    }
}
