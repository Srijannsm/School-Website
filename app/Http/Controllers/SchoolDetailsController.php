<?php

namespace App\Http\Controllers;

use App\Models\SchoolDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolDetailsController extends Controller
{
    // Display a listing of the school details.
    public function index()
    {
        $schoolDetails = SchoolDetails::all();
        // dd($schoolDetails);
        return view('settings.setting', compact('schoolDetails'));
    }

    // Show the form for creating a new school detail.
    // public function create()
    // {
    //     return view('settings.create_details');
    // }

    // Store a newly created school detail in the database.
    public function store(Request $request)
    {
        // Strong validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Logo is optional but must be an image
            'email' => 'nullable|email|max:255',
            'contact_numbers' => 'nullable|string|max:255', // Can store multiple numbers, like a CSV string
            'address' => 'nullable|string|max:500', // Max length for address
            'establishment_year' => 'nullable|integer|digits:4|before_or_equal:'.date('Y'), // Valid year (4 digits, not in the future)
            'description' => 'nullable|string|max:1000', // Max description length
            'phone_numbers' => 'nullable|string|max:255', // Similar to contact_numbers
            'website_url' => 'nullable|url|max:255', // Valid URL format
            'number_of_students' => 'nullable|integer|min:0', // Ensure it's a positive integer or 0
            'number_of_staffs' => 'nullable|integer|min:0', // Ensure it's a positive integer or 0
            'programs_offered' => 'nullable|string|max:1000', // Max length for the programs description
        ]);

        // Handle the logo file upload (if it exists)
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Create the new school detail record
        SchoolDetails::create([
            'name' => $validatedData['name'],
            'logo' => $logoPath,
            'email' => $validatedData['email'],
            'contact_numbers' => $validatedData['contact_numbers'],
            'address' => $validatedData['address'],
            'establishment_year' => $validatedData['establishment_year'],
            'description' => $validatedData['description'],
            'phone_numbers' => $validatedData['phone_numbers'],
            'website_url' => $validatedData['website_url'],
            'number_of_students' => $validatedData['number_of_students'],
            'number_of_staffs' => $validatedData['number_of_staffs'],
            'programs_offered' => $validatedData['programs_offered'],
        ]);

        return redirect()->route('school_details.index')->with('success', 'School details created successfully.');
    }

    // Display the specified school detail.
    // public function show($id)
    // {
    //     $school = SchoolDetails::findOrFail($id);
    //     return view('school_details.show', compact('school'));
    // }

    // Show the form for editing the specified school detail.
    public function edit($id)
    {
        $schoolDetails = SchoolDetails::find($id);  // Fetch the school based on the provided ID
        return view('settings.edit_details', compact('schoolDetails'));
    }
    

    // Update the specified school detail in the database.
    public function update(Request $request, $id)
    {
        // Strong validation rules for updating
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Optional image validation
            'email' => 'nullable|email|max:255',
            'contact_numbers' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'establishment_year' => 'nullable|integer|digits:4|before_or_equal:'.date('Y'),
            'description' => 'nullable|string|max:1000',
            'phone_numbers' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'number_of_students' => 'nullable|integer|min:0',
            'number_of_staffs' => 'nullable|integer|min:0',
            'programs_offered' => 'nullable|string|max:1000',
        ]);

        // Find the school detail to update
        $school = SchoolDetails::findOrFail($id);

        // Handle logo upload (if new logo is uploaded)
        $logoPath = $school->logo;
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }

            // Upload the new logo
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Update the school details
        $school->update([
            'name' => $validatedData['name'],
            'logo' => $logoPath,
            'email' => $validatedData['email'],
            'contact_numbers' => $validatedData['contact_numbers'],
            'address' => $validatedData['address'],
            'establishment_year' => $validatedData['establishment_year'],
            'description' => $validatedData['description'],
            'phone_numbers' => $validatedData['phone_numbers'],
            'website_url' => $validatedData['website_url'],
            'number_of_students' => $validatedData['number_of_students'],
            'number_of_staffs' => $validatedData['number_of_staffs'],
            'programs_offered' => $validatedData['programs_offered'],
        ]);

        return redirect()->route('school_details.index')->with('success', 'School details updated successfully.');
    }

    // Remove the specified school detail from the database.
    // public function destroy($id)
    // {
    //     $school = SchoolDetails::findOrFail($id);

    //     // Delete the logo if it exists
    //     if ($school->logo) {
    //         Storage::disk('public')->delete($school->logo);
    //     }

    //     // Delete the school record
    //     $school->delete();

    //     return redirect()->route('school_details.index')->with('success', 'School details deleted successfully.');
    // }
}
