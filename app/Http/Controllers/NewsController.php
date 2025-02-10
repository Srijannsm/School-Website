<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    
    // Display a listing of the news details.
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    // Show the form for creating a new news detail.
    public function create()
    {
        return view('news.create');
    }

    // Store a newly created news detail in the database.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        // dd('ok');

        // Store image if uploaded
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('news', 'public') : null;

        News::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
        ]);


        return redirect()->route('news.index')->with('success', 'News details created successfully.');
    }

    // Show the form for editing the specified news detail.
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    // Update the specified news detail in the database.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $news = News::findOrFail($id);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('news', 'public');
            $news->image = $imagePath;
        }

        // Update other news details
        $news->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $news->image,
        ]);

        return redirect()->route('news.index')->with('success', 'News details updated successfully.');
    }

    // Remove the specified news detail from the database.
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete image if it exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News details deleted successfully.');
    }
}
