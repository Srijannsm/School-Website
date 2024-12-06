<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDetails extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'school_details';

    // The primary key for the table
    protected $primaryKey = 'id';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'logo',
        'email',
        'contact_numbers',
        'address',
        'establishment_year',
        'description',
        'phone_numbers',
        'website_url',
        'number_of_students',
        'number_of_staffs',
        'programs_offered',
    ];

    // If you're working with dates (e.g., 'establishment_year'), define them as casts
    protected $casts = [
        'establishment_year' => 'integer',  // Ensures the year is treated as an integer
        'number_of_students' => 'integer',  // Ensures it's stored as an integer
        'number_of_staffs' => 'integer',   // Ensures it's stored as an integer
        'logo' => 'string',                 // To store the file path/URL
        'contact_numbers' => 'string',      // To store the numbers as a string (comma-separated, for example)
        'phone_numbers' => 'string',        // Similar to contact_numbers
        'programs_offered' => 'string',     // Programs can be stored as a string (JSON or comma-separated)
    ];
}
