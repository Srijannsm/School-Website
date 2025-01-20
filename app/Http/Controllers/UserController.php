<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user detail in the database.
    public function store(Request $request)
    {
        // Strong validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ]);        

        // Create the new user detail record
        User::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('users.store')->with('success', 'User details created successfully.');
    }

    // Display the specified user detail.
    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('user_details.show', compact('user'));
    // }

    // Show the form for editing the specified user detail.
    // public function edit($id)
    // {
    //     $users = User::find($id);  // Fetch the user based on the provided ID
    //     return view('users.edit', compact('users'));
    // }
    

    // // Update the specified user detail in the database.
    // public function update(Request $request, $id)
    // {
    //     // Strong validation rules for updating
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     // Find the user detail to update
    //     $user = User::findOrFail($id);


    //     // Update the user details
    //     $user->update([
    //         'title' => $validatedData['title'],
    //         'description' => $validatedData['description'],
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'User details updated successfully.');
    // }

    // // Remove the specified user detail from the database.
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);

    //     // Delete the user record
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User details deleted successfully.');
    // }
}
